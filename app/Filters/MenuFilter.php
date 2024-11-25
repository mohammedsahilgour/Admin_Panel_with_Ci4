<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\MenuModel; // Ensure this model exists and is properly defined

class MenuFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        $menuModel = new MenuModel();
        $menuData = $menuModel->getMenu(); // Assuming this returns the menu data

        // Share the menu data globally with views
        $renderer = \Config\Services::renderer();
        $renderer->setData(['menu' => $menuData], 'raw');
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Optional: Logic after request
    }
}
