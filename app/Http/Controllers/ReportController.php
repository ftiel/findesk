<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ticket;
use DB;

class ReportController extends Controller
{
    public function generate_report(Request $r) {

        // $tickets = DB::table('tickets')
        // ->when($r->Category != 'all', function ($q) use ($r) {
        //     $q->where('Category', $r->Category);
        // })
        // ->when($r->Status != 'all', function ($q) use ($r) {
        //     $q->where('Status', $r->Status);
        // })
        // ->when($r->Priority != 'all', function ($q) use ($r) {
        //     $q->where('Priority', $r->Priority);
        // })
        // ->when($r->DateFrom != '' && $r->DateTo == '', function ($q) use ($r) {
        //     $q->where('created_at', '>=', $r->DateFrom);
        // })
        // ->when($r->DateFrom == '' && $r->DateTo != '', function ($q) use ($r) {
        //     $q->where('created_at', '<=', $r->DateTo);
        // })
        // ->when($r->DateFrom != '' && $r->DateTo != '', function ($q) use ($r) {
        //     $q->whereBetween('created_at', [$r->DateFrom, $r->DateTo]);
        // })
        // ->get();

        $a = DB::table('categories')
        ->join('tickets', 'categories.id', '=', 'tickets.Category')
        ->select(DB::raw('categories.CategoryDescription, count(tickets.Category) as Qty'))
        ->when($r->Category != 'all', function ($q) use ($r) {
            $q->where('tickets.Category', $r->Category);
        })
        ->when($r->Status != 'all', function ($q) use ($r) {
            $q->where('tickets.Status', $r->Status);
        })
        ->when($r->Priority != 'all', function ($q) use ($r) {
            $q->where('tickets.Priority', $r->Priority);
        })
        ->when($r->DateFrom != '' && $r->DateTo == '', function ($q) use ($r) {
            $q->where('tickets.created_at', '>=', $r->DateFrom);
        })
        ->when($r->DateFrom == '' && $r->DateTo != '', function ($q) use ($r) {
            $q->where('tickets.created_at', '<=', $r->DateTo);
        })
        ->when($r->DateFrom != '' && $r->DateTo != '', function ($q) use ($r) {
            $q->whereBetween('tickets.created_at', [$r->DateFrom, $r->DateTo]);
        })
        ->groupBy('Category')
        ->get();

        return response()->json($a);
    }

    public function export_report(Request $r) {
        $tickets = Ticket::with('priority')
        ->when($r->Category != 'all', function ($q) use ($r) {
            $q->where('Category', $r->Category);
        })
        ->when($r->Status != 'all', function ($q) use ($r) {
            $q->where('Status', $r->Status);
        })
        ->when($r->Priority != 'all', function ($q) use ($r) {
            $q->where('Priority', $r->Priority);
        })
        ->when($r->DateFrom != '' && $r->DateTo == '', function ($q) use ($r) {
            $q->where('created_at', '>=', $r->DateFrom);
        })
        ->when($r->DateFrom == '' && $r->DateTo != '', function ($q) use ($r) {
            $q->where('created_at', '<=', $r->DateTo);
        })
        ->when($r->DateFrom != '' && $r->DateTo != '', function ($q) use ($r) {
            $q->whereBetween('created_at', [$r->DateFrom, $r->DateTo]);
        })
        ->get();

        // foreach($tickets as $ticket => $key) {
            
        // }
        
        return response()->json($tickets);
    }

    public function test_report() {
        $a = DB::table('tickets')->select(DB::raw('Category, count(Category) as Qty'))->groupBy('Category')->get();
        $b = DB::table('categories')
        ->join('tickets', 'categories.id', '=', 'tickets.Category')
        ->select(DB::raw('categories.CategoryDescription, count(tickets.Category) as Qty'))
        ->groupBy('Category')
        ->get();
        return $b;
    }
}