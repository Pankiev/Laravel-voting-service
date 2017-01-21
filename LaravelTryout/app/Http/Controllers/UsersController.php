<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use \Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = ['jacek', 'gacek', 'placek', 'benny'];
        $compactedUsers = compact('users');
        return view('users.index', $compactedUsers);
    }

    public function create()
    {
        return redirect('register');
    }

    public function show($nickname)
    {
        $isLoggedIn = Auth::check();
        $otherUser = User::where('nickname', $nickname)->take(1)->get()[0];

        $usersPage = $isLoggedIn && Auth::user()->getAttribute('id') === $otherUser->getAttribute('id');
        if($usersPage)
            return view('users.authenticatedUser');

        return view('users.user', compact('otherUser'));
    }

}
