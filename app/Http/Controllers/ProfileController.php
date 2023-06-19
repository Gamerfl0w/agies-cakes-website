<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit($id){
        $user = User::find($id);
        return view('profiles.edit',['user'=>$user]);
    }

    // public function update($user){
    //     $data = request()->validate([
    //         'phonenumber'=> ['required', 'numeric'] ,
    //         // 'country'=>['required', 'string', 'max:255'],
    //         'city'=>['required', 'string', 'max:255'],
    //         'address'=>['required', 'string', 'max:255'],
    //         'zipcode'=>['required', 'digits:4'],

    //     ]);

    //     $name = request()->validate([
    //         'name'=>['required', 'string', 'max:255'],
    //     ]);

    //     auth()->user()->profile->update($data);
    //     auth()->user()->update($name);

    //     return redirect("/");
    // }

    public function update(Request $request)
    {
        if($request->input('city') == 'Torrijos'){
            $zip = '4903';
        }else{
            $zip = '4902';
        }

        $request->validate([
            'name' => [
                'required',
                'regex:/^[A-Za-z ]+$/'
            ],
            'phonenumber' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
            // 'country'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'zipcode'=>['required', 'digits:4'],

        ]);
        $user = User::findOrFail($request->id);
        
        $user->update($request->all());
        $user->zipcode = $zip;
        $user->save();
    
        return back()->with('success','Profile edited successfully');
    }

    public function changeRole(Request $request){
        $id = $request->get('id');
        $role = $request->get('role');
        $user = User::find($id);

        $user->role = $role;
        $user->save();

    }
}