<?php
namespace App\Controllers;

class HomeController
{
    public function home()
    {
        view('pages/home');
    }
    public function about()
    {
        view('pages/about');
    }
    public function events()
    {
        view('pages/events');
    }
    public function causes()
    {
        view('pages/causes');
    }
    public function investor()
    {
        view('pages/investor');
    }
    public function gallery()
    {
        view('pages/gallery');
    }
    public function blog()
    {
        view('pages/blog');
    }
    public function contact()
    {
        view('pages/contact');
    }
    public function joinUs()
    {
        view('pages/join-us');
    }
    public function notFound()
    {
        http_response_code(404);
        view('pages/404');
    }
}
