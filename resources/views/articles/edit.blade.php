@extends('layouts.layout')

@section('title')
    Edit Article
@endsection

@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/assets/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Edit Article</h1>
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
                @if ($errors->any())
                    <p class="alert alert-info">No changes have been made.</p>
                @endif
                <h2 class="section-heading">Edit Article</h2>
                <form method="POST" action="{{ route('articles.show', $article) }}" id="contactForm" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" 
                              class="form-control" 
                              name="title" 
                              placeholder="Title" 
                              id="title"
                              value="{{ $article->title }}" required
                              data-validation-required-message="Please enter article title.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Subtitle</label>
                            <input type="text" 
                              class="form-control" 
                              name="subtitle" 
                              placeholder="Subtitle" 
                              id="subtitle"
                              value="{{ $article->subtitle }}">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Content</label>
                            <textarea rows="5" 
                              class="form-control" 
                              name="body" 
                              placeholder="Content" 
                              id="body" required
                              data-validation-required-message="Please enter content.">{{ $article->body }}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
