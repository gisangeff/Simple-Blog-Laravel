<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;


class ArticleController extends Controller
{

    public function index() {

        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles()->simplePaginate(3);

        } else {
            $articles = Article::latest()->simplePaginate(3);
        }

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
        return redirect(route('articles.index'));

    }

    public function edit(Article $article) {
        return view('articles.edit', compact('article'));
    }
    public function update(Article $article) {

        $article->update($this->validateArticle());
        return redirect(route('articles.show', $article));

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
