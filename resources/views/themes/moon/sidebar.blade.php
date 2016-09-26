@inject('options', 'App\Models\Options')
<span class="mobile btn-mobile-menu" >
    <i class="fa fa-list btn-mobile-menu__icon" :class="{'hidden': isOpen}" @click="toggleNav"></i>
    <i class="fa fa-angle-up btn-mobile-close__icon" :class="{'hidden': ! isOpen}" @click="toggleNav"></i>
</span>
<header class="panel-cover  panel-cover--collapsed">
        <div class="panel-main">
        <div class="panel-main__inner panel-inverted">
            <div class="panel-main__content">
                <a href="/"  class="blog-button">
                    <img src="/images/eriri.png" width="80" title="主页" class="panel-cover__logo logo">
                </a>
                <h1 class="panel-cover__title panel-title"><a href="/" title="Ciyuan'ai的主页" class="blog-button">Ciyuan'ai</a></h1>
                <span class="panel-cover__subtitle panel-subtitle">远的不是距离 而是次元</span>
                <hr class="panel-cover__divider">
                <p class="panel-cover__description">
                    {{ $options->descriptions() }}
                </p>
                <hr class="panel-cover__divider panel-cover__divider--secondary">
                <div class="navigation-wrapper animated"  :class="{'visible bounceInDown':isOpen}">
                    <div>
                        <nav class="cover-navigation cover-navigation--primary">
                            <ul class="navigation">
                                @foreach($cates as $cate)
                                <li class="navigation__item"><a href="/{{ $cate->slug }}" title="{{ $cate->name }}">{{ $cate->name }}</a></li>
                                @endforeach
                                @foreach($pages as $page)
                                <li class="navigation__item"><a href="/pages/{{ $page->slug }}" title="{{ $page->title }}">{{ $page->title }}</a></li>
                                @endforeach
                                <li class="navigation__item"><a href="/links">友情链接</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div><nav class="cover-navigation navigation--social">
                            <ul class="navigation">
                                <!-- Weibo -->
                                <li class="navigation__item">
                                    <a href="{{ $options->getFirstData()->weibo }}" title="Weibo" target="_blank">
                                        <i class="social fa fa-weibo"></i>
                                        <span class="label">Weibo</span>
                                    </a>
                                </li>
                                <!-- Github -->
                                <li class="navigation__item">
                                    <a href="{{ $options->getFirstData()->github }}" title="Github" target="_blank">
                                        <i class="social fa fa-github"></i>
                                        <span class="label">Github</span>
                                    </a>
                                </li>
                                <!-- Twitter -->
                                <li class="navigation__item">
                                    <a href="{{ $options->getFirstData()->twitter }}" title="Twitter" target="_blank">
                                        <i class="social fa fa-twitter"></i>
                                        <span class="label">Twitter</span>
                                    </a>
                                </li>

                                <!-- Google Plus -->
                                <li class="navigation__item">
                                    <a href="https://plus.google.com/107108267983477358170" rel="author" title="Google+" target="_blank">
                                        <i class="social fa fa-google-plus-square"></i>
                                        <span class="label">Google Plus</span>
                                    </a>
                                </li>

                                <!-- RSS -->
                                <li class="navigation__item">
                                    <a href="{{ $options->getFirstData()->steam }}" rel="author" title="Steam" target="_blank">
                                        <i class="social fa icon-steam"></i>
                                        <span class="label">Steam</span>
                                    </a>
                                </li>

                                <!-- Email -->
                                <li class="navigation__item">
                                    <a href="mailto:{{ $options->getFirstData()->email }}" title="Contact me">
                                        <i class="social fa fa-envelope"></i>
                                        <span class="label">Email</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-cover--overlay cover-slate"></div>
    </div>
</header>