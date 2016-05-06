@extends('app')
@section('content')
        <div id="Container" class="container">
            <main class="main-content">
                <menu></menu>
            </main>
        </div>

        <script type="text/x-template" id="menu-list">
            <div class="vi tabular menu">
                <a  href="#"
                    :class="['item', cate.id === taller ? 'active' : '']"
                    v-on:click="toggleHeight(cate.id)"
                    v-for="cate in cates">@{{ cate.name }}
                </a>
                <div class="switch">
                    <input class="mui-switch mui-switch-anim" type="checkbox" :checked="switch"  @click="toggleSwitch()">
                </div>
            </div>
            <articles></articles>
            <nav class="pagination" v-if="pagination.total > pagination.per_page">
                <ul>
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous"
                           @click.prevent="changePage(pagination.current_page - 1)">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li v-for="page in pages">
                        <a href="#"
                           :class="[ page == pagination.current_page ? 'active' : '' ]"
                           @click.prevent="changePage(page)">@{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" aria-label="Next"
                           @click.prevent="changePage(pagination.current_page + 1)">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </script>
        <script type="text/x-template" id="articles-template">
            <section class="index">
                <article class="article" v-for="list in lists" v-if="list.cate_id === show">
                    <h1 class="title"><a href="/article/@{{ list.slug }}">@{{ list.title}}</a></h1>
                    <div class="content">
                        @{{ list.content | marked | except 150 }}
                    </div>
                    <div class="meta">
                        <div class="date">
                            <time>@{{ list.created_at }}</time>
                        </div>
                        <div class="comment">

                        </div>
                    </div>
                    <div class="thumbnail" v-if="toggleImg == switch && list.thumbnail != null">
                        <img :src="list.thumbnail" alt="" width="150" height="150">
                    </div>
                </article>
            </section>
        </script>
@stop