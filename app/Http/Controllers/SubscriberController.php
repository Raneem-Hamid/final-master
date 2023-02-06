<?php

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\Object_;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {

        $content = $request->all();


        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject,

        ];

        $user = User::first();
        Mail::to($request->email)->send(new Subscribe($request));
        return redirect('/');
    }
}
