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
        return view('myViews.users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return "success";
    }
}
