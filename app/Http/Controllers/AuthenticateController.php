<?php

namespace App\Http\Controllers;

use app\Helpers\Helper;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticateController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
            // 'profile' => 'image|mimes:jpg,png,jpeg,webp',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        if ($request->image) {
            $data['image'] = Helper::upload_image($request->image, 200, 250);
        }
        $user= User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success', 'register And Loged In successfully !!');

    }

    public function loginIndex(){
        return view('auth.login');
    }


    public function login(Request $request)
    {
        // return $request->all();
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {

                return back()->with('error', 'Invalid Credential !! Please Try Again ');

            }else{
                Auth::login($user);
                return redirect()->intended(RouteServiceProvider::HOME)->with('You are Loged In Successfully !!');

            }

    }


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('you are Loged Out Successfully');
    }

}
