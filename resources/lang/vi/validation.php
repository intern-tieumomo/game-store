<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'email' => [
            'unique' => 'Email này đã được sử dụng',
            'required' => 'Email không thể để trống',
            'email' => 'Nhập đúng định dạng email',
            'max' => 'Email không thể vượt quá 255 kí tự',
        ],
        'password' => [
            'required' => 'Mật khẩu không thể để trống',
            'min' => 'Mật khẩu phải có ít nhất 8 kí tự',
            'confirmed' => 'Xác nhận mật khẩu không khớp',
        ],
    ],
];
