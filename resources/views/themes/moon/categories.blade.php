@inject('options', 'App\Models\Options')
@extends('themes.moon.layout')

@section('header')
    @if(!empty($options))
        <title>{{ $options->title() }} - {{ $category->name }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}"/>
        <meta name="keywords" content="{{ $options->keywords() }}"/>
    @endif
@stop

@section('content')
    <div class="content">
        <div class="w-container">
            <h1 class="section-header">{{ $category->name }}</h1>
            @if(count($articles) > 0)
                <div class="cate-post-list">
                    <ol class="post-list">
                        @foreach($articles as $article)
                            <li>
                                <div class="post-wrapper">
                                    <a class="blog-title-link" href="/article/{{ $article->slug }}">
                                        <h1 class="blog-title">{{ $article->title }}</h1>
                                    </a>
                                    <p class="excerpt">{{ str_limit(strip_tags($article->content_html),200) }}</p>
                                    <div class="post-meta-wrapper">
                                        <div class="post-meta">{{ $article->createdat() }}</div>
                                        <div class="post-meta">|</div>
                                        @if(count($article->tags) > 0)
                                            @foreach($article->tags as $tag)
                                                <a class="post-meta when-link"
                                                   href="/tag/{{$tag->name}}">{{ $tag->name }}</a>
                                            @endforeach
                                        @else
                                            <a class="post-meta when-link">None</a>
                                        @endif
                                        <a class="w-button button-round" href="/article/{{ $article->slug }}">继续阅读→</a>
                                    </div>
                                    <hr class="post-divider">
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endif
            @if(count($articles) > 0)
                <div class="button-wrapper">
                    {!! $articles->links() !!}
                </div>
            @endif
        </div>
    </div>
@stop