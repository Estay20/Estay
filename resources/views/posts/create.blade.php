<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать публикацию</title>
    <style>
        /* Глобальные стили */
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1b2838; /* Темный фон */
            color: #c7d5e0; /* Светлый цвет текста */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* Для позиционирования "Вернуться" */
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(145deg, #1a2a2b, #3b4a52); /* Градиент кнопки */
            color: #c7d5e0;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .back-button:hover {
            background: linear-gradient(145deg, #3b4a52, #1a2a2b); /* Цвет кнопки при наведении */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .back-button:active {
            background: linear-gradient(145deg, #1a2a2b, #3b4a52); /* Эффект нажатия */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .container {
            width: 100%;
            max-width: 600px;
            background-color: #2a475e; /* Фон контейнера */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            border: 1px solid #3c6f92; /* Граница контейнера */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #66c0f4; /* Светлый цвет заголовка */
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.7);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #c7d5e0;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #444;
            border-radius: 8px;
            background-color: #1b2838; /* Темный фон полей ввода */
            color: #c7d5e0;
            font-size: 16px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        input[type="file"] {
            opacity: 0.8; /* Прозрачная иконка загрузки */
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #66c0f4;
            box-shadow: 0 0 8px #66c0f4; /* Эффект фокуса */
        }

        button {
            background: linear-gradient(145deg, #1a2a2b, #3b4a52); /* Градиент кнопки */
            color: #c7d5e0;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            text-align: center;
        }

        button:hover {
            background: linear-gradient(145deg, #3b4a52, #1a2a2b); /* Цвет кнопки при наведении */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        button:active {
            background: linear-gradient(145deg, #1a2a2b, #3b4a52); /* Эффект нажатия */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <!-- Ссылка "Вернуться" с кнопочными стилями -->
    <a href="/posts" class="back-button">Вернуться</a>

    <div class="container">
        <h1>Создать публикацию</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Фото</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </form>
    </div>
</body>
</html>
