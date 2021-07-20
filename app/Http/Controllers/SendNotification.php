<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Auth;
use App\User;

class SendNotification extends Controller
{
    public function store(Request $request)
    {
        
    	$user = Auth::user();
        $data = $request->only([
            'message',
        ]);
        $user->notify(new TestNotification($data));

        return redirect()->route('dashboardadmin');
    }
}
