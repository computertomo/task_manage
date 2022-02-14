<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Middle_tasks extends Model
{
    use SoftDeletes;
    protected $fillable = [
    'body',
    'category_id',
    'start_at',
    'finish_day',
    'deleted_at',
    'large_tasks_id'
    ];
    
 public function large_task()
    {
        return $this->belongsTo('App\LargeTask');
    }
 public function small_tasks()   
    {
        return $this->hasMany('App\Small_tasks');  
    }
 public function getPaginateByLimit(int $limit_count = 10)
 {
        return $this::with('large_task')->orderBy('updated_at', 'DESC');
 }
 public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
