<?php 

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function updateProfile($request)
    {
        $user = User::where('id', $request->id)->first();
        $user->name     = $request->user_name;
        $user->address  = $request->user_address;
        $user->phone_no = $request->phone_no;

        $password       = $request->user_password;
        $profile_pic    = $request->file('profile_pic');

        if (isset($password)) 
        {
            $user->password = Hash::make($password); 
        }
        if (isset($profile_pic)) 
        {
            $image_full_name        = $request->id.'.'.strtolower($profile_pic->getClientOriginalExtension());
            $upload_path            = 'images/users/';
            $image_url              = $upload_path.$image_full_name;
            $profile_pic->move($upload_path,$image_full_name);
            $image  = $image_url;
            $user->profile_pic = $image;
        }

        if ($user->save()) 
            return true;
        else
            return false;
    }

    public function checkPassword($request)
    {
        try {
            $hashed_password = User::select('password')->where('email', $request->email)->first();

            if (Hash::check($request->current_password, $hashed_password->password))
                return true;
            else 
                return false;
        } catch (Throwable $th) {
            throw $th;
        }
    }
}