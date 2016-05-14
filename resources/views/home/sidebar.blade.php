<div id="sidebar">
    <header>
        <span class="image avatar">
            <a href="/"><img src="/css/home/img/img.jpg" alt=""></a>
        </span>
        <h1 id="logo"><a>Ciyuanai</a></h1>
        <p>{{ $options->description }}</p>
    </header>
    <nav id="nav">
        <ul>
            <li><a href="/" id="one-link">Home</a></li>
            @foreach($pages as $page)
                <li><a href="/pages/{{$page->slug}}" id="about">{{$page->title}}</a></li>
            @endforeach
            <li><a href="/links" id="links" >My Friends</a></li>
        </ul>
    </nav>
    <footer>
        <ul class="icons">
            <li><a href="{{ $options->twitter }}" target="_blank" class="icon icon-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="{{ $options->weibo }}" target="_blank" class="icon icon-sina-weibo"><span class="label">Weibo</span></a></li>
            <li><a href="{{ $options->steam }}" target="_blank" class="icon icon-steam"><span class="label">Steam</span></a></li>
            <li><a href="{{ $options->github }}" target="_blank" class="icon icon-github"><span class="label">Github</span></a></li>
            <li><a href="mailto:{{ $options->email }}" class="icon icon-mail"><span class="label">Email</span></a></li>
        </ul>
    </footer>
</div>