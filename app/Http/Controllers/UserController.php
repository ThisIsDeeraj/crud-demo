<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserNumbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        //eloquent query
        // $user = User::where('users.id', $id)
        // ->join('user_numbers','user_numbers.user_id','users.id')
        // ->first();

        // query builder 
        // $user = DB::table('users')->where('users.id', $id)
        //     ->join('user_numbers', 'user_numbers.user_id', 'users.id')
        //     ->first();

        // using relationship 
        $user = User::with('contact')->where('id', $id)->first();

        // dd($user->contact->phone);

        return view('admin.users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        UserNumbers::create([
            'user_id' => $id,
            'phone' => $request->phone,
        ]);

        return redirect()->route('users.index');
    }
}
