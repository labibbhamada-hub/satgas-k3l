<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'telp',
        'password',
        'role',
        'nama_instansi',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function isDev()
    {
        return $this->role === 'dev';
    }

    public function isSatgas()
    {
        return $this->role === 'satgas';
    }

    public function isInstansi()
    {
        return $this->role === 'instansi';
    }
}
