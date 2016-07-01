@inject('options', 'App\Models\Options')
@extends('themes.default.layout')

@section('header')
    @if(!empty($options))
        <title>{{ Request::input('q') }} - 搜索结果 - {{ $options->title() }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}" />
        <meta name="keywords" content="{{ $options->keywords() }}" />
    @endif
@stop

@section('content')
    <div id="Container" class="container">
        <main class="main-content">
            <div id="menu" class="vi tabular menu">
                <div class="search-title">找到以下文章:</div>
                <div id="search">
                    <form action="/search">
                        <label for="search-input"><i class="fa fa-search" aria-hidden="true"></i><span class="sr-only">Search icons</span></label>
                        <input id="search-input" class="form-control input-lg"
                               placeholder="Enter Keywords"
                               name="q"
                               autocomplete="off"
                               spellcheck="false"
                               autocorrect="off"
                               {{ !empty(Request::input('q')) ? 'value='.Request::input('q') : 'value'  }}
                               tabindex="1">
                    </form>
                </div>
                <div id="switch">
                    <input class="mui-switch mui-switch-anim" type="checkbox" :checked="switch"  @click="toggleSwitch()">
                </div>
            </div>
            @if(empty(Request::get('q')))
                <div>你要找什么呢?</div>
                @elseif(count($results) > 0)
                    <section class="archive">
                        @foreach($results as $article)
                            <article class="article">
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
                                @if(!empty($article->thumbnail))
                                    <div class="thumbnail" v-if="toggleImg">
                                        <img src="{{ $article->thumbnail }}" alt="" width="150" height="150">
                                    </div>
                                @endif
                            </article>
                            <hr>
                        @endforeach
                    </section>
                    {!! $results->appends(\Request::only('q'))->render() !!}
                @else
                <div>没有找到你想要的哦?</div>
            @endif
        </main>
    </div>
@stop