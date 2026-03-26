<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * CORS Filter
 * 
 * Handles Cross-Origin Resource Sharing (CORS) headers
 * Allows frontend applications to communicate with backend API
 */
class CorsFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By returning false, you may stop execution of further filters down the chain,
     * though execution will go on as normal.
     *
     * @param RequestInterface $request
     * @param array|null $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get allowed origins from environment
        $allowedOrigins = [
            'http://localhost:3000',           // Local development
            'http://localhost:8080',           // Alternative port
            'http://127.0.0.1:3000',           // Localhost alias
        ];
        
        // Add production origins from .env if configured
        $envOrigins = env('cors.allowedOrigins');
        if (!empty($envOrigins)) {
            $allowedOrigins = array_merge($allowedOrigins, explode(',', $envOrigins));
        }

        $origin = $request->getHeaderLine('Origin');

        // Check if origin is allowed
        if (!empty($origin) && in_array($origin, $allowedOrigins)) {
            header('Access-Control-Allow-Origin: ' . $origin);
            header('Access-Control-Allow-Credentials: true');
        }

        // Set allowed methods
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');

        // Set allowed headers
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

        // Set max age for preflight cache (24 hours)
        header('Access-Control-Max-Age: 86400');

        // Handle preflight requests
        if ($request->getMethod() === 'options') {
            return response()
                ->setStatusCode(200)
                ->setHeader('Cache-Control', 'public, max-age=86400');
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. Changes made here should not include
     * the body, headers, or other items that might break things,
     * but instead should only be used to
     * add Http-only cookies if needed, and to add headers that
     * the requests need. Provide your return type now since there
     * is a good chance that the framework may
     * try to use the void return type in the future.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array|null $arguments
     *
     * @return void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Add CORS headers to response as well
        $allowedOrigins = [
            'http://localhost:3000',
            'http://localhost:8080',
            'http://127.0.0.1:3000',
        ];
        
        $envOrigins = env('cors.allowedOrigins');
        if (!empty($envOrigins)) {
            $allowedOrigins = array_merge($allowedOrigins, explode(',', $envOrigins));
        }

        $origin = request()->getHeaderLine('Origin');
        
        if (!empty($origin) && in_array($origin, $allowedOrigins)) {
            $response->setHeader('Access-Control-Allow-Origin', $origin);
            $response->setHeader('Access-Control-Allow-Credentials', 'true');
        }

        $response->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        $response->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
    }
}
