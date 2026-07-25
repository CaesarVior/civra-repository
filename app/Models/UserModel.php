<?php

namespace App\Models;

class UserModel extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'phone_number', 'role_id'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
