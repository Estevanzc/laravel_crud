<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller {
    function index() {
        return view("login");
    }
    function logon() {
        return view("logon");
    }
    function logout() {
        Auth::logout();
        return view("index");
    }
    function auth_logon(UserRequest $request) {
        $request_data = $request->validated();
        $request_data["password"] = Hash::make($request_data["password"]);
        $user = User::create($request_data);
        Auth::login($user);
        return redirect()->route("keep.index");
    }
    function athenticate(Request $request) {
        $request_data = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);
        $user = User::where("email", "=", $request_data["email"])->first();
        if (empty($user)) {
            return redirect()->route("login")->withErrors([
                "login" => "email não encontrado"
            ])->withInput([
                "email" => $request["email"],
            ]);
        }
        if (!Hash::check($request_data["password"], $user["password"])) {
            return redirect()->route("login")->withErrors([
                "senha" => "senha incorreta"
            ])->withInput([
                "email" => $request["email"],
            ]);
        }
        if (Auth::attempt(["email" => $request_data["email"], "password" => $request_data["password"]])) {
            $request->session()->regenerate();
        }
        return redirect()->route("keep.index");
    }
}
