<?php

namespace App\Controllers;

use App\Models\UserModel;

class Shared extends BaseController
{

    public function isLoggedIn()
    {
        $userModel = new UserModel();

        // Get the user's email from session
        $email = session()->get('user_email');

        // Check if the session contains user email
        if ($email !== null) {
            // Attempt to retrieve the user from the database based on the email
            $userModel = $userModel;
            $user = $userModel->where('email', $email)->first();

            if ($user) {
                return $user;
            }
        }

        // If user is not found in the database or session doesn't contain user email, return false
        return false;
    }


}
