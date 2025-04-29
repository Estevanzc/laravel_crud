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
            "title" => ["required"],
            "texto" => ["max:5000"],
        ]);
        Note::create($resquest_data);
        redirect(route("keep.index"));
    }
}
