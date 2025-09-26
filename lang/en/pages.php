<?php
//TODO criar um arquivo page.php e categorizar pelo nome da pagina em vez de um arquivo por pagina
return [
    'login' => [
        'inputs' => [
            'email' => 'Email',
            'password' => 'Password',
            'remember' => 'Remember me',
        ],
        'forgot_password' => 'Forgot your password?',
        'dont_have_account' => 'Don\'t have an account?',
        'log_in' => 'Log in',
    ],
    'register' => [
        'inputs' => [
            'user_name' => 'User Name',
            'email' => 'Email',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
        ],
        'register' => 'Register',
        'already_have_account' => 'Already have an account?',
    ],
    'forgot_password' => [
        'inputs' => [
            'email' => 'Email',
        ],
        'title' => 'Forgot Password',
        'warning' => 'Enter your e-mail and we will send you a link to reset your password.',
        'send' => 'Send Reset Link',
        'back_to_login' => 'Back to Login',
    ],
    'home' => [
        'add_post' => 'New Post',
        'all' => 'All',
    ],

];
