<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subscription;

class SubscriptionsController extends Controller
{
    public function store(Request $request) {
    	sleep(3);
    	request()->validate([
    		'name' => 'required|min:3|max:25',
            'email' => 'required|min:3|max:25',
            'password' => 'required|min:3|max:25'
    	]);
    	$subscription = Subscription::create([
	        'name' => request('name'),
	        'email' => request('email'),
	        'password' => bcrypt(request('password'))
        ]);
        return $subscription;
    }

    public function getSubscriptions() {
    	sleep(3);
    	$subscription = Subscription::all();
        return $subscription;
    }
}
