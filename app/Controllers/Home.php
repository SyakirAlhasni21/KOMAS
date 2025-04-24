<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        // Check if the user is logged in
        // if (session()->get('logged_in')) {
        //     // If logged in and the role is 'aparat', show the admin dashboard
        //     if (session()->get('role') === 'aparat') {
        //         return view('halaman/admin/dashboard');
        //     }
        //     // If logged in but not an 'aparat', show the beranda page
        //     else {
        //         return view('halaman/beranda',);
        //     }
        // } else {
        //     return view('halaman/beranda',);
        // }
        return view('halaman/beranda',);
    }
}
