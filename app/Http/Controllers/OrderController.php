<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Models\Order;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(BouncerCheck::class)->except('myOrders');
    }

    public function myOrders(): Factory|View|Application
    {
        return view('orders.index')->with('orders', Order::latest()->where('user_id', Auth::id())->get());
    }

    public function index(): Factory|View|Application
    {
        return view('orders.index')->with('orders', Order::latest()->get());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
