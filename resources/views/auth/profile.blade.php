<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Профиль</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            background-color: #0a0a0a;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: row;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #181818;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.8);
            display: flex;
            flex-direction: column;
            border-right: 2px solid #00bfff;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: #e0e0e0;
            text-decoration: none;
            font-size: 1.1em;
            margin-bottom: 15px;
            padding: 10px 15px;
            border-radius: 4px;
            background-color: #333;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #00bfff;
            transform: scale(1.05);
        }

        .sidebar a img.link-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            border-radius: 50%;
        }

        main {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background: #121212;
        }

        .profile-card {
            background-color: #212121;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
            max-width: 400px;
            margin: auto;
            position: relative;
            border: 1px solid #00bfff;
        }

        .profile-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 4px solid #00bfff;
        }

        .profile-card h2 {
            margin: 10px 0 5px;
            font-size: 24px;
            color: #00bfff;
        }

        .profile-card p {
            margin: 5px 0;
            font-size: 14px;
            color: #bbbbbb;
        }

        .status {
            margin: 10px 0;
            font-weight: bold;
            font-size: 16px;
        }

        .status span {
            color: #4caf50;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #00bfff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            background-color: #00a8cc;
            transform: scale(1.1);
        }

        .exit {
            margin-top: 15px;
        }

        .exit button {
            background-color: #00bfff;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .exit button:hover {
            background-color: red;
            transform: scale(1.1);
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #212121;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.8);
            padding: 10px;
            border-radius: 8px;
            z-index: 1;
        }

        .dropdown-content button {
            background-color: transparent;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: left;
            width: 100%;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .dropdown-content button:hover {
            background-color: #00bfff;
            transform: scale(1.1);
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .chatbot-container {
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 300px;
        background-color: #181818;
        border: 2px solid #00bfff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
        display: none;
        flex-direction: column;
        overflow: hidden;
        font-family: 'Orbitron', sans-serif;
    }

    .chat-header {
        background-color: #00bfff;
        color: #fff;
        padding: 10px;
        text-align: center;
        font-weight: bold;
        cursor: pointer;
    }

    .chat-body {
        padding: 10px;
        max-height: 300px;
        overflow-y: auto;
        background-color: #212121;
    }

    .chat-footer {
        display: flex;
        padding: 10px;
        background-color: #181818;
    }

    .chat-footer input {
        flex: 1;
        padding: 8px;
        border: none;
        border-radius: 5px;
        background-color: #333;
        color: #e0e0e0;
        font-size: 14px;
    }

    .chat-footer button {
        margin-left: 10px;
        padding: 8px 12px;
        background-color: #00bfff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .chat-footer button:hover {
        background-color: #00a8cc;
        transform: scale(1.1);
    }

    .chat-message {
        padding: 8px;
        margin: 5px 0;
        border-radius: 10px;
        max-width: 80%;
        word-wrap: break-word;
    }

    .user-message {
        background-color: #00bfff;
        color: #fff;
        align-self: flex-end;
    }

    .bot-message {
        background-color: #333;
        color: #e0e0e0;
        align-self: flex-start;
    }


    </style>
</head>
<body>
    <div class="sidebar">
        <a href="/posts" class="neon-effect" data-section="news">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDft539utRwKMC-ntE94VsUJ5HnnSSNaYt7g&s" alt="Лента" class="link-icon">
            Лента
        </a>
        <a href="/messages" class="neon-effect">
            <img src="https://w7.pngwing.com/pngs/970/400/png-transparent-computer-icons-message-symbol-text-messaging-symbol.png" alt="Сообщения" class="link-icon">
            Сообщения
        </a>
        <a href="/group/1" class="neon-effect">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4Fnpz99-uKUMxyvxTvcCIlSPTdVB8_LfY9g&s" alt="Группы" class="link-icon">
            Группы
        </a>
    </div>

    <main>
        <div class="profile-card">
            <img src="https://sun9-1.userapi.com/impg/LF3_1b8kxA1WT6yTrXi_uS2cv-oVrqxm0NcHww/qwHsrNq_q28.jpg?size=564x565&quality=95&sign=9a2ee551be13e1c6590cc4bb1e8262ee&type=album" alt="Профиль пользователя">
            <h2>{{ $user->name }}</h2>
            <p>Выигрышь есть можно поесть</p>
            <div class="status">Статус: <span id="current-status">В сети</span></div>
            <div class="dropdown">
                <button class="btn">Изменить статус</button>
                <div class="dropdown-content">
                    <button data-status="В сети" style="color: #4caf50;">В сети</button>
                    <button data-status="Неактивен" style="color: #ffa500;">Неактивен</button>
                    <button data-status="Невидимый" style="color: #bbbbbb;">Невидимый</button>
                    <button data-status="Не беспокоить" style="color: #ff0000;">Не беспокоить</button>
                </div>
            </div>

            <div class="exit">
                <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                    @csrf
                </form>
                <button onclick="confirmExit()">Выйти</button>
            </div>
        </div>
    </main>

     <div class="chatbot-container" id="chatbot">
        <div class="chat-header" onclick="toggleChatbot()">Чат-бот</div>
        <div class="chat-body" id="chat-body"></div>
        <div class="chat-footer">
            <input type="text" id="user-message" placeholder="Введите сообщение...">
            <button onclick="sendMessage()">Отправить</button>
        </div>
    </div>
    <button style="position: fixed; bottom: 20px; right: 20px; padding: 10px 15px; background-color: #00bfff; color: white; border-radius: 50%; cursor: pointer;" onclick="toggleChatbot()">💬</button>

    <script>
        document.querySelectorAll('.dropdown-content button').forEach(button => {
            button.addEventListener('click', function () {
                const newStatus = this.getAttribute('data-status');
                const statusElement = document.getElementById('current-status');

                // Изменяем текст статуса
                statusElement.textContent = newStatus;

                // Изменяем цвет статуса в зависимости от выбранного
                switch (newStatus) {
                    case 'В сети':
                        statusElement.style.color = '#4caf50';
                        break;
                    case 'Неактивен':
                        statusElement.style.color = '#ffa500';
                        break;
                    case 'Невидимый':
                        statusElement.style.color = '#bbbbbb';
                        break;
                    case 'Не беспокоить':
                        statusElement.style.color = '#ff0000';
                        break;
                }
            });
        });

         // Подтверждение выхода
        function confirmExit() {
            if (confirm('Вы действительно хотите выйти?')) {
                document.getElementById('logout-form').submit();
            }
        }

                function toggleChatbot() {
            const chatbot = document.getElementById("chatbot");
            chatbot.style.display = chatbot.style.display === "none" ? "flex" : "none";
        }

        function sendMessage() {
            const input = document.getElementById("user-message");
            const message = input.value.trim();
            if (message === "") return;

            addMessage(message, "user-message");
            input.value = "";

            setTimeout(() => {
                const response = getBotResponse(message);
                addMessage(response, "bot-message");
            }, 500);
        }

        function addMessage(text, className) {
            const chatBody = document.getElementById("chat-body");
            const messageElement = document.createElement("div");
            messageElement.classList.add("chat-message", className);
            messageElement.textContent = text;
            chatBody.appendChild(messageElement);
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        function getBotResponse(userMessage) {
            const responses = {
                "привет": "Привет {{ $user->name }}! Как дела?",
                "как дела?": "Отлично, спасибо! А у тебя?",
                "что ты умеешь?": "Я могу отвечать на простые вопросы!",
                "что такое лента?": "Лента — это место, где отображаются последние новости, публикации и обновления от пользователей.",
                "что такое группа?": "Группа — это сообщество пользователей, объединённых по интересам. В группах можно общаться, делиться контентом и обсуждать темы.",
                "что такое мессенджер?": "Мессенджер — это сервис для обмена личными сообщениями между пользователями.",
                "что значит онлайн?": "Статус 'В сети' означает, что пользователь активен и доступен для общения.",
                "что значит невидимый?": "Статус 'Невидимый' позволяет оставаться онлайн, но другие пользователи не видят вас в сети.",
                "что значит не беспокоить?": "Статус 'Не беспокоить' означает, что вы заняты и не хотите получать уведомления.",
                "что значит неактивен?": "Статус 'Неактивен' означает, что пользователь временно не использует систему, но не вышел из аккаунта.",
                "пока": "Пока! Хорошего дня {{ $user->name }}!"
            };

            return responses[userMessage.toLowerCase()] || "Я не понял ваш вопрос. Попробуйте ещё раз!";
        }
    </script>
</body>
</html>
