<?php

namespace Config;

use Myth\Auth\Config\Auth as MythAuthConfig;

class Auth extends MythAuthConfig
{
    /**
     * --------------------------------------------------------------------
     * Password Validators
     * --------------------------------------------------------------------
     * Kamu bisa menonaktifkan pengecekan password bocor (PwnedValidator)
     * agar tidak butuh koneksi internet saat register/login.
     */
    public $passwordValidators = [
        // \Myth\Auth\Authentication\Passwords\PwnedValidator::class, // dinonaktifkan
        \Myth\Auth\Authentication\Passwords\CompositionValidator::class,
    ];
}