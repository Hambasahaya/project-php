<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CorsFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Set header untuk mengizinkan permintaan dari semua domain.
        // Ganti "*" dengan daftar domain yang diizinkan jika ingin membatasi akses.
        $response = service('response');
        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->setHeader('Access-Control-Allow-Headers', 'X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');

        // Tangani metode OPTIONS dengan menghentikan eksekusi lebih lanjut.
        // Metode OPTIONS biasanya digunakan oleh browser untuk melakukan preflight request.
        if ($request->getMethod() === 'OPTIONS') {
            return $response;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Bisa kosongkan jika tidak ada yang perlu dilakukan setelah eksekusi
        // dari action method pada controller selesai.
    }
}
