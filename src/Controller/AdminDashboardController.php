<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class AdminDashboardController
{
    public function index()
    {
        return new Response('<h1>Dashboard</h1>');
    }
}