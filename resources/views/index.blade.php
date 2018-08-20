@extends('layouts.master')

@section('title','所有文章')

@section('content')
    <div class="content col-md-8">
        <div class="row">
            @forelse($posts as $post)
                <div class="article col-sm-12">
                    <h3>{{ $post->title }}</h3>
                    <div class="detail">
                        <p>作者：<a href="">{{ $post->authors }}</a> | 發文時間：{{ $post->timestamp }}</p>
                    </div>
                    <div class="cover">
                        <img src="{{ $post->cover_img }}" alt="{{ $post->title }}的封面圖片">
                    </div>
                    <div class="preview">
                        <p>{{ $post->content }}</p>
                    </div>
                    <a href="{{ route('post.show',['post'=>'post_id']) }}">閱讀全文</a>
                </div>
            @empty
                <p class="text-center">
                    沒有文章囉！趕快來投稿吧！
                </p>
            @endforelse
        </div>
    </div>
@stop
