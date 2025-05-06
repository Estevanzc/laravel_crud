<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KeepinhoController extends Controller {
    public function index() {
        $notes = Note::all();
        return view("keepinho/index", [
            "notes" => $notes
        ]);
    }
    function insert_data(Request $request) {
        $resquest_data = $request->validate([
            "title" => ["required", Rule::unique("notes", "title")],
            "texto" => ["max:5000"],
        ]);
        Note::create($resquest_data);
        return redirect()->route("keep.index");
    }
    function delete_data(Note $note) {
        $note->delete();
        return redirect()->route("keep.index");
    }
    function edit_data(Note $note, Request $request) {

        if ($request->isMethod("put")) {
            $note = Note::find($request->id);
            $note->title = $request->title;
            $note->texto = $request->texto;
            $note->save();
            return redirect()->route("keep.index");
        }
        return view("keepinho.edit",[
            "note"=> $note
        ]);
    }
}
