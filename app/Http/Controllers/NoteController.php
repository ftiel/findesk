<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create(Request $r) {
        $note = new Note;
        $note->TicketID = $r->noteTicket;
        $note->Sender = $r->noteSender;
        $note->Message = $r->noteMessage;
        $note->save();
        return redirect()->back();
    }

    public function get_notes(Request $r) {
        $data = Note::where('TicketID', $r->TicketID)->get();
        return response()->json($data);
    }
}
