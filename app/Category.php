<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Postに対するリレーション
    public function tasks()   
{
    return $this->hasMany('App\Task');  
}
    public function middle_tasks()   
{
    return $this->hasMany('App\Middle_tasks');  
}
    public function small_tasks()   
{
    return $this->hasMany('App\Small_tasks');  
}

}
