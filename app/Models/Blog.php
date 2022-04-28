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

    public function scopeFilter($query,$filter)//Blog::latest()->get()
    {
        $query->when($filter['search']??false, function($query,$search){
       $query->where(function($query) use ($search){
           $query->where('title','LIKE','%'.request('search').'%')
       ->orWhere('body','LIKE','%'.request('search').'%');
       });
    });
    $query->when($filter['category']??false, function($query,$slug){
      $query->wherehas('category',function($query) use ($slug){
          $query->where('slug', $slug);
      });
    });
     $query->when($filter['author']??false, function($query,$username){
      $query->wherehas('author',function($query) use ($username){
          $query->where('username', $username);
      });
    });
    }

    public function category(){
    return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
