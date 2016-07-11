@inject('options', 'App\Models\Options')
<div class="sidebar-column">
    <div  data-collapse="medium" class="w-nav navigation-bar">
        <div class="w-container">
            <a href="/" class="w-nav-brand logo-link">
                <h1 class="logo-text">Ciyuanai</h1>
            </a>
            <div class="w-nav-button menu-button" :class="{'w--open': isOpen}" @click="toggleNav">
                <i class="fa fa-bars" style="font-size: 17px"></i>
            </div>
        </div>
        <div class="w-nav-overlay" style="display: block">
            <nav role="navigation" class="w-nav-menu navigation-menu" :class="{'w--nav-menu-open': isOpen}">
                <div class="w-hidden-medium w-hidden-small w-hidden-tiny main-subheading">
                    {{ $options->descriptions() }}
                </div>
                <div class="w-hidden-medium w-hidden-small w-hidden-tiny divider"></div>
                <a href="/" class="w-nav-link nav-link {{ Request::getRequestUri() == '/' ? 'w--current' : '' }}">Home</a>
                @foreach($cates as $cate)
                    <a href="/{{ $cate->slug }}" class="w-nav-link nav-link {{ ltrim(Request::getRequestUri(),'/') == $cate->slug ? 'w--current' : '' }}">
                        {{ $cate->name }}
                    </a>
                @endforeach
                @foreach($pages as $page)
                    <a href="/pages/{{ $page->slug }}" class="w-nav-link nav-link">{{ $page->title }}</a>
                @endforeach
                <a href="/links" class="w-nav-link nav-link">Links</a>
                <div class="divider"></div>
                <div class="social-link-group">
                    <ul class="icons">
                        <li><a href="{{ $options->getFirstData()->twitter }}" target="_blank" class="icon icon-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="{{ $options->getFirstData()->weibo }}" target="_blank" class="icon icon-sina-weibo"><span class="label">Weibo</span></a></li>
                        <li><a href="{{ $options->getFirstData()->steam }}" target="_blank" class="icon icon-steam"><span class="label">Steam</span></a></li>
                        <li><a href="{{ $options->getFirstData()->github }}" target="_blank" class="icon icon-github"><span class="label">Github</span></a></li>
                        <li><a href="mailto:{{ $options->getFirstData()->email }}" class="icon icon-mail"><span class="label">Email</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>