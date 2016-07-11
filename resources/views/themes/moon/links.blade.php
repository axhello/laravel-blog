@inject('options', 'App\Models\Options')
@extends('themes.moon.layout')

@section('header')
    @if(!empty($options))
        <title>Links - {{ $options->title() }}</title>
        <meta name="author" content="{{ $options->author() }}">
        <meta name="description" content="{{ $options->descriptions() }}| {{ $options->title() }}" />
        <meta name="keywords" content="{{ $options->keywords() }}" />
    @endif
@stop

@section('content')
    <div class="content">
        <div class="w-container">
            <div class="post-title-section">
                <h1>My Friends</h1>
                <div class="post-info-wrapper">
                    <div class="post-info">欢迎站长们申请交换友链,看站长站点情况添加友链~</div>
                </div>
            </div>
            <div class="body-copy">
                <div class="links-box">
                    <ul class="friends-list">
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
            </div>
        </div>
    </div>
@stop