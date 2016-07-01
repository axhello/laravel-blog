@inject('options', 'App\Models\Options')
@extends('themes.default.layout')

@section('header')
    @if(!empty($options))
        <title>{{ $article->title }} - {{ $options->title()  }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}" />
        <meta name="keywords" content="{{ $options->keywords() }}" />
    @endif
@stop

@section('content')
    <div id="Container" class="container">
        <main class="main-content">
            <section id="section">
                <header class="header">
                    <h1>{{ $article->title }}</h1>
                    <time datetime="{{ $article->created_at }}">{{ $article->created_at }}</time>
                </header>
                <article class="content">
                    {!! $article->content_html !!}
                </article>
                <div class="article-page clearfix">
                    <div class="center aligned column">
                        @if($prev_article)
                            <a href="/article/{{ $prev_article->slug }}" class="prev">
                                <p>{{ $prev_article->title }}</p>
                                <i class="fa fa-chevron-left"></i><strong>上一篇</strong>
                            </a>
                            @else
                            <p>Nothing</p>
                        @endif
                    </div>
                    <div class="vertical divider">Or</div>
                    <div class="center aligned column">
                        @if($next_article && $next_article->created_at < Carbon\Carbon::now())
                            <a href="/article/{{ $next_article->slug }}" class="next">
                                <p>{{ $next_article->title }}</p>
                                <i class="fa fa-chevron-right"></i><strong>下一篇</strong>
                            </a>
                            @else
                            <p>Nothing</p>
                        @endif
                    </div>
                </div>
                <footer id="footer">
                    @include('default.disqus')
                    <div class="copy">
                        <p>Code is poetry.</p>
                    </div>
                </footer>
            </section>
        </main>
    </div>
@stop