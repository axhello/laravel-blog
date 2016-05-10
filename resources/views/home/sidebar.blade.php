<div id="sidebar">
    <header>
        <span class="image avatar">
            <a href="/"><img src="/css/home/img/img.jpg" alt=""></a>
        </span>
        <h1 id="logo"><a>Ciyuanai</a></h1>
        <p>远的不是距离,而是次元!</p>
    </header>
    <nav id="nav">
        <ul>
            <li><a href="/" id="one-link">Home</a></li>
            <li><a href="#two" id="two-link">I can do that</a></li>
            <li><a href="/links" id="links" >My Friends</a></li>
            @foreach($pages as $page)
            <li><a href="/pages/{{$page->slug}}" id="about">{{$page->title}}</a></li>
            @endforeach
        </ul>
    </nav>
    <footer>
        <ul class="icons">
            <li><a href="#" class="icon icon-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon icon-sina-weibo"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon icon-steam"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon icon-github"><span class="label">Github</span></a></li>
            <li><a href="#" class="icon icon-mail"><span class="label">Email</span></a></li>
        </ul>
    </footer>
</div>