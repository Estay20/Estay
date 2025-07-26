<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GroupController extends Controller
{
    public function show($id)
{
    $group = Group::find($id); // Получаем группу по ID
    if (!$group) {
        abort(404, 'Группа не найдена'); // Обработка случая, если группа не найдена
    }
    return view('group.show', compact('group')); // Передаём переменную в шаблон
}

    public function subscribe($groupId)
    {
        $user = Auth::user();
        $user->groups()->attach($groupId);

        return redirect()->back()->with('success', 'Вы подписались.');
    }

    public function unsubscribe($groupId)
    {
        $user = Auth::user();
        $user->groups()->detach($groupId);

        return redirect()->back()->with('success', 'Вы отписались.');
    }
}
