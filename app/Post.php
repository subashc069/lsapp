<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name
    protected $table ='posts';
    //primary key 
    public $primarykey ='id';
    //Timestamps
    public $timestamps =true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
