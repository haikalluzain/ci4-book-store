<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupUserModel extends Model
{
    protected $table            = 'auth_groups_users';
    protected $protectFields    = false;
    protected $useTimestamps = true;
}
