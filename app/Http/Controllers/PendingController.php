<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pending;
use Illuminate\Support\Facades\Auth;

class PendingController extends Controller
{
    public function store(Request $request)
    {

      
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'certificate' => ['required', 'mimes:csv,txt,xlx,xls,pdf'],
            'overview' => ['required']
        ]);


        // $name = $request->file('file')->getClientOriginalName();
        // certificate


         Pending::create([
            // 'name' => $request->name,
            // 'email' => $request->email,
            'certificate' => $request->certificate ? upImage($request->certificate, 'certificate') : '',
            'overview' => $request->overview,
            'users_id' => Auth::user()->id,
            'kinds_id'=>$request->kinds_id,
        ]);
        return redirect()-> route('home');
    }
}
