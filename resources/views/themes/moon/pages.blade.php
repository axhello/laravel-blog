@inject('options', 'App\Models\Options')
@extends('themes.moon.layout')

@section('header')
    @if(!empty($options))
        <title>{{ $slug->title }} - {{ $options->title() }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }} | {{ $options->title() }}"/>
        <meta name="keywords" content="{{ $options->keywords() }}"/>
    @endif
@stop

@section('content')
    <div class="content">
        <div class="w-container">
            <div class="post-title-section">
                <h1>{{ $slug->title }}</h1>
                <div class="post-meta-wrapper">
                    <div class="post-meta">{{ $slug->created_at->format('F d, Y') }}</div>
                </div>
            </div>
            <div class="body-text">
                {!! $slug->content_html !!}
            </div>
        </div>
    </div>
@stop