<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Чат</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1b2838; /* Темный фон */
            color: #C1C6D0; /* Серый текст */
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #171a21, #2c2f38); /* Темный градиент */
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: #2e3440; /* Темный фон контейнера */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
        }

        .row {
            display: flex;
            gap: 20px;
        }

        .col-md-4, .col-md-8 {
            padding: 15px;
            border-radius: 10px;
        }

        .col-md-4 {
            flex: 1;
            background: #232a34; /* Более темный фон для списка пользователей */
            border-radius: 8px;
            padding: 20px;
        }

        .col-md-8 {
            flex: 2;
        }

        h2, h4 {
            margin-top: 0;
            color: white; /* Серый цвет заголовков */
            font-weight: bold;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.6);
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            padding: 12px;
            background: #2e3440; /* Темный фон для сообщений */
            margin-bottom: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #e0e0e0;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        ul li strong {
            color: #66c0f4; /* Голубой цвет для имен пользователей */
            text-shadow: 0 0 5px rgba(102, 192, 244, 0.7);
        }

        small {
            display: block;
            font-size: 0.85em;
            color: #99AAB5;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #B9BBBE;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #3c4148;
            border-radius: 5px;
            background: #212529;
            color: #C1C6D0;
            box-shadow: 0 0 8px rgba(0, 255, 255, 0.7);
        }

        .form-control:focus {
            outline: none;
            border-color: #66c0f4;
            box-shadow: 0 0 15px rgba(0, 255, 255, 1);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #66c0f4;
            color: #212529;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background: #4e8fbd;
        }

        .btn-delete {
            padding: 5px 10px;
            background: #D25A5A;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 0.85em;
            text-shadow: 0 0 5px rgba(255, 0, 0, 0.7);
        }

        .btn-delete:hover {
            background: #A74D4D;
        }

        .btn-primary {
            background: #57F287;
        }

        .btn-primary:hover {
            background: #4ba36a;
        }

        .btn-back {
            background: #00a8cc;
            color: white;
            border: 1px solid #00a8cc;
        }

        .btn-back:hover {
            background: #00bfff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Чат</h2>
    <a href="{{ route('profile') }}" class="btn btn-back">Профиль</a>
    <div class="row">
        <div class="col-md-4">
            <h4>Пользователи</h4>
            <ul>
                @foreach($users as $user)
                    <li>{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-8">
            <h4>Чат</h4>
            <ul>
                @foreach($messages as $message)
                    <li>
                        <div>
                            <strong>{{ $message->sender->name }}:</strong> {{ $message->message }}
                            <small>{{ $message->created_at->diffForHumans() }}</small>
                        </div>
                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Удалить</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="receiver_id">Получатель</label>
                    <select name="receiver_id" id="receiver_id" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea name="message" id="message" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
