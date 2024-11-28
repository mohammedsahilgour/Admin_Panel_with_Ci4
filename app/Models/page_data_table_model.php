<?php

namespace App\Models;

use CodeIgniter\Model;

class page_data_table_model extends Model
{
    protected $table = 'pages';
    protected $protectFields = false;
    protected $allowedfield = ['name','email'];
    

    public function getFilteredBlogs($start, $length, $search, $order_by, $order_dir, $start_date, $end_date)
    {
        $builder = $this->builder('pages');
    
        // Add search conditions
        if (!empty($search)) {
            $builder->groupStart()
                    ->like('title', $search)
                    ->orLike('Number', $search)
                    ->orLike('email', $search)
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
        $builder->select('id, title, email,Description	, Number , Date');
    
        // Execute the query and return the result
        return $builder->get()->getResultArray();
    }
    
    public function countAllBlogs()
    {
        return $this->builder('pages')->countAllResults();
    }
    
    public function countFilteredBlogs($search, $start_date = null, $end_date = null)
    {
        $builder = $this->builder('pages');
    
        // Add search conditions
        if (!empty($search)) {
            $builder->like('title', $search)
                    ->orLike('Number', $search)
                    ->orLike('email', $search);
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