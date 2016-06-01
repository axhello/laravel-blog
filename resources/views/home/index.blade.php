@inject('options', 'App\Models\Options')
@extends('app')

@section('header')
    @if(!empty($options))
        <title>{{ $options->title() }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}" />
        <meta name="keywords" content="{{ $options->keywords() }}" />
    @endif
@stop

@section('content')
    <div id="Container" class="container">
        <main class="main-content">
            <div id="menu" class="vi tabular menu">
                @foreach($cates as $cate)
                    <a href="/{{ $cate->slug }}" class="item {{ $cates[0]['slug'] == $cate->slug ? 'active' : '' }}">
                        {{ $cate->name }}
                    </a>
                @endforeach
                <div class="switch">
                    <input class="mui-switch mui-switch-anim" type="checkbox" :checked="switch"  @click="toggleSwitch()">
                </div>
            </div>
            @if(count($articles) > 0)
                <section class="archive">
                    @foreach($articles as $article)
                        <article class="article">
                            <div class="post-warp">
                                <h1 class="title"><a href="/article/{{ $article->slug }}">{{ $article->title }}</a></h1>
                                <div class="content">
                                    {{ str_limit(strip_tags($article->content_html),200) }}
                                </div>
                                <div class="meta">
                                    <div class="date">
                                        <time>{{ $article->createdat() }}</time>
                                    </div>
                                    @if(count($article->tags) > 0)
                                        <div class="tags">
                                            @foreach($article->tags as $tag)
                                                <div class="ui tiny label"><a href="/tag/{{$tag->name}}">{{ $tag->name }}</a></div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if(!empty($article->thumbnail))
                                <div class="thumbnail" v-if="toggleImg">
                                    <img src="{{ $article->thumbnail }}" alt="" width="150" height="150">
                                </div>
                            @endif
                        </article>
                        <hr>
                    @endforeach
                </section>
                {!! $articles->render() !!}
            @endif
        </main>
    </div>
@stop