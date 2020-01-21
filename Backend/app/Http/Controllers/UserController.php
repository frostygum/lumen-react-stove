<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    /**
     * logout the authenticated User.
     *
     * @return Response
     */
    public function logout()
    {
        return response()->json(['user' => Auth::logout(true)], 200);
    }

}
