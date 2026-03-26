<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function health()
    {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'API is running',
            'timestamp' => date('Y-m-d H:i:s')
        ]);
    }

    public function index()
    {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Welcome to Fullstack Assignment API',
            'version' => '1.0.0',
            'endpoints' => [
                'health' => '/api/health',
                'users' => '/api/users',
                'auth' => '/api/auth'
            ]
        ]);
    }
}
