<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Priority;
use App\Models\SubCategory;
use App\Models\SubCategoryDetail;
use App\Models\User;

class ContentController extends Controller
{
    public function ajax_sub_categories(Request $r) {
        if($r->RequestType == 1) {
            $data = SubCategory::where('CategoryID', $r->CategoryID)->where('isIncident', 1)->get();
        } else {
            $data = SubCategory::where('CategoryID', $r->CategoryID)->where('isRequest', 1)->get();
        }
        return response()->json($data);
    }

    public function ajax_sub_category_details(Request $r) {
        $TicketType = $r->TicketType;
        if($TicketType == 1) {
            $data = SubCategoryDetail::where('SubCategoryID', $r->SubCategoryID)->where('RequestType', 'Incident')->get();
        } else {
            $data = SubCategoryDetail::where('SubCategoryID', $r->SubCategoryID)->where('RequestType', 'Request')->get();
        }
        return response()->json($data);
    }

    public function ajax_priority_level(Request $r) {
        if($r->SCDID == 404) {
            $data = Priority::where('id', 404)->first();
        } else {
            $SCD = SubCategoryDetail::where('id', $r->SCDID)->first()->PriorityID;
            $data = Priority::where('id', $SCD)->first();
        }
        return response()->json($data);
    }

    public function add_user (Request $r) {
        $user = new User;
        $user->name = $r->name;
        $user->username = $r->username;
        $user->password = md5($r->password);
        $user->DepartmentID = $r->DepartmentID;
        $user->UserType = $r->UserType;
        $user->save();
        return redirect()->back();
    }
}