<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Регистрация</title>
<style>
html, body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #ffffff;
    background-image: url('https://sun9-53.userapi.com/impg/uaydpp3uQZbcjx4iCP0ZALqkU0wlfPTzvtjLOA/wTZy_fkdGLI.jpg?size=626x417&quality=95&sign=814aa25869d060337d027d9954efbc64&type=album.jpg'); /* Замените на путь к вашему изображению */
    background-size: cover; /* Покрывает весь экран */
    background-position: center; /* Центрирует изображение */
}

form {
    background: rgba(30, 30, 30, 0.9); /* Прозрачный черный фон */
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
    width: 100%;
    max-width: 400px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 28px;
    color: #ffffff;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.7);
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    font-size: 14px;
}

input {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #444;
    border-radius: 8px;
    background-color: #2c2c2c;
    color: #ffffff;
    font-size: 16px;
    box-sizing: border-box;
}

input:focus {
    outline: none;
    border-color: #6e44ff;
    box-shadow: 0 0 8px #6e44ff;
}

button {
    background-color: #6e44ff;
    color: #ffffff;
    padding: 12px;
    border: none;
    border-radius: 8px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
}

button:hover {
    background-color: #4a1c88;
    box-shadow: 0 5px 15px rgba(110, 68, 255, 0.6);
}

.form-footer {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
}

.form-footer a {
    color: #6e44ff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.form-footer a:hover {
    color: #4a1c88;
    text-decoration: underline;
}
</style>
</head>
<body>

<form action="{{ route('register') }}" method="POST">
@csrf
<h1>Регистрация</h1>
<label for="name">Имя:</label>
<input type="text" id="name" name="name" required placeholder="Введите ваше имя">

<label for="email">Email:</label>
<input type="email" id="email" name="email" required placeholder="Введите ваш email">

<label for="password">Пароль:</label>
<input type="password" id="password" name="password" required placeholder="Введите пароль">

<label for="password_confirmation">Подтверждение пароля:</label>
<input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Повторите пароль">

<button type="submit">Регистрация</button>
</form>

</body>
</html>