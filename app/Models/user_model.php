<?php

namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    protected $table = 'form';
    protected $protectFields = false;
    protected $allowedfield = ['name','email','password','number'];
    
   
}

?>