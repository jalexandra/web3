<?php

namespace App\Http\Controllers;

use App\Http\Requests\FillInDetailsRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Order;
use App\Utils\ArrayHelper;
use App\Utils\ArrayReplacer;
use App\Utils\Cart;
use App\Utils\Request;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

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
            /** @var Address $addressInDatabase */
            $addressInDatabase = Address::find($request->get('used_address'));
            if($addressInDatabase->equals($switchedRequest)){
                $address = $addressInDatabase;
            }else{
                $address = Address::make($switchedRequest);
            }
        }else{
            $address = Address::make($switchedRequest);
        }

        return view('checkout.step-four', [
            'address' => $address,
            'cart' => Cart::getContent()
        ]);
    }
}
