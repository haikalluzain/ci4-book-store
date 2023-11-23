<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroupModel extends Model
{
    protected $table            = 'auth_groups';
    protected $protectFields    = false;
    protected $useTimestamps = true;
}
