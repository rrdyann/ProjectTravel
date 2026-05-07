<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username',
        'email',
        'no_hp',
        'alamat',
        'kota',
        'pekerjaan',
        'role',
        'password_hash'
    ];
}