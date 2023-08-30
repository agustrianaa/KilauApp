<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function admin() {
        return $this->hasOne('App\Models\Admin');
    }
    public function adminpusat() {
        return $this->hasOne('App\Models\AdminPusat');
    }
    public function admincabang(){
        return $this->hasOne('App\Models\AdminCabang');
    }
    public function shelter(){
        return $this->hasOne('App\Models\Shelter');
    }
    public function donatur(){
        return $this->hasOne('App\Models\Donatur');
    }
    public function orangtua(){
        return $this->hasOne('App\Models\Orangtua');
    }
}
