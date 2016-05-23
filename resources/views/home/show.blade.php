@extends('app')

@section('header')
    @if(!empty($options))
        <title>{{ $article->title }} | {{ $options->title }}</title>
        <meta name="author" content="{{ $options->author }}">
        <meta name="description" content="{{ $options->description }}| {{ $options->title }}" />
        <meta name="keywords" content="{{ $options->keywords }}" />
    @endif
@stop

@section('content')
    <div id="Container" class="container">
        <main class="main-content">
            <section id="section">
                <header class="header">
                    <h1>{{ $article->title }}</h1>
                    <time datetime="{{ $article->created_at }}">{{ $article->created_at }}</time>
                </header>
                <article class="content">
                    {!! $article->content_html !!}
                </article>
                <div class="article-page clearfix">
                    <div class="center aligned column">
                        @if($prev_article)
                            <a href="/article/{{ $prev_article->slug }}" class="prev">
                                <p>{{ $prev_article->title }}</p>
                                <i class="fa fa-chevron-left"></i><strong>上一篇</strong>
                            </a>
                            @else
                            <p>Nothing</p>
                        @endif
                    </div>
                    <div class="vertical divider">Or</div>
                    <div class="center aligned column">
                        @if($next_article && $next_article->created_at < Carbon\Carbon::now())
                            <a href="/article/{{ $next_article->slug }}" class="next">
                                <p>{{ $next_article->title }}</p>
                                <i class="fa fa-chevron-right"></i><strong>下一篇</strong>
                            </a>
                            @else
                            <p>Nothing</p>
                        @endif
                    </div>
                </div>
                <footer id="footer">
                    <div id="comments-list">
                        @if(count($comments) > 0)
                        <h3>已有 {{ count($comments) }} 条评论</h3>
                            @foreach($comments as $comment)
                            <div class="comment">
                                <div class="comment-con">
                                    @if(empty($comment->website))
                                        <a  href="#comments-list" rel="external nofollow" class="img-box">
                                    @else
                                        <a  href="//{{ $comment->website }}" rel="external nofollow" target="_blank" class="img-box">
                                    @endif
                                        <img class="avatar" src="http://gravatar.duoshuo.com/avatar/{{ md5($comment->email) }}?s=64&amp;r=G&amp;d=mm" alt="{{ $comment->email }}" width="64" height="64">
                                    </a>
                                    <div class="content-box">
                                        <div class="user-info clearfix">
                                            @if(empty($comment->website))
                                                <a href="#comments-list" rel="external nofollow"  class="username">{{ $comment->username }}</a>
                                            @else
                                                <a href="//{{ $comment->website }}" rel="external nofollow" target="_blank" class="username">{{ $comment->username }}</a> -
                                            @endif
                                        </div>
                                        <div class="star-box">
                                            <i class="icon-star2 active"></i>
                                            <i class="icon-star2 active"></i>
                                            <i class="icon-star2 active"></i>
                                        </div>
                                        <p class="content">{!! $comment->content !!}</p>
                                        <div class="mate">
                                            <time datetime="{{ $comment->created_at }}">{{ $comment->CreatedAt() }}</time>
                                            <a href="javascript:;" data-username="{{ $comment->username }}" class="reply">回复</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div id="comment-from">
                        <h3>添加新评论 <a href="javascript:;" style="display: none" class="cancel-reply">取消回复</a></h3>
                        <validator name="validation">
                        <form id="reply_form" method="POST" action="/comment" accept-charset="UTF-8" novalidate>
                            {{ csrf_field() }}
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <input type="hidden" id="replyName" name="reply_name" value="">
                            <div class="form-group">
                                <label for="username">名称:</label>
                                <input type="text"
                                       name="username"
                                       id="username"
                                       class="form-control"
                                       detect-change="on"
                                       detect-blur="on"
                                       v-validate:username="['required']"
                                >
                            </div>
                            <div class="form-group">
                                <label for="email">电子邮件:</label>
                                <input type="text"
                                       name="email"
                                       id="email"
                                       class="form-control"
                                       detect-change="on"
                                       detect-blur="on"
                                       v-validate:email="['required','email']"
                                >
                            </div>
                            <div class="form-group">
                                <label for="website">站点:</label>
                                <input type="text"
                                       name="website"
                                       id="website"
                                       class="form-control"
                                >
                            </div>
                            <div class="form-textarea">
                                <textarea name="content"
                                          id="content"
                                          class="form-control"
                                          placeholder="说点什么? @你想回复的人"
                                          cols="30"
                                          rows="10"
                                          detect-change="on"
                                          detect-blur="on"
                                          v-validate:content="['required']"
                                ></textarea>
                            </div>
                            <div class="errors" v-if="$validation.touched">
                                <p v-if="$validation.username.required">你的名字忘填了QWQ.</p>
                                <p v-if="$validation.email.email">你输入的邮箱不对QAQ.</p>
                                <p v-if="$validation.content.required">你的评论内容忘记填了QWQ.</p>
                            </div>
                            <div class="form-submit">
                                <input class="btn form-control"
                                       id="publishButton"
                                       type="submit"
                                       value="发表评论"
                                       :class="[!$validation.valid ? 'btn-danger' : 'btn-success']"
                                       :disabled="!$validation.valid">
                            </div>
                        </form>
                        </validator>
                    </div>
                    <div class="copy">
                        <p>Code is poetry.</p>
                    </div>
                </footer>
            </section>
        </main>
    </div>
    <script>
        $(function(){
            var names  = JSON.parse('{!! $username !!}');
            var inputer = $('#content');
            inputer.atwho({
                at: "@",
                data: names
            });
            inputer.on("inserted.atwho", function($li, query) {
                var token = $('#reply_form').find('input[name="_token"]').val();
                var data = {
                    _token: token,
                    name: query[0].textContent,
                    conversation_id: $('#conversation_id').val(),
                    status: "on"
                };
                $.post("/comment/notice",data,function(response){
                    if(response.status === 'success'){
                        console.log(response);
                    }
                }, "json");

            });
            inputer.keydown(function (event) {
                if ( event.keyCode == 13 && (event.metaKey || event.ctrlKey)) {
                    $('#publishButton').click();
                }
            });
            $('.reply').click(function(){
                var replyForm = $('#reply_form');
                replyForm.attr('action', '/comment/reply');
                var name = $(this).attr('data-username');
                var content = $('#content').val();
                $('#content').val( content +' @' + name + ' ').focus();
                replyForm.find('input[type="submit"]').attr('value','回复评论');
                replyForm.find('#replyName').attr('value', name);
                $('.cancel-reply').css('display','block');
            });
            $('.cancel-reply').click(function() {
                $(this).css('display','none');
                var replyForm = $('#reply_form');
                replyForm.attr('action', '/comment');
                $('#content').val('');
                replyForm.find('input[type="submit"]').attr('value','发表评论');
            });
        });
    </script>
@stop