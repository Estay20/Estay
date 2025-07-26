<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Группы</title>
    <style>
        /* Основные стили */
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1b2838;
            color: #c7d5e0;
        }

        /* Шапка */
        .header {
            background-color: #2a475e;
            color: #c7d5e0;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 2px solid #66c0f4;
        }

        /* Боковая панель */
        .side-bar {
            position: fixed;
            top: 20px;
            left: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 1000;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            color: #fff;
            background-color: #66c0f4;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #1b75bc;
        }

        /* Контейнер для контента */
        .content {
            max-width: 800px;
            margin: 20px auto;
            background: #2a475e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        /* Декоративные элементы */
        .content h1 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #66c0f4;
        }

        .content p {
            font-size: 18px;
            line-height: 1.6;
        }

        /* Стили списка участников */
        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            background: #1b2838;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            color: #c7d5e0;
            font-size: 16px;
        }

        ul li:hover {
            background: #3a5366;
        }

        /* Кнопки подписки */
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #66c0f4;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #1b75bc;
        }

        /* Стили для класса public */
        .public {
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
            background-color: #2a475e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        .public h1 {
            font-size: 24px;
            color: #66c0f4;
            margin-bottom: 15px;
        }

        .public a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            background-color: #66c0f4;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .public a:hover {
            background-color: #1b75bc;
        }
    </style>
</head>
<body>
    <!-- Шапка -->
    <div class="header">Сообщество</div>

    <!-- Боковая панель -->
    <div class="side-bar">
        <a href="{{ route('profile') }}" class="back-btn">Профиль</a>
    </div>

    <!-- Контейнер с контентом -->
    <div class="content">
        <h1>Канал Элитов</h1>
        <p>Добро пожаловать в элиты! Здесь собираются лучшие из лучших, чтобы делиться опытом, знаниями и поддерживать друг друга на пути к вершинам.</p>

        @if (auth()->user()->groups->contains($group->id))
            <form action="{{ route('group.unsubscribe', $group->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn">Отписаться</button>
            </form>
        @else
            <form action="{{ route('group.subscribe', $group->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn">Подписаться</button>
            </form>
        @endif
    </div>

    <!-- Участники группы -->
    <div class="content">
        <h3>Участники группы</h3>
        <ul>
            @foreach ($group->users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>

    <!-- Посты группы -->
    <div class="public">
        <h1>Посты</h1>
        <a href="/posts" class="neon-effect" data-section="news">Смотреть</a>
    </div>
</body>
</html>
