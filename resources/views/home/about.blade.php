@extends('app')
@section('header')
    @if(!empty($options))
        <title>About - {{ $options->title }}</title>
        <meta name="author" content="{{ $options->author }}">
        <meta name="description" content="{{ $options->description }}| {{ $options->title }}" />
        <meta name="keywords" content="{{ $options->keywords }}" />
    @endif
@stop
@section('content')
    <div id="Container" class="container">
        <main class="main-content">
            <header><h2 class="about-title">About Me</h2></header>
            <div class="about">
                <ul>
                    <li>94后。懒癌待拯救，喜欢折腾自己感兴趣的东西。</li>
                    <li>患有"重度网络禁断症"，一定不能断网QAQ，不然就觉得跟世界隔绝了一样</li>
                    <li>喜欢听歌、轻音乐、电子音乐、Remix、看看动漫、追追番之类的</li>
                    <li>喜欢玩游戏，一般都是在steam平台上的，ID：<a href="http://steamcommunity.com/id/itobu/" target="_blank">Axhello</a>，欢迎加我一起玩游戏</li>
                    <li>欢迎关注我的新浪微博<a href="http://weibo.com/u/2724106627" target="_blank">@已知真相的围观群众</a></li>
                </ul>
            </div>
        </main>
    </div>
@stop