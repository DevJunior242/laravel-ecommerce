<?php

namespace App\Http\Controllers;

 
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
 

class TestMailController extends Controller
{
    public function index()
    {
         $data = [
            'name' => "dev",
            'email' => 'devjunior242@gmail.com',
         ];
         
        Mail::To('devpaypal677@gmail.com')->send(new TestMail($data));
        dd('send email');
    }
}
