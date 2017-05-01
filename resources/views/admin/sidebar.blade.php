<div class="sidebar" data-color="blue" data-image="/img/full-screen-image-3.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/admin/dashboard" class="logo-text">
                管理后台
            </a>
        </div>
        <ul class="nav">
            <li class="{{\App\Helpers\SidebarHelper::is_active('admin/dashboard')}}">
                <a href="/admin/dashboard">
                    <i class="pe-7s-graph"></i>
                    <p>控制台</p>
                </a>
            </li>
            {{--{{dd(\Request::path())}}--}}
            <li class="{{\App\Helpers\SidebarHelper::is_active('admin/articles','admin/articles/create','admin/pages', 'admin/pages/create')}}">
                <a data-toggle="collapse" href="#article-management" class="collapsed" aria-expanded="false">
                    <i class="pe-7s-note2"></i>
                    <p>文章管理
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{\App\Helpers\SidebarHelper::is_in_active('admin/articles','admin/articles/create','admin/pages', 'admin/pages/create')}}" id="article-management" aria-expanded="false">
                    <ul class="nav">
                        <li class="{{\Request::path() == 'admin/articles' ? 'active' : '' }}"><a href="/admin/articles">查看文章</a></li>
                        <li class="{{\Request::path() == 'admin/articles/create' ? 'active' : '' }}"><a href="/admin/articles/create">撰写文章</a></li>
                        <li class="{{\Request::path() == 'admin/pages' ? 'active' : '' }}"><a href="/admin/pages">查看页面</a></li>
                        <li class="{{\Request::path() == 'admin/pages/create' ? 'active' : '' }}"><a href="/admin/pages/create">创建页面</a></li>
                    </ul>
                </div>
            </li>
            <li class="{{\App\Helpers\SidebarHelper::is_active('admin/category','admin/tags', 'admin/links')}}">
                <a data-toggle="collapse" href="#sort-management" class="collapsed" aria-expanded="false">
                    <i class="pe-7s-plugin"></i>
                    <p>分类管理
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{\App\Helpers\SidebarHelper::is_in_active('admin/category','admin/tags','admin/links')}}" id="sort-management" aria-expanded="false">
                    <ul class="nav">
                        <li class="{{\App\Helpers\SidebarHelper::active('admin/category')}}"><a href="/admin/category">分类管理</a></li>
                        <li class="{{\App\Helpers\SidebarHelper::active('admin/tags')}}"><a href="/admin/tags">标签管理</a></li>
                        <li class="{{\App\Helpers\SidebarHelper::active('admin/links')}}"><a href="/admin/links">友链管理</a></li>
                    </ul>
                </div>
            </li>
            <li class="{{\App\Helpers\SidebarHelper::is_active('admin/options/basic','admin/user/add', 'admin/user/edit')}}">
                <a data-toggle="collapse" href="#admin-setting" class="collapsed" aria-expanded="false">
                    <i class="pe-7s-config"></i>
                    <p>管理员设置
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{\App\Helpers\SidebarHelper::is_in_active('admin/options/basic','admin/user/add','admin/user/edit')}}" id="admin-setting" aria-expanded="false">
                    <ul class="nav">
                        <li class="{{\App\Helpers\SidebarHelper::active('admin/options/basic')}}"><a href="/admin/options/basic">基本设置</a></li>
                        <li class="{{\App\Helpers\SidebarHelper::active('admin/user/add')}}"><a href="/admin/user/add">添加用户</a></li>
                        <li class="{{\App\Helpers\SidebarHelper::active('admin/user/edit')}}"><a href="/admin/user/edit">修改资料</a></li>
                    </ul>
                </div>
            </li>
            <li class="{{\App\Helpers\SidebarHelper::is_active('admin/articles/recycle')}}">
                <a href="/admin/articles/recycle">
                    <i class="pe-7s-trash"></i>
                    <p>回收站</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-background" style="background-image: url(/img/full-screen-image-3.jpg) "></div></div>