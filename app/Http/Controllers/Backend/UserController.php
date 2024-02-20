<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function UserView()
    {

        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);





        // -----Testing Die And Dump---------------
        // dd('view user');
    }

    public function UserAdd()
    {

        return view('backend.user.add_user');
    }



    public function UserStore(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->usertype = $request->usertype;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('user.view');
    }


    // public function UserStore(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'email' => 'required|unique:users',
    //         'name' => 'required',
    //     ]);

    //     // You can access validated data from $validatedData
    //     $email = $validatedData['email'];
    //     $name = $validatedData['name'];

    //     // Now you can use $email and $name in your code if needed

    //     $data = new User();
    //     $data->usertype = $request->usertype;
    //     $data->name = $name; // Using validated name
    //     $data->email = $email; // Using validated email
    //     $data->password = bcrypt($request->password);
    //     $data->save();

    //     return redirect()->route('user.view');
    // }
}
