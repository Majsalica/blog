<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show login form
     *
     * @return Application|Factory|View
     */
    public function showLoginForm()
    {
        return view('user.login');
    }

    /**
     * Login user
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::query()
            ->where('email', '=', $request->input('email'))
            ->first();

        if ($user instanceof User) {
            $match = Hash::check($request->input('email'), $user->password);
            if ($match) {
                Auth::login($user);
                return redirect()->route('posts');
            }
        }

        return redirect()
            ->back()
            ->withErrors(['No such user in our records!']);
    }

    /**
     * Show registration form
     *
     * @return Application|Factory|View
     */
    public function showRegistrationForm()
    {
        return view('user.register');
    }

    /**
     * Register user
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::login($user);

        return redirect()->route('posts');
    }

    /**
     * Logout user
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
