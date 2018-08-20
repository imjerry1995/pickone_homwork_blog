@extends('layouts.masterWithoutSide')

@section('title','新增文章')

@section('content')
    <div class="content col-md-12">
        <div class="row">
            <div class="page-header">
                <h2>新增文章</h2>
            </div>
            <form method="POST" action="{{ action('PostController@store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">文章標題</label>
                    <input type="text" class="form-control" name="title" placeholder="輸入文章標題">
                </div>
                @if($errors->has('title'))
                    <span class="help-block">
                        <strong style="color:red;">{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <label for="exampleInputPassword1">文章內容</label>
                    <textarea class="form-control" rows="50" name="content"></textarea>
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
                <button type="submit" class="btn btn-default">送出</button>
            </form>
            
        </div>
    </div>
@stop
