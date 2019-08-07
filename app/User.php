<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;
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

    /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function hoadon()
    {
        //1khach hang co nhieu hoadon
    	return $this->hasMany('App\Hoadon','idusers','id');
    }


    public function binhluan()
    {
        //1khach hang co nhieu binh luan
    	return $this->hasMany('App\Comment','idusers','id');
    }

    public function sanpham()
    {
        // 1 users co dang nhieu san pham
        return $this->hasMany('App\SanPham','idusers','id');
    }

    
}
