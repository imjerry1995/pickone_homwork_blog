<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post as PostEloquent;
use App\Comment as CommnetEloquent;

use App\Http\Requests\PostRequest;
use App\Http\Requests\EditRequest;

use Log;
use Auth;
use Redirect;

class PostController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth',['except'=>'index']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostEloquent::orderBy('created_at','DESC')->simplePaginate(5);
        foreach($posts as $post){
            $post->content = str_limit($post->content, 50);
            // Log::debug($post->content);
        }
        return view('index',['posts'=>$posts]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // Log::debug($request->all());
        $post = new PostEloquent($request->all());
        $post->authors = Auth::user()->account;
        $post->save();
        return Redirect::route('post.index');
        // $posts = PostEloquent::orderBy('created_at','DESC')->get();
        // return view('index',['posts'=>$posts,'msg'=>'新增文章成功']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostEloquent::findOrFail($id);
        $comments = CommnetEloquent::where('post_id',$id)->get();
        return view('post',['post'=>$post,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = PostEloquent::findOrFail($id);
        return view('edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = PostEloquent::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $msg = '修改文章成功';
        return Redirect::route('post.index',['msg'=>$msg]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PostEloquent::findOrFail($id);
        $post->delete();
        return Redirect::route('post.index');
    }



}
