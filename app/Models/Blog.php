<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=[];
    // protected $fillable=['title','intro','body'];
    protected $with=['category','author'];
    public function category(){
    return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}