<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'form';
    protected $protectFields = false;
    protected $allowedfield = ['name','email','password','number'];
    
     public function getMenu(){
        $query = $this->db->query("SELECT * FROM menu where id='16'");
        return  $result = $query->getRowArray();
     }
   
}

?>