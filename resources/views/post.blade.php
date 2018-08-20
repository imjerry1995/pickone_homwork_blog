@extends('layouts.master')

@section('title',$post->title)

@section('side_intro')
    <div class="author_intro">
        <img src="{{ $post->user->pic }}" alt="">
        <h2>{{ $post->authors }}</h2>
    </div>
@stop

@section('content')
    <div class="content col-md-8">
        <div class="row">
            
                <div class="article col-sm-12">
                    @if(Auth::user()->users_id == $post->authors)
                        <form method="POST" action="{{ route('post.destroy',['post'=>$post->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{ route('post.edit',['post'=>$post->id]) }}" class="btn btn-default">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    修改文章
                                </a>
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    刪除文章
                                </button>
                            </div>
                        </form>
                    @endif
                    <h3>{{ $post->title }}</h3>
                    <div class="detail">
                        <p>作者：<a href="">{{ $post->authors }}</a> | 發文時間：{{ $post->timestamp }}</p>
                    </div>
                    <div class="cover">
                        <img src="{{ $post->pic }}" alt="{{ $post->title }}的封面圖片">
                    </div>
                    <div class="allContent">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            
        </div>
    </div>
@stop
