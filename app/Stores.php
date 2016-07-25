<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $table = 'stores'; //テーブル名指定

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'store', 'shift_admin_id',
    ];

    public function shift_admin(){
        return $this->belongsTo('App\ShiftAdmin', 'shift_admin_id', 'id');
    }
    
    public function users(){
        return $this->hasMany('App\UserCustom', 'store_id', 'id');
    }
}
