<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\BirthdayWish;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();


        if (!$user) {
            abort(404);
        }

        try {
            $message['hi'] = "hi, {$user->name}";
            $message["wish"] = "happ birthday to you , {$user->name}";
            $user->notify(new BirthdayWish($message));

            dd($user);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }



    public function subscribe(Request $request)
    {
        $request->validate([
            'email' =>'required|email|unique:subscribes,email',
           
        ]);
        
      
        
        $subscribe = new \App\Models\Subscribe();
        $subscribe->email = $request->email;

        $subscribe->save();

        return back();
    }

    
}
