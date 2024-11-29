<?php

namespace App\Models;

use CodeIgniter\Model;

class company_table_model extends Model
{
    protected $table = 'companydetail';
    protected $protectFields = false;
    protected $allowedfield = ['name','email'];
    


    public function getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date)
    {
        $builder = $this->builder('companydetail');
    
        // Add search conditions
        if (!empty($search)) {
            $builder->groupStart()
                    ->like('company_name', $search)
                    ->orLike('company_type', $search)
                    ->orLike('company_email', $search)
                    ->groupEnd();
        }
    
        // Add date filter if provided
        if (!empty($start_date) && !empty($end_date)) {
            $builder->where('date >=', $start_date)
                    ->where('date <=', $end_date);
        }
    
        // Add order by condition
        if (!empty($order_by) && !empty($order_dir)) {
            $builder->orderBy($order_by, $order_dir);
        } else {
            $builder->orderBy('id', 'asc'); // Default order by ID ascending
        }
    
        // Apply limits for pagination
        $builder->limit($length, $start);
    
        // Select the necessary fields (including 'title')
        $builder->select('id, company_name, company_type, company_email,  date');
    
        // Execute the query and return the result
        return $builder->get()->getResultArray();
    }
    
    public function countAllBlogs()
    {
        return $this->builder('companydetail')->countAllResults();
    }
    
    public function countFilteredBlogs($search, $start_date = null, $end_date = null)
    {
        $builder = $this->builder('companydetail');
    
        // Add search conditions
        if (!empty($search)) {
            $builder->like('company_name', $search)
                    ->orLike('company_type', $search)
                    ->orLike('company_email', $search);
        }
    
        // Add date filter if provided
        if (!empty($start_date) && !empty($end_date)) {
            $builder->where('date >=', $start_date)
                    ->where('date <=', $end_date);
        }
    
        // Return the count of filtered results
        return $builder->countAllResults();
    }
    
    

}
?>