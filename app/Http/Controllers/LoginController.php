<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $r) {
        $user = User::where('username', $r->username)->where('password', md5($r->password))->first();
        if ($user) {
            session()->put('username', $user->username);
            session()->put('userid', $user->id);
            session()->put('UserType', $user->UserType);

            if ($user->UserType === 'SuperAdmin' || $user->UserType === 'Admin') {
                return redirect('/administration');
            } else {
                return redirect('/');
            }
        } else {
        $error = 'ERROR!';
            return view('/login', compact('error'));
        }
    }

    public function match_password(Request $r) {
        $user = User::where('username', session('username'))->first();
        if($user->password == md5($r->current_password)) {
            $data = 'true';
        } else {
            $data = 'false';
        }
        return response()->json($data);
    }

    public function update_password(Request $r) {
        $user = User::where('username', session('username'))->first();
        $pass = md5($r->new_password);
        $user->password = $pass;
        $user->save();
        $message = 'Success';
        return view('/change-password', compact('message'));
    }

    public function reset_user_password(Request $r) {
        $user = User::where('username', $r->client_username)->first();
        if($user) {
            $pass = md5($r->client_username . 123);
            $user->password = $pass;
            $user->save();
            $code = 'Success!';
            $color = '#008321';
            $message = 'Password reset successful.';
        } else {
            $code = 'Error!';
            $color = '#990000';
            $message = 'User not found.';
        }
        return view('/reset-user-password', compact('message', 'code', 'color'));
    }

    public function logout() {
        session()->flush();
        return redirect('/');
    }
}
