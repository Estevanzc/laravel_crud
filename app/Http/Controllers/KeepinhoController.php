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
        $request_data = $request->validate([
            "title" => ["required", "min:3", Rule::unique("notes", "title")],
            "texto" => ["max:5000"],
            "alert" => ["date"]
        ]);
        Note::create($request_data);
        return redirect()->route("keep.index");
    }
    function delete_data(Note $note) {
        $note->delete();
        return redirect()->route("keep.index");
    }
    function edit_data(Note $note, Request $request) {
        return view("keepinho.edit",[
            "note"=> $note
        ]);
    }
    function update_data(Request $request) {
        $request_data = $request->validate([
            "title" => ["required", "min:3"],
            "texto" => ["max:5000"],
            "alert" => ["date"]
        ]);
        $note = Note::find($request->id);
        $note->title = $request_data["title"];
        $note->texto = $request_data["texto"];
        $note->alert = $request_data["alert"];
        $note->save();
        return redirect()->route("keep.index");
    }
}
