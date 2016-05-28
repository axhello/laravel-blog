@inject('options', 'App\Models\Options')
@extends('app')

@section('header')
    @if(!empty($options))
        <title>{{ $tag->name }} - {{ $options->title() }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}" />
        <meta name="keywords" content="{{ $options->keywords() }}" />
    @endif
@stop

@section('content')
    <div id="Container" class="container">
        <main class="main-content">
            <div id="menu" class="vi tabular menu">
                <div class="search-title">找到以下对应标签的文章:</div>
                <div class="switch">
                    <input class="mui-switch mui-switch-anim" type="checkbox" :checked="switch"  @click="toggleSwitch()">
                </div>
            </div>
            @if(count($articles) > 0)
                <section class="index">
                    @foreach($articles as $article)
                        <article class="article">
                            <h1 class="title"><a href="/article/{{ $article->slug }}">{{ $article->title }}</a></h1>
                            <div class="content">
                                {{ str_limit(strip_tags($article->content_html),200) }}
                            </div>
                            <div class="meta">
                                <div class="date">
                                    <time>{{ $article->created_at }}</time>
                                </div>
                                @if(count($article->tags) > 0)
                                    <div class="tags">
                                        @foreach($article->tags as $tag)
                                            <div class="ui tiny label"><a href="/tag/{{$tag->name}}">{{ $tag->name }}</a></div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            @if(!empty($article->thumbnail))
                                <div class="thumbnail" v-if="toggleImg">
                                    <img src="{{ $article->thumbnail }}" alt="" width="150" height="150">
                                </div>
                            @endif
                        </article>
                    @endforeach
                </section>
                {{ $articles->render() }}
            @endif
        </main>
    </div>
@stop