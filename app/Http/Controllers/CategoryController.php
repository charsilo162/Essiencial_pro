<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the main course listing page.
     * The Livewire components (CourseList and CategorySidebar) handle the filtering.
     */
   public function index()
{
    return view('categories', [
        'categorySlug' => null,
    ]);
}

public function show($slug)
{
    return view('categories', [
        'categorySlug' => $slug,
    ]);
}
public function category()
{
    return view('category.categories');
}
}