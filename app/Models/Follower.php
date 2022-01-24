<?php


namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Follower as Authenticatable;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;


class Follower extends Authenticatable
{
    use Notifiable, CanFollow, CanBeFollowed;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}