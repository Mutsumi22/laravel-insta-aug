<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    //
    private $post;
    private $category;

    public function __construct(Category $category, post $post){
        $this->category = $category;
        $this->post = $post;
    }

    public function store(){
 
        $this->
    }
}
