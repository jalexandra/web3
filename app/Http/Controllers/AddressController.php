<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class AddressController extends Controller
{
    public function index()
    {
        //
    }

    public function create(): Factory|View|Application
    {
        return view('addresses.form', ['countries' => Country::all(), 'user_id' => request()->get('user_id')]);
    }

    public function store(AddressRequest $request)
    {
        $result = $request
            ->butSwitch('country')
            ->to('country_id')
            ->byApplying( fn(string $countryName)
            => Country::where('name', $countryName)->first()->id
            )->toSimpleArray();

        $address = Address::create($result);
        /** @var User $relatedUser */
        $relatedUser = User::find($request->get('user_id'));
        $relatedUser->shipping()->associate($address);
        $relatedUser->save();
        return redirect(Auth::id() == $relatedUser->id
                            ? route('profile')
                            : route('user.show', $relatedUser)
        );
    }

    public function show(Address $address)
    {
        //
    }

    public function edit(Address $address): Factory|View|Application
    {
        return view('addresses.form', ['countries' => Country::all(), 'user_id' => request()->get('user_id'), 'address' => $address]);
    }

    public function update(AddressRequest $request, Address $address): Redirector|Application|RedirectResponse
    {
        $result = $request
            ->butSwitch('country')
            ->to('country_id')
            ->byApplying( fn(string $countryName)
                => Country::where('name', $countryName)->first()->id
            )->toSimpleArray();
        $address->update($result);
        $address->save();
        $relatedUser = User::find($request->get('user_id'));
        return redirect(Auth::id() == $relatedUser->id
            ? route('profile')
            : route('user.show', $relatedUser)
        );
    }

    public function destroy(Address $address)
    {;
        /** @var User $relatedUser */
        $relatedUser = User::find(request()->get('user_id'));
        $relatedUser->shipping_id = null;
        $relatedUser->save();
        $address->delete();
        return redirect(Auth::id() === $relatedUser->id ? route('profile') : route('user.show', $relatedUser));
    }
}
