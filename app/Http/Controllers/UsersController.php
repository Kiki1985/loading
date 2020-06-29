<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function store(Request $request) {
    	sleep(3);
    	$name = User::create(request()->validate([
        'fName' => 'required|min:3|max:25',
        'lName' => 'required|min:3|max:25'
            ]));
        return $name;
    }

    public function userget() {
    	sleep(3);
    	$users = User::all();
        return $users;
    }
}
