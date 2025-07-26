<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Массовое присваивание для указанных полей
    protected $fillable = ['name', 'email', 'password'];

    // Скрытие пароля
    protected $hidden = ['password'];

    // Преобразование типов
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user');
    }

}