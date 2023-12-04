<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Encore\Admin\Actions\Interactor\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::orderByDesc('created_at')->get();

        return view('buy', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $defaultImagePath = 'TOKI.png';

        // 이미지가 업로드되었는지 확인
        if ($request->hasFile('image')) {
            // 이미지를 저장하고 저장된 경로를 얻어옴
            $imagePath = $request->file('image')->store('images', 'public');
        } else{
            $imagePath = $defaultImagePath;
        }

        // 로그인한 유저의 ID를 사용하여 게시글을 생성
        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'price' => $request->input('price'),
            'image' => $imagePath,
        ]);

        // 게시글 생성 후 리다이렉트 또는 다른 동작 수행
        return redirect('/post/')->with('success', '게시글이 성공적으로 작성되었습니다.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);

        return view('posts.show-product', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
        return view('posts.show-product-edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // 수정된 내용이 있는지 확인
        if ($request->input('title') != null) {
            $post->title = $request->input('title');
        }

        if ($request->input('price') != null) {
            $post->price = $request->input('price');
        }

        if ($request->input('content') != null) {
            $post->content = $request->input('content');
        }

        // 이미지 업로드 처리
        if ($request->hasFile('image')) {
            // 이미지를 저장하고 저장된 경로를 얻어옴
            $post->image = $request->file('image')->store('images', 'public');
        }
        // 수정된 내용이 있다면 업데이트
        if ($post->isDirty()) {
            $post->save();
        }

        return redirect('/post/'.$post->id)->with('success', '게시물이 업데이트되었습니다.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/mystore/')->with('success', '게시글이 성공적으로 삭제되었습니다.');
    }

    public function trade(Post $post)
    {
        $post->on_sale = false;
        $post->save();
        return redirect('/mystore/')->with('success', '게시물이 업데이트되었습니다.');
    }
}
