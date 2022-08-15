<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function realtime_notification(Request $r) {
        $data = Notification::where('ReceiverID', session('userid'))->orderBy('id', 'DESC')->get();
        return response()->json($data);
    }

    public function update_notif_status(Request $r) {
        $notif = Notification::find($r->id);
        $msg = '';
        if($notif->isSeen == 'N') {
            $notif->isSeen = 'Y';
            $notif->save();
            $msg = 'Updated';
        } else {
            $msg = 'No Changes';
        }

        $data = $msg;
        return response()->json($data);
    }
}