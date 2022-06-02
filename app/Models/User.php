<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    private const DEVELOPER = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    /**
     * FIltra los usuarios que se deben ver en el sistema
     *
     * @param Query $query
     *
     * @return Query
     */
    public function scopeActive($query)
    {
        return $query->where('role_id', '<>', self::DEVELOPER);
    }

    /**
     * Filtra que solo te muestres tu mismo
     *
     * @param Query $query
     * @return Query
     */
    public function scopeMe($query)
    {
        $this->scopeActive($query);
        return $query->where('id', Auth::user()->id);
    }
}
