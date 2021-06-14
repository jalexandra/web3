<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Models\Order;
use App\Utils\StatusCode;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(BouncerCheck::class)->except('myOrders', 'show');
    }

    public function myOrders(): Factory|View|Application
    {
        return view('orders.index')->with('orders', Order::where('user_id', Auth::id())->get());
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

    public function show(Order $order): Factory|View|Application
    {
        if( $order->user_id !== Auth::id() && Auth::user()->cant('show', Order::class) )
            abort(StatusCode::FORBIDDEN);
        return view('orders.show')->with('order', $order);
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Order $order): Redirector|Application|RedirectResponse
    {
        $order->status_num += 1;
        $order->save();
        return redirect(route('order.show', [$order]));
    }

    public function destroy(Order $order): Redirector|Application|RedirectResponse
    {
        $order->delete();
        return redirect(route(
            Auth::user()->can('index', Order::class) ? 'order.index' : 'my-orders'
        ));
    }
}
