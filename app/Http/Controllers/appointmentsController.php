<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Children;
use App\Models\Kind;
use App\Models\Pending;
use App\Models\Sitter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class appointmentsController extends Controller
{
    public function index()
    {
        $sitter = Kind::get();


        return view('Home.booking', compact('sitter'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'city' => ['required', 'string'],
            'street' => ['required', 'string'],
            'building' => ['required', 'numeric'],
            'day' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
            'fchname' => ['required', 'string'],
            'fchage' => ['required', 'numeric'],
            'problems' => ['required', 'string'],
            'explain' => ['string'],

        ]);


        Children::create([
            'name' => $request->fchname,
            'age' => $request->fchage,
            'problems' => $request->problems,
            'explain' => $request->explain ?? 'noooo',
            'users_id' => Auth::user()->id,
        ]);

        $child = Children::latest()->first();
        // dd($child);
        // dd($request->all());
        Appointment::create([
            'city' => $request->city,
            'street' => $request->street,
            'bulding' => $request->building,
            'day' => $request->day,
            'from' => $request->from,
            'to' => $request->to,
            'users_id' => Auth::user()->id,
            'children_id' => $child->id,
            'sitters_id' => $request->department,
        ]);

        return redirect()->route('home');
    }


    public function getpending($id)
    {

        $user = Pending::with('users')->where('kinds_id', $id)->get();

        return response()->json(['data' => $user]);
    }
}
