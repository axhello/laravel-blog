@inject('options', 'App\Models\Options')
@extends('themes.moon.layout')

@section('header')
    @if(!empty($options))
        <title>{{ $tag->name }} - {{ $options->title() }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}" />
        <meta name="keywords" content="{{ $options->keywords() }}" />
    @endif
@stop

@section('content')
    <div class="content">
        <div class="w-container">
            <h1 class="section-header">{{$tag->name}}</h1>
            @if(count($articles) > 0)
                @foreach($articles as $article)
                    <div class="w-dyn-list">
                        <div class="w-dyn-items">
                            <div class="w-dyn-item">
                                <div class="post-wrapper">
                                    <div>
                                        <a class="w-inline-block blog-title-link" href="/article/{{ $article->slug }}">
                                            <h1 class="blog-title">{{ $article->title }}</h1>
                                        </a>
                                        <div class="post-info-wrapper">
                                            <div class="post-info">{{ $article->createdat() }}</div>
                                            <div class="post-info">|</div>
                                            @if(count($article->tags) > 0)
                                                @foreach($article->tags as $tag)
                                                    <a class="post-info when-link" href="/tag/{{$tag->name}}">{{ $tag->name }}</a>
                                                @endforeach
                                            @else
                                                <a class="post-info when-link">None</a>
                                            @endif
                                        </div>
                                        <p class="post-summary">{{ str_limit(strip_tags($article->content_html),200) }}</p>
                                        <a class="w-button button-round" href="/article/{{ $article->slug }}">Continue reading →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="button-wrapper">
                <a href="#" class="w-button button">←&nbsp;All posts</a>
            </div>
        </div>
    </div>
@stop