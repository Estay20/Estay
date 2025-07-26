<?php

Namespace App\Models;

Use Illuminate\Database\Eloquent\Factories\HasFactory;
Use Illuminate\Database\Eloquent\Model;

Class Message extends Model
{
    Use HasFactory;

    Protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'is_read',
    ];

    Public function sender()
    {
        Return $this->belongsTo(User::class, 'sender_id');
    }

    Public function receiver()
    {
        Return $this->belongsTo(User::class, 'receiver_id');
    }
}