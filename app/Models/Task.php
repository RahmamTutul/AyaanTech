<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Packege;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'name','details,','image','packege_id'
    ];
    public function packege(){
       return $this->belongsTo(Packege::class,'packege_id');
    }
}
