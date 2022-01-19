<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Packege extends Model
{
    use HasFactory;

    protected $fillable=[
        'title','details', 'code','status'
    ];

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
