<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordMailer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            "type" => "required"
        ]);

        $randomPassword = Str::random(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'age' => $request->age,
            'city' => $request->city,
            'phone' => $request->phone,
            'password' => Hash::make($randomPassword),
        ]);

        event(new Registered($user));

        Mail::to($user->email)->send(new PasswordMailer($randomPassword));

        Auth::login($user);

        if ($user->type == "seller") {
            return redirect()->route("seller.index");
        }
        return redirect()->route("customer.index");
    }
}
