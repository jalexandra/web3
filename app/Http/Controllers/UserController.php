<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Models\User;
use App\Utils\StatusCode;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(BouncerCheck::class)->except('profile');
    }

    public function profile(): View|Factory|Application
    {
        return view('users.show')->with(Auth::user());
    }

    public function index(): View|Factory|Application
    {
        return view('users.index')->with('users', User::all());
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
