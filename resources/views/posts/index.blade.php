<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Объявления</title>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1b2838;
            color: #c7d5e0;
        }

        /* Контейнер для кнопок слева */
        .side-bar {
            position: fixed;
            top: 20px;
            left: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 1000;
        }

        .back-btn, .create-btn {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #66c0f4;
            color: #1b2838;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-btn img.icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            vertical-align: middle;
            border-radius: 50%;
        }

        .back-btn:hover, .create-btn:hover {
            background-color: #4a89af;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            background: #2a475e;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            position: relative;
        }

        h1 {
            text-align: center;
            color: #66c0f4;
            margin-bottom: 20px;
        }

        .card {
            background: #1b2838;
            border: 1px solid #3c6f92;
            border-radius: 8px;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5em;
            color: #66c0f4;
            margin-bottom: 10px;
        }

        .card-subtitle {
            font-size: 1em;
            color: #8fa9ba;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1em;
            line-height: 1.5;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Кнопка удаления поста и комментария в стиле Steam */
        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 6px 16px;
            background: linear-gradient(145deg, #1a2a2b, #3b4a52);
            color: #c7d5e0;
            border: 2px solid #4f6a75;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.9em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        .delete-btn:hover {
            background: linear-gradient(145deg, #3b4a52, #1a2a2b);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            transform: translateY(-2px); /* Легкое поднятие */
        }

        .delete-btn:active {
            background: linear-gradient(145deg, #1a2a2b, #3b4a52);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            transform: translateY(2px); /* Эффект нажатия */
        }

        .comment {
            margin-top: 15px;
            padding: 10px;
            background-color: #2a475e;
            border-radius: 5px;
        }

        .comment p {
            margin: 0;
        }

        .comment strong {
            color: #66c0f4;
        }

        .btn {
            padding: 8px 20px;
            background-color: #66c0f4;
            color: #1b2838;
            border: 1px solid #3c6f92;
            border-radius: 5px;
            font-weight: bold;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        .btn:hover {
            background-color: #4a89af;
        }

        .btn:active {
            background-color: #3c6f92;
        }

        .btn-danger {
            padding: 3px 8px;
            font-size: 0.85em;
            font-weight: normal;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #ff3333;
        }

        .button {
            padding: 10px 20px;
            background-color: #66c0f4;
            color: #1b2838;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            font-size: 1em;
        }

        .button:hover {
            background-color: #4a89af;
        }

        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #3c6f92;
            background-color: #1b2838;
            color: #c7d5e0;
            font-size: 1em;
            resize: none;
        }

        .form-group textarea:focus {
            outline: none;
            border-color: #66c0f4;
        }

        .delete-comment-btn {
            position: relative;
            padding: 6px 16px;
            background: linear-gradient(145deg, #1a2a2b, #3b4a52);
            color: #c7d5e0;
            border: 2px solid #4f6a75;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.9em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        .delete-comment-btn:hover {
            background: linear-gradient(145deg, #3b4a52, #1a2a2b);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
            transform: translateY(-2px);
        }

        .delete-comment-btn:active {
            background: linear-gradient(145deg, #1a2a2b, #3b4a52);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            transform: translateY(2px);
        }

        .group-btn {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            background-color: #66c0f4;
            color: #1b2838;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 1.1em;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        .group-btn:hover {
            background-color: #4a89af;
            transform: translateY(-3px); /* Легкое поднятие */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .group-btn img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border-radius: 50%;
            vertical-align: middle;
        }

        .group-btn:active {
            background-color: #3c6f92;
            transform: translateY(2px); /* Эффект нажатия */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

    </style>
</head>
<body>

<!-- Контейнер для кнопок слева -->
<div class="side-bar">
    <a href="{{ route('profile') }}" class="back-btn">
        <img src="https://cdn-icons-png.flaticon.com/512/4519/4519729.png" alt="Профиль" class="icon">
        Профиль
    </a>
    <a href="/group/1" class="group-btn">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4Fnpz99-uKUMxyvxTvcCIlSPTdVB8_LfY9g&s" alt="Группы" class="link-icon">
    Группы
    </a>

    <a href="{{ route('posts.create') }}" class="create-btn">Создать пост</a>
</div>

<div class="container">
    <h1>Лента новостей</h1>

    @foreach($posts as $post)
        <div class="card">
            <!-- Кнопка удаления, расположенная справа сверху -->
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Удалить пост</button>
            </form>

            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle">Автор: {{ $post->user->name }}</h6>
                <p class="card-text">{{ $post->description }}</p>

                @if($post->image)
                    <img src="{{ Storage::url($post->image) }}" alt="image">
                @endif

                <!-- Лайки и дизлайки -->
                <form action="{{ route('posts.like', $post->id) }}" method="POST">
                    @csrf
                    <button type="submit" name="type" value="like" class="btn">👍 {{ $post->likeCount() }}</button>
                    <button type="submit" name="type" value="dislike" class="btn">👎 {{ $post->dislikeCount() }}</button>
                </form>

                <!-- Комментарии -->
                <h6 class="mt-3">Комментарии:</h6>
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                        @if($comment->user_id == Auth::id())
                            <form action="{{ route('posts.comment.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-comment-btn">Удалить</button>
                            </form>
                        @endif
                    </div>
                @endforeach

                <!-- Форма для добавления комментария -->
                <form action="{{ route('posts.comment.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="content" required placeholder="Оставьте комментарий..."></textarea>
                    </div>
                    <button type="submit" class="button">Добавить комментарий</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>
