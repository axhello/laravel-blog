@extends('app')
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