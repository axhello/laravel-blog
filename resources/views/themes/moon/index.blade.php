@inject('options', 'App\Models\Options')
@extends('themes.moon.layout')

@section('header')
    @if(!empty($options))
        <title>{{ $options->title() }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}" />
        <meta name="keywords" content="{{ $options->keywords() }}" />
    @endif
@stop

@section('content')
    <div class="content">
        @foreach($results as $result)
        <div class="w-dyn-list blog-list">
            <div class="w-dyn-items">
                <div class="w-dyn-item">
                    <div class="post-wrapper">
                        <a href="/article/{{ $result->slug }}" class="w-inline-block blog-title-link">
                            <h1 class="blog-title">{{ $result->title }}</h1>
                        </a>
                        <div class="post-info-wrapper">
                            <div class="post-info">{{ $result->createdat() }}</div>
                            <div class="post-info">|</div>
                            @if(count($result->tags) > 0)
                                @foreach($result->tags as $tag)
                                    <a class="post-info when-link" href="/tag/{{$tag->name}}">{{ $tag->name }}</a>
                                @endforeach
                            @else
                                <a class="post-info when-link">None</a>
                            @endif
                        </div>
                        <p>{{ str_limit(strip_tags($result->content_html),200) }}</p>
                        <a class="w-button button-round" href="/article/{{ $result->slug }}">Continue reading →</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="button-wrapper">
            <a href="#" class="w-button button">←&nbsp;More posts</a>
            <a href="#" class="w-button button">More posts&nbsp;→</a>
            {!! $articles->render() !!}
        </div>
    </div>
@stop