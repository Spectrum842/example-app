<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use LDAP\Result;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    // 7 methods by contoller : index,show,create,store,edit,updatedestroy
    // respectivement : show all, show one, create one, register one, edit one, change one, destroy one

    public function index(){
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create(Post $post){


        return view('posts.create');
    }

}
