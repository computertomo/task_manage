<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LargeTask extends Model
{
    use SoftDeletes;
    protected $fillable = [
    'body',
    'category_id',
    'start_at',
    'finish_day',
    'deleted_at'
    ];
    
    public function middle_tasks()   
    {
        return $this->hasMany('App\Middle_tasks');  
    }
    public function getPaginateByLimit(int $limit_count = 30)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    // public function getBymiddle_tasks(int $limit_count = 30)
    // {
    //      return $this::middle_tasks()->with('large_task')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    // }
}
