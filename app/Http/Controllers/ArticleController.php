<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;


class ArticleController extends Controller
{

    public function index() {

        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles()->simplePaginate(5);

        } else {
            $articles = Article::latest()->simplePaginate(5);
        }

        return view('articles.index', compact('articles'));

    }

    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

    public function create() {
        return view('articles.create', ['tags' => Tag::all()]);
    }

    public function store() {
        
        $this->validateArticle();

        $article = new Article(request(['title', 'subtitle', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));

    }

    public function edit(Article $article) {
        return view('articles.edit', ['article' => $article, 'tags' => Tag::all()]);
    }
    public function update(Article $article) {

        $article->update($this->validateArticle());

        $article->tags()->detach($article->tags);
        $article->tags()->attach(request('tags'));

        return redirect(route('articles.show', $article));

    }
    
    public function validateArticle() {

        return request()->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'body' => 'required',
            'tags' => 'required|exists:tags,id'
        ]);
        
    }
}
