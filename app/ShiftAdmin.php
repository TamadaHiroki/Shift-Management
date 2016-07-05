<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ShiftAdmin extends Authenticatable
{
    protected $table = 'shift_admin'; //テーブル名指定

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'password', 'email',
    ];
    protected $hidden = [
        'password',
    ];
    
    public function store(){
        return $this->hasOne('App\Store', 'shift_admin_id', 'id');
    }
    
}
