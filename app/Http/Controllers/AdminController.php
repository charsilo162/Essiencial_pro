<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
       public function center()
{
    return view('admin.all-centers');
}
       public function course()
{
    return view('admin.all-courses');
}
       public function users()
{
    return view('admin.all-users');
}
       public function video()
{
    return view('admin.all-videos');
}
}
