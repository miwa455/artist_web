<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\NewUserIntroduction;
use Illuminate\Contracts\Mail\Mailer;

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
    public function store(Request $request, Mailer $mailer)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tel' => 'required|string|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $newUser = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'tel' => $request->tel,
            'logic_delete_flag' => $request->logic_delete_flag,
            'favorite' => $request->favorite,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($newUser));

        Auth::login($newUser);

        //メールを送信処理
        $allUser = User::get();
        foreach ($allUser as $user) {
            $mailer->to($user->email)
                ->send(new NewUserIntroduction($user, $newUser));
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
