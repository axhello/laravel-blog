<div class="sidebar-menu toggle-others fixed">
    <div class="sidebar-menu-inner">
        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <a href="/admin/dashboard" class="logo-expanded">
                    <img src="/images/logo@2x.png" width="80" alt=""/>
                </a>
                <a href="/admin/dashboard" class="logo-collapsed">
                    <img src="/images/logo-collapsed@2x.png" width="40" alt="" />
                </a>
            </div>
            <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
            <div class="mobile-menu-toggle visible-xs">
                <a href="#" data-toggle="user-info-menu">
                    <i class="fa-bell-o"></i>
                    <span class="badge badge-success">7</span>
                </a>
                <a href="#" data-toggle="mobile-menu">
                    <i class="fa-bars"></i>
                </a>
            </div>
            <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
            <div class="settings-icon">
                <a href="#" data-toggle="settings-pane" data-animate="true">
                    <i class="linecons-cog"></i>
                </a>
            </div>
        </header>
        <ul id="main-menu" class="main-menu">

            <li class="{{ \App\HtmlHelper::m_active('skin') ? 'active opened expanded has-sub' : '' }}">
                <a href="/admin/dashboard">
                    <i class="linecons-params"></i>
                    <span class="title">控制台</span>
                </a>
                <ul>
                    <li class="{{ \App\HtmlHelper::m_active('skin') }}">
                        <a href="/admin/skin"><span class="title">更换皮肤</span></a>
                    </li>
                </ul>
            </li>

            <li class="{{ \App\HtmlHelper::m_active('articles') || \App\HtmlHelper::a_active('create') ? 'active opened expanded has-sub' : '' }}">
                <a href="#">
                    <i class="linecons-desktop"></i>
                    <span class="title">文章管理</span>
                </a>
                <ul>
                    <li class="{{ \App\HtmlHelper::m_active('articles') }}">
                        <a href="/admin/articles">
                            <span class="title">查看文章</span>
                        </a>
                    </li>
                    <li class="{{ \App\HtmlHelper::a_active('create') }}">
                        <a href="/admin/articles/create">
                            <span class="title">撰写文章</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ \App\HtmlHelper::classActive('category','tags', 'comment', 'links') }}">
                <a href="#">
                    <i class="linecons-note"></i>
                    <span class="title">分类管理</span>
                </a>
                <ul>
                    <li class="{{ \App\HtmlHelper::m_active('category') }}">
                        <a href="/admin/category">
                            <span class="title">分类管理</span>
                        </a>
                    </li>
                    <li class="{{ \App\HtmlHelper::m_active('tags') }}">
                        <a href="/admin/tags">
                            <span class="title">标签管理</span>
                        </a>
                    </li>
                    <li class="{{ \App\HtmlHelper::m_active('comment') }}">
                        <a href="/admin/comment">
                            <span class="title">评论管理</span>
                        </a>
                    </li>
                    <li class="{{ \App\HtmlHelper::m_active('links') }}">
                        <a href="/admin/links">
                            <span class="title">友链管理</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ \App\HtmlHelper::userActive('basic','add','edit') }}">
                <a href="#">
                    <i class="linecons-cog"></i>
                    <span class="title">设置</span>
                    <span class="label label-purple pull-right hidden-collapsed">New</span>
                </a>
                <ul>
                    <li class="{{ \App\HtmlHelper::o_active('basic') }}">
                        <a href="/admin/options/basic">
                            <span class="title">基本</span>
                            <span class="label label-success pull-right">new</span>
                        </a>
                    </li>
                    <li class="{{ \App\HtmlHelper::u_active('add') }}">
                        <a href="/admin/user/add">
                            <span class="title">添加用户</span>
                        </a>
                    </li>
                    <li class="{{ \App\HtmlHelper::u_active('edit') }}">
                        <a href="/admin/user/edit">
                            <span class="title">更改资料</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ \App\HtmlHelper::a_active('recycle') }}">
                <a href="/admin/articles/recycle">
                    <i class="linecons-beaker"></i>
                    <span class="title">回收站</span>
                </a>
            </li>
        </ul>
    </div>
</div>