<?php
namespace App\Models;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Blog{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public $date;
    public function __construct($title,$slug,$intro,$body,$date){
        $this->title=$title;
        $this->slug=$slug;
        $this->intro=$intro;
        $this->body=$body;
        $this->date=$date;
    }
    public static function all(){
        return collect(File::files(resource_path("blogs")))
            ->map(function($file){
             $obj=YamlFrontMatter::parseFile($file);
            return new Blog($obj->title,$obj->slug,$obj->intro,$obj->body(),$obj->date);
            })
            ->sortbyDesc('date');
            // dd($blogs);
    }
    public static function find($slug){
       $blogs=static::all();
       return $blogs->firstWhere('slug',$slug);
    }
    public static function findOrFail($slug){
       $blogs=static::all();
       $blog=$blogs->firstWhere('slug',$slug);
        if(!$blog){
           throw new ModelNotFoundException();//abort('404');
       }
       return $blog;
    }

}