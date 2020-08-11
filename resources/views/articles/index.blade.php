@extends('layouts.layout')

@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/assets/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Articles</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach ($articles as $article)
                    <div class="post-preview">
                        <a href="{{ route('articles.show', $article) }}">
                            <h2 class="section-heading">
                                {{ $article->title }}
                            </h2>
                            <h3 class="post-subtitle">
                                {{ $article->subtitle }}
                            </h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#">{{ $article->author }}</a> on
                            {{ $article->created_at }}</p>
                    </div>
                    <hr>
                @endforeach
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>
@endsection
