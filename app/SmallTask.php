<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Small_tasks extends Model
{
    use SoftDeletes;
    protected $fillable = [
    'body',
    'category_id',
    'start_at',
    'finish_day',
    'deleted_at',
    'middle_tasks_id'
    ];
    
    public function middle_task()
    {
        return $this->belongsTo('App\Middle_tasks');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
