<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{

    public function index() {

        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));

    }

    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

    public function create() {
        return view('articles.create');
    }

    public function store() {

        Article::create($this->validateArticle());
        return redirect('/articles');

    }

    public function edit(Article $article) {
        return view('articles.edit', compact('article'));
    }
    public function update(Article $article) {

        $article->update($this->validateArticle());
        return redirect('/articles/' . $article->id);

    }
    
    public function validateArticle() {

        return request()->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'author' => 'required',
            'body' => 'required'
        ]);
        
    }
}
