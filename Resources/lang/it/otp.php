<?php

declare(strict_types=1);

return [
    'otp_code' => 'OTP Code',
    'title' => 'Password Expired, Reset Password',
    'heading' => 'Create A New Password',
    'sub_heading' => 'Your Password Has Expired, Please Create A New Password',
    'form' => [
        'current_password' => [
            'label' => 'Current Password',
            'validation_attribute' => 'current_password',
        ],
        'password' => [
            'label' => 'Password',
            'validation_attribute' => 'password',
        ],
        'password_confirmation' => [
            'label' => 'Confirm Password',
        ],
    ],
    'fields' => [
        'current_password' => [
            'label' => 'Current Password',
            'validation_attribute' => 'current_password',
        ],
        'password' => [
            'label' => 'Password',
            'validation_attribute' => 'password',
        ],
        'password_confirmation' => [
            'label' => 'Confirm Password',
        ],
    ],
    'reset_password' => 'Reset Password',
    'password_reset' => 'Password Reset',

    'mail' => [
        'subject' => 'OTP Code',
        'greeting' => 'Hello!',
        'line1' => 'Your OTP code is: :code',
        'line2' => 'This code will be valid for :seconds seconds.',
        'line3' => 'If you did not request a code, please ignore this email.',
        'salutation' => 'Best Regards, :app_name',
    ],

    'view' => [
        'time_left' => 'seconds left',
        'resend_code' => 'Resend Code',
        'verify' => 'Verify',
        'go_back' => 'Go Back',
    ],

    'notifications' => [
        'title' => 'OTP Code Sent',
        'body' => 'The verification code has been sent to your e-mail address. It will be valid in :seconds seconds.',
        'wrong_password' => [
            'title' => 'Wrong Password',
            'body' => 'The current password you entered is incorrect.',
        ],
        'column_not_found' => [
            'title' => 'Column Not Found',
            'body' => 'Either the column ":column_name" or the password column ":password_column_name" was not found in the :table_name table.',
        ],
        'password_reset' => [
            'success' => 'Password Reset Successful',
        ],
        'same_password' => [
            'title' => 'Same Password',
            'body' => 'The new password must be different from the current password.',
        ],
    ],
    'exceptions' => [
        'column_not_found' => 'Either the column ":column_name" or the password column ":password_column_name" was not found in the ":table_name" table. Please publish migrations and run them, if the error still persists, publish the config file and update the table_name, column_name, and password_column_name values.',
    ],

    'validation' => [
        'invalid_code' => 'The code you entered is invalid.',
        'expired_code' => 'The code you entered has expired.',
    ],
];
