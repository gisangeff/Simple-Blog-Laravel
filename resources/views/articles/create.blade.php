@extends('layouts.layout')

@section('title')
    Create Article
@endsection

@section('header')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/assets/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Create New Article</h1>
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
                <h2 class="section-heading">New Article</h2>
                <form method="POST" action="{{ route('articles.index') }}" id="contactForm" novalidate>
                    @csrf
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" 
                              class="form-control" 
                              name="title" 
                              placeholder="Title" 
                              id="title"
                              value="{{ old('title') }}" required
                              data-validation-required-message="Please enter article title.">
                            <p class="help-block text-danger"></p>
                            @error('title')
                              <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
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
                              value="{{ old('subtitle') }}">
                            @error('subtitle')
                              <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
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
                              data-validation-required-message="Please enter content.">{{ old('body') }}</textarea>
                            <p class="help-block text-danger"></p>
                            @error('body')
                              <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <p style="font-size: 1.5em; color: #858585">Select tags here:</p>
                            <label>Tags</label>
                            <select name="tags[]"
                                multiple 
                                class="form-control">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" style="font-size: 1.5em;">{{ $tag->name}}</option>
                            @endforeach
                            </select>
                            <p class="help-block text-danger"></p>
                            @error('tags')
                              <p class="help-block text-danger" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
