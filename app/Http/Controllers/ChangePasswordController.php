<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function changePassword(){
    	return view('registrar.change_password');
    }

    public function storeChangePassword(Request $request){
    	if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        if(strcmp($request->get('new-password_confirmation'), $request->get('new-password')) == 1){
            //Current password and new password are same
            return redirect()->back()->with("error","Confirm Password must be same as your new password");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:4|confirmed',
            'new-password_confirmation' => 'required|same:new-password',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");

    }

    public function setting(){
        return view('registrar.setting');
    }
    public function storeChangeUserPassword(Request $request){
        $user = DB::select("SELECT users.id, users.phone_no FROM users WHERE phone_no =".$request->phone_no);

        // $reset_password = User::where('phone_no',$user)->update([
        //     'password' => Hash::make('1234')
        // ]);
        dd($user);
    }
}
