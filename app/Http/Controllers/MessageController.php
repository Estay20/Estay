<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Метод для отображения сообщений пользователя
    public function index()
    {
        $user = Auth::user(); // Получаем текущего пользователя
        // Получаем все сообщения пользователя, включая отправленные и полученные
        $messages = Message::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Получаем список всех пользователей, кроме текущего
        $users = User::where('id', '!=', $user->id)->get();

        // Отправляем данные в представление
        return view('messages.index', compact('messages', 'users'));
    }

    // Метод для отправки нового сообщения
    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'receiver_id' => 'required|exists:users,id', // Проверяем, что получатель существует
            'message' => 'required|string', // Проверяем, что сообщение не пустое
        ]);

        // Создаем новое сообщение
        Message::create([
            'sender_id' => Auth::id(), // ID текущего пользователя
            'receiver_id' => $request->receiver_id, // ID получателя
            'message' => $request->message, // Содержимое сообщения
        ]);

        // Перенаправляем обратно с сообщением об успешной отправке
        return back()->with('success', 'Сообщение отправлено успешно!');
    }
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Сообщение удалено!');
    }
}
