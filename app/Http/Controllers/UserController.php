<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index() {
         return User::all()->toArray();
     }

     public function show(User $user) {
         return $user->toArray();
     }

     public function store(Request $request) {
         $attrs = $request->validate([
             'name' => ['required', 'unique:users'],
             'email' => ['required', 'unique:users'],
             'password' => 'required',
         ]);

         return User::query()->create($attrs);
     }
}
