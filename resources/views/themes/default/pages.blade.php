@inject('options', 'App\Models\Options')
@extends('themes.default.layout')

@section('header')
    @if(!empty($options))
        <title>{{ $slug->title }} - {{ $options->title() }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}" />
        <meta name="keywords" content="{{ $options->keywords() }}" />
    @endif
@stop

@section('content')
    <div id="Container" class="container">
        <main class="main-content">
            <header class="header">
                <h1>{{ $slug->title }}</h1>
                <time datetime="{{ $slug->created_at }}">{{ $slug->created_at }}</time>
            </header>
            <article class="content">
                {!! $slug->content_html !!}
            </article>
        </main>
    </div>
@stop