<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller {
    public function plus($n1, $n2) {
        return view("plus", [
            "n1" => $n1,
            "n2" => $n2,
            "equals" => $n1 + $n2,
        ]);
    }
}
