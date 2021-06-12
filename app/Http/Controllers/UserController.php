<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Utils\StatusCode;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

    public function show(User $user): Factory|View|Application
    {
        return view('users.show')->with('user', $user);
    }

    public function edit(User $user): Factory|View|Application
    {
        return view('users.form')->with('user', $user);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->save();
        return redirect(Auth::user()->can('show', User::class)
            ? route('user.show', [$user])
            : route('profile')
        );
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect(route(Auth::user()->can('index', User::class) ? 'user.index' : 'home'));
    }
}
