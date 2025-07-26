<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use App\Models\Like;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Показать форму для создания объявления
    public function create()
    {
        return view('posts.create');
    }

    // Сохранить новое объявление
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;

        // Обработка изображения
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Объявление опубликовано!');
    }

    // Показать все объявления
    public function index()
    {
        $posts = Post::with('user', 'comments.user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Добавить комментарий
    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $postId;
        $comment->user_id = Auth::id();
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('posts.index')->with('success', 'Комментарий добавлен!');
    }

    // Добавить лайк или дизлайк
    public function storeLike(Request $request, $postId)
    {
        $request->validate([
            'type' => 'required|in:like,dislike',
        ]);

        $like = Like::updateOrCreate(
            ['post_id' => $postId, 'user_id' => Auth::id()],
            ['type' => $request->type]
        );

        return redirect()->route('posts.index');
    }

    // Удалить комментарий
    public function destroyComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        if ($comment->user_id == Auth::id()) {
            $comment->delete();
        }

        return redirect()->route('posts.index')->with('success', 'Комментарий удален!');
    }

    // Удалить пост
    public function destroy($postId)
    {
        $post = Post::findOrFail($postId);

        // Проверяем, является ли пользователь автором поста
        if ($post->user_id == Auth::id()) {
            // Удаляем изображение, если оно есть
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            // Удаляем пост
            $post->delete();
        }

        return redirect()->route('posts.index')->with('success', 'Пост удалён!');
    }
}