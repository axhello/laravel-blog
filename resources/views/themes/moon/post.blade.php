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
                <div class="post-meta">
                    <time class="post-meta">{{ $article->created_at->format('F d, Y') }}</time>
                    <span class="post-meta">|</span>
                    @if(count($article->tags) > 0)
                        @foreach($article->tags as $tag)
                            <a class="post-meta when-link" href="/tag/{{$tag->name}}">{{ $tag->name }}</a>
                        @endforeach
                    @else
                        <a class="post-meta when-link">None</a>
                    @endif
                </div>
            </div>
            <div class="w-richtext body-copy">
                {!! $article->content_html !!}
            </div>
            <div class="article-page">
                <ul class="post-nav clearfix">
                    <li class="previous">
                        @if($prev_article)
                            <a href="/article/{{ $prev_article->slug }}" rel="prev">
                                <i class="fa fa-chevron-left"></i>
                                <strong>上一篇</strong>
                                <span>{{ $prev_article->title }}</span>
                            </a>
                        @else
                            <a class="is-nothing" rel="prev">
                                <i class="fa fa-chevron-left"></i>
                                <strong>上一篇</strong>
                                <span>没有了</span>
                            </a>
                        @endif
                    </li>
                    <li class="next">
                        @if($next_article && $next_article->created_at < Carbon\Carbon::now())
                            <a href="/article/{{ $next_article->slug }}" rel="next">
                                <i class="fa fa-chevron-right"></i>
                                <strong>下一篇</strong>
                                <span>{{ $next_article->title }}</span>
                            </a>
                        @else
                            <a class="is-nothing" rel="next">
                                <i class="fa fa-chevron-right"></i>
                                <strong>下一篇</strong>
                                <span>没有了</span>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
            <div id="footer" class="comment-footer">
                @include('themes.moon.duoshuo')
            </div>
        </div>
    </div>
@stop