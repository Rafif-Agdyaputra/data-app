<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'email', 'gender', 'hobbies', 'country', 'status'];
    
    public function getUserByEmail($email) {
        return $this->where('email', $email)->first();
    }
}
