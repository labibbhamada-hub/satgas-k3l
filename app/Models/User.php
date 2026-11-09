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
            'must_change_password' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function isDev(): bool
    {
        return $this->role === 'dev';
    }

    public function isSatgas(): bool
    {
        return $this->role === 'satgas';
    }

    public function isInstansi(): bool
    {
        return $this->role === 'instansi';
    }

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }
}
