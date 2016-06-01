@inject('options', 'App\Models\Options')
<div id="sidebar">
    <header>
        <span class="image avatar">
            <a href="/"><img src="/css/home/img/img.jpg" alt=""></a>
        </span>
        <h1 id="logo"><a>Ciyuanai</a></h1>
        <p>{{ $options->descriptions() }}</p>
    </header>
    <nav id="nav">
        <ul>
            <li>
                <a href="/" id="one-link">
                    <i class="fa fa-home fa-lg"></i>
                    <span>Home</span>
                </a>
            </li>
            @foreach($pages as $page)
                <li>
                    <a href="/pages/{{ $page->slug }}" id="about">
                        <i class="fa fa-pagelines fa-lg"></i>
                        <span> {{ $page->title }}</span>
                    </a>
                </li>
            @endforeach
            <li>
                <a href="/links" id="links" >
                    <i class="fa fa-at fa-lg"></i>
                    <span>My Friends</span>
                </a>
            </li>
        </ul>
    </nav>
    <section id="search">
        <form action="/search">
            <label for="search-input"><i class="fa fa-search" aria-hidden="true"></i><span class="sr-only">Search icons</span></label>
            <input id="search-input" class="form-control input-lg" placeholder="Search..." name="q" autocomplete="off" spellcheck="false" autocorrect="off" tabindex="1">
        </form>
    </section>
    <footer>
        <ul class="icons">
            <li><a href="{{ $options->getFirstData()->twitter }}" target="_blank" class="icon icon-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="{{ $options->getFirstData()->weibo }}" target="_blank" class="icon icon-sina-weibo"><span class="label">Weibo</span></a></li>
            <li><a href="{{ $options->getFirstData()->steam }}" target="_blank" class="icon icon-steam"><span class="label">Steam</span></a></li>
            <li><a href="{{ $options->getFirstData()->github }}" target="_blank" class="icon icon-github"><span class="label">Github</span></a></li>
            <li><a href="mailto:{{ $options->getFirstData()->email }}" class="icon icon-mail"><span class="label">Email</span></a></li>
        </ul>
    </footer>
</div>