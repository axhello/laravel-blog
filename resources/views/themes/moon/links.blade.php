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
                    <div class="post-info">排名不分先后~ 欢迎dalao们交换友链_(:з」∠)_</div>
                </div>
            </div>
            <div class="body-copy">
                <div class="links-box">
                    <ul class="friends-list">
                        @foreach($links as $link)
                            <li class="clearfix">
                                <a href="{{ $link->url }}" target="_blank">
                                    <img class="link-logo" src="{{ $link->image }}" alt="">
                                    <div class="link-info">
                                        <h3 class="link-name">{{ $link->name }}</h3>
                                        <p class="link-desc">{{ $link->description }}</p>
                                        <span class="link-url">{{ $link->url }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop