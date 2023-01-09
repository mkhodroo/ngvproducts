<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogPost extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    public $table = "wp_posts";
    protected $fillable = [
        'ID', 'guid'
    ];


    public function image()
    {
        $image_id =  DB::connection('mysql2')->table('wp_postmeta')->where('meta_key', '_thumbnail_id ')->where('post_id', $this->ID)->first()->meta_value;
        return BlogPost::where('ID', $image_id)->first()->guid;
    }
}
