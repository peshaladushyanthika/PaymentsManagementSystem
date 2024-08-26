<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function show($id)
    {
        // Fetch user with their orders and payments
        $user = User::with(['orders.payments'])->findOrFail($id);

        return view('welcome', compact('user'));
    }
}
