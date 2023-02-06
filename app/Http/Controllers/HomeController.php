<?php

namespace App\Http\Controllers;

use App\Models\Sitter;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sitter = Sitter::all();
        return view('landing', compact('sitter'));
    }

    public function show()
    {
        return view('Users.profile');
    }

    public function edit($id)
    {
        $editprofile = User::find($id);
        return view('Users.editprofile', ['editprofile' => $editprofile]);
    }



    public function updateprofile($id, Request $request)
    {


        // dd($id);
        $user = User::find($id);
        $imageName = null;
        if (request()->hasfile('image')) {
            $imageName = date('Y-m-dHi') . request()->image->getClientOriginalExtension();
            request()->image->move("upload/image", $imageName);
        }
        $data_to_edit['name'] = $request->name;
        $data_to_edit['email'] = $request->email;
        $data_to_edit['phone'] = $request->phone;
        $data_to_edit['image'] = $imageName ? $imageName : $user->image;

        User::where(['id' => $id])->update($data_to_edit);

        return redirect()->route('profile')->with(['success' => 'updated successfuly']);
    }


    public function sitterprofile($id)
    {

        $sitter = Sitter::find($id);

        return view('Sitters.sitterprofile', ['sitter' => $sitter]);
    }


    public function ourteam()
    {

        $sitters = Sitter::all();

        return view('Sitters.sitters', ['sitters' => $sitters]);
    }
}
