<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Password Reset Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | outcome such as failure due to an invalid password / reset token.
    |
    */

    'reset' => 'Your password has been reset.',
    'sent' => 'We have emailed your password reset link.',
    'throttled' => 'Please wait before retrying.',
    'token' => 'This password reset token is invalid.',
    'user' => "If this email address is registered, you will receive password reset instructions.",
    'mail' => [
        'title'   => 'Password Reset',
        'intro'   => 'You are receiving this email because we received a password reset request for your account.',
        'action_button'  => 'Reset Password',
        'line1' => 'This password reset link will expire in 60 minutes.',
        'line2' => 'If you did not request a password reset, no further action is required.',
        'salutation' => 'Regards, :app_name Team',
        'copy_and_paste' => 'If you’re having trouble clicking the button, copy and paste the link below into your browser:',
        'all_rights_reserved' => 'All rights reserved'

    ]

];
