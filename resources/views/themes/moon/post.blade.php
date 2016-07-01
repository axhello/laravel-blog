@inject('options', 'App\Models\Options')
@extends('themes.moon.layout')

@section('header')
    @if(!empty($options))
        <title>{{ $article->title }} - {{ $options->title()  }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}" />
        <meta name="keywords" content="{{ $options->keywords() }}" />
    @endif
@stop

@section('content')
    <div class="content">
        <div class="w-container">
            <div class="post-title-section">
                <h1>{{ $article->title }}</h1>
                <div class="post-info-wrapper">
                    <div class="post-info">{{ $article->created_at->format('F d, Y') }}</div>
                    <div class="post-info">|</div>
                    @if(count($article->tags) > 0)
                        @foreach($article->tags as $tag)
                            <a class="post-info when-link" href="/tag/{{$tag->name}}">{{ $tag->name }}</a>
                        @endforeach
                    @else
                        <a class="post-info when-link">None</a>
                    @endif
                </div>
            </div>
            <div class="w-richtext body-copy">
                {!! $article->content_html !!}
            </div>
            <div class="button-wrapper">
                <a href="#" class="w-button button">←&nbsp;View all posts</a>
            </div>
        </div>
    </div>
@stop