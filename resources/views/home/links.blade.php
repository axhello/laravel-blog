@extends('app')
@section('header')
    @if(!empty($options))
        <title>Links - {{ $options->title }}</title>
        <meta name="author" content="{{ $options->author }}">
        <meta name="description" content="{{ $options->description }}| {{ $options->title }}" />
        <meta name="keywords" content="{{ $options->keywords }}" />
    @endif
@stop
@section('content')
    <div id="Container" class="container">
        <main class="main-content">
            <header><h2 class="link-title">My Friends</h2></header>
            <div class="links-box">
                <ul class="clearfix">
                    @foreach($links as $link)
                    <li>
                        <a href="{{ $link->url }}" target="_blank">
                            <img src="{{ $link->image }}" alt="">
                            <h3>{{ $link->name }}</h3>
                            <p>{{ $link->description }}</p>
                            <span>{{ $link->url }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </main>
    </div>
@stop