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
        <div class="main-post-list">
            <ol class="post-list">
                @foreach($results as $result)
                <li>
                    <div class="post-wrapper">
                        <a href="/article/{{ $result->slug }}" class="blog-title-link">
                            <h2 class="blog-title">{{ $result->title }}</h2>
                        </a>
                        <p class="excerpt">{{ str_limit(strip_tags($result->content_html),360) }}</p>
                        {{--<p>{!! $result->short() !!}</p>--}}
                        <div class="post-meta-wrapper">
                            <div class="post-meta">{{ $result->createdat() }}</div>
                            <div class="post-meta">|</div>
                            @if(count($result->tags) > 0)
                                @foreach($result->tags as $tag)
                                    <a class="post-meta when-link" href="/tag/{{$tag->name}}">{{ $tag->name }}</a>
                                @endforeach
                            @else
                                <a class="post-meta when-link">None</a>
                            @endif
                            <a class="w-button button-round" href="/article/{{ $result->slug }}">继续阅读→</a>
                        </div>
                        <hr class="post-divider">
                    </div>
                </li>
                @endforeach
            </ol>
        </div>
        <div class="button-wrapper">
            {!! $results->render() !!}
        </div>
    </div>
@stop