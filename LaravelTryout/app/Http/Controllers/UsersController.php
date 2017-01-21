<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = ['jacek', 'gacek', 'placek', 'benny'];
        $compactedUsers = compact('users');
        return view('myViews.users.index', $compactedUsers);
    }

    public function create()
    {
        return redirect('register');
    }

    public function show()
    {
        return view('myViews.users.user');
    }

}
