<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Pending;
use App\Models\Sitter;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    //Pending
    public function showpending()
    {
        $data = Pending::all();

        return view('Admin.mainpageDash', ['data' => $data]);
    }

    public function editpending($id, Request $request)
    {

        $data_to_edit['status'] = $request->status;
        $data_to_edit['kinds_id'] = $request->kinds_id;

        Pending::where(['id' => $id])->update($data_to_edit);



        if ($request->status === 'Approved') {

            Sitter::create([
                'pending_id' => $id,
                'users_id' => $request->user_id,
                'description'=> $request->description,
            ]);

            $role['role'] = 'Sitter';

            User::where(['id' => $request->user_id])->update($role);
        }

        return redirect()->route('dash')->with(['success' => 'updated successfuly']);
    }


    public function deletepending($id)
    {
        Pending::where(['id' => $id])->delete();
        return redirect()->route('dash')->with(['success' => 'Delete is Done']);
    }
    //Users

    public function showusers()
    {
        $data = User::all();

        return view('Admin.userspage', ['data' => $data]);
    }




    public function editrole($id, Request $request)
    {

        $data_to_edit['role'] = $request->role;

        User::where(['id' => $id])->update($data_to_edit);

        return redirect()->route('usersdash')->with(['success' => 'updated successfuly']);
    }


    public function deleteuser($id)
    {
        User::where(['id' => $id])->delete();
        return redirect()->route('usersdash')->with(['success' => 'Delete is Done']);
    }
    //Sitters

    public function showsitters()
    {
        $data = Sitter::all();

        return view('Admin.sitterspage', ['data' => $data]);
    }

    public function editkd($id, Request $request)
    {

        $data_to_pending['kinds_id'] = $request->kinds_id;
        $data_to_edit['description'] = $request->description;


        Sitter::where(['id' => $id])->update($data_to_edit);
        Pending::where(['id' => $request->pending_id])->update($data_to_pending);


        return redirect()->route('sittersdash')->with(['success' => 'updated successfuly']);
    }

    public function deletesitter($id)
    {
        Sitter::where(['id' => $id])->delete();
        return redirect()->route('sittersdash')->with(['success' => 'Delete is Done']);
    }



    //Sitter Dashboard

    // public function dashforsitter()
    // {
    //     // $data = Pending::all();

    //     return view('Sitters.sitterdash');
    // }


    public function dashforsitter()
    {
        $data = Appointment::all();

        return view('Sitters.sitterdash',['data'=>$data]);
    }


    public function accept($id)
    {
        // $data = Appointment::all();
        $data['available'] = 0;
        Sitter::where(['id' => $id])->update($data);

        return redirect()->route('dashforsitter');

    }


    public function reject($id)
    {
        
        Appointment::where(['id' => $id])->delete();

        return redirect()->route('dashforsitter');

    }

    
}
