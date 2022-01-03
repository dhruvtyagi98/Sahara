<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * This functions returns the profile view.
     *
     * @return void
     */
    public function index()
    {
        return view('user.profile');
    }

    /**
     * This function is used to update User Profile and change password.
     *
     * @param UpdateUserRequest $request
     * @return void
     */
    public function update(UpdateUserRequest $request)
    {
        $validated = $request->validated();
        $result = UserService::updateProfile($request);

        if ($result) 
            return back()->with('message', 'Profile Updated Successfully');
        else    
            return back()->withErrors('Please try Again Later!');
    }

    public function checkPassword(Request $request)
    {
        $hashed_password = User::select('password')->where('email', $request->email)->first();
        if(Hash::check($request->current_password, $hashed_password->password))
            return (['success' => true]);
        else
            return (['success' => false]);
    }
}
