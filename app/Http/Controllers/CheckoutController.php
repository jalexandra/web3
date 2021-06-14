<?php

namespace App\Http\Controllers;

use App\Http\Requests\FillInDetailsRequest;
use App\Models\{Address, Country, Order};
use App\Utils\Cart;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function stepOne(): Factory|View|Application
    {
        return view('checkout.step-one');
    }

    public function stepTwo(): Factory|View|Application
    {
        return view('checkout.step-two');
    }

    public function stepThree(): Factory|View|Application
    {
        return view('checkout.step-three', [
            'countries' => Country::all()->map(fn(Country $item) => $item->name),
            'shipping' => Auth::user()?->shipping ?? null
            ]);
    }

    public function stepFour(FillInDetailsRequest $request): Factory|View|Application
    {
        $switchedRequest = $request->butSwitch('country')
            ->to('country_id')
            ->byApplying(
                fn(string $country)
                    => Country::where('name', $country)
                        ->first()?->id
            )->toSimpleArray();
        if ($request->get('used_address')) {
            $addressInDatabase = Address::find($request->get('used_address'));
            if($addressInDatabase->equals($switchedRequest)){
                $address = $addressInDatabase;
            }else{
                $address = Address::create($switchedRequest);
            }
        }else{
            $address = Address::create($switchedRequest);
        }
        return view('checkout.step-four')
                ->with('address', $address)
                ->with('cart', Cart::getContent());
    }

    public function stepFive(Request $request){
        $order = Order::create([
            'user_id' => Auth::user()?->id,
            'shipping_id' => $request->input('address_id')
        ]);

        foreach (Cart::getContent() as $item) {
            $order->books()->attach($item['book']->id, ['amount' => $item['amount']]);
        }

        $order->save();

        Cart::clear();
        return view('checkout.step-five');
    }
}
