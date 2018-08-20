@extends('layouts.masterWithoutSide')

@section('title','編輯文章')

@section('content')
    <div class="content col-md-12">
        <div class="row artical_raw">
            <div class="page-header">
                <h2>編輯文章</h2>
            </div>
            <form method="POST" action="{{ route('post.update',['post'=>$post->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">文章標題</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                </div>
                @if($errors->has('title'))
                    <span class="help-block">
                        <strong style="color:red;">{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <label for="exampleInputPassword1">文章內容</label>
                    <textarea class="form-control" rows="50" name="content">{{ $post->content }}</textarea>
                </div>
                @if($errors->has('content'))
                    <span class="help-block">
                        <strong style="color:red;">{{ $errors->first('content') }}</strong>
                    </span>
                @endif
                <!-- <div class="form-group">
                    <label for="exampleInputFile">上傳封面照片</label>
                    <input type="file" id="exampleInputFile">
                </div> -->
                <button type="submit" class="btn btn-default edit">送出</button>
            </form>
            
        </div>
    </div>
@stop
