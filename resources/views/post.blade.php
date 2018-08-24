@extends('layouts.master')

@section('title',$post->title)

@section('side_intro')
    <div class="author_intro">
        <h3>本篇文章作者</h3>
        <img src="{{ $post->user->pic }}" alt="">
        <h4>{{ $post->authors }}</h2>
    </div>
@stop

@section('content')
    <div class="col-md-8">
        <div class="content">
            <div class="row">
                
                    <div class="article col-sm-12">
                        @if(Auth::check())
                            @if(Auth::user()->account == $post->authors)
                                <form method="POST" action="{{ route('post.destroy',['post'=>$post->id]) }}" id="modify">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="{{ route('post.edit',['post'=>$post->id]) }}" class="btn btn-default btn-success">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            修改文章
                                        </a>
                                        <button type="submit" class="btn btn-default btn-danger">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            刪除文章
                                        </button>
                                    </div>
                                </form>
                                <div class="clear"></div>
                            @endif
                        @endif
                        <h3>{{ $post->title }}</h3>
                        <hr>
                        <div class="detail">
                            <p>作者：<a href="">{{ $post->authors }}</a> | 發文時間：{{ $post->created_at }}</p>
                        </div>
                        <div class="cover">
                            <img src="{{ $post->pic }}" alt="{{ $post->title }}的封面圖片">
                        </div>
                        <div class="allContent">
                            <p>{{ $post->content }}</p>
                        </div>
                    </div>
                    <div class="comment col-sm-12">
                    @forelse($comments as $comment)
                        <div class="show_all">
                            <div class="name">{{ $comment->name }}</div>
                            <div class="time">{{ $comment->created_at }}</div>
                            <hr>
                            <div class="c_content">
                                {{ $comment->content }}
                            </div>
                            @if(Auth::check())
                                @if(Auth::user()->account == $post->authors)
                                    <form method="POST" action="{{ route('comment.destroy',['id'=>$comment->id,'post_id'=>'$post->id']) }}" id="modify">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-default btn-danger">刪除留言</button>
                                    </form>
                                    <div class="clear"></div>
                                @endif
                            @endif
                            
                        </div>
                    @empty
                        <p>來當第一個留言的吧！</p>
                    @endforelse
                        <div class="post_comment">
                            <form method="POST" action=" {{ action('CommentController@store',['post_id'=>$post->id]) }} ">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">姓名</label>
                                    <input type="text" class="form-control" name="name" placeholder="輸入留言姓名">
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group">
                                    <label for="content">留言</label>
                                    <textarea class="form-control" rows="3" name="content">說點什麼吧</textarea>
                                </div>
                                @if($errors->has('content'))
                                    <span class="help-block">
                                        <strong style="color:red;">{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                                <button type="submit" class="btn btn-default edit">送出</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop
