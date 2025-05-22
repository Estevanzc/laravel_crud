<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KeepinhoController extends Controller {
    public function index() {
        $notes = Note::all();
        return view("keepinho/index", [
            "notes" => $notes
        ]);
    }
    function insert_data(NoteRequest $request) {
        $request_data = $request->validated();
        Note::create($request_data);
        return redirect()->route("keep.index");
    }
    function delete_data($note) {
        $note = Note::withTrashed()->find($note);
        $note->delete();
        return redirect()->route("keep.index");
    }
    function edit_data(Note $note, Request $request) {
        return view("keepinho.edit",[
            "note"=> $note
        ]);
    }
    function update_data(NoteRequest $request) {
        $request_data = $request->validated();
        $note = Note::find($request->id);
        $note->fill($request_data);
        $note->save();
        return redirect()->route("keep.index");
    }
    function trash() {
        $notes = Note::onlyTrashed()->get();
        return view("keepinho/trash", [
            "notes" => $notes,
        ]);
    }
    function trash_restore($note) {
        $note = Note::onlyTrashed()->find($note);
        $note->restore();
        return redirect()->route("keep.trash")->with([
            "success" => "Nota apagada",
        ]);
    }
}
