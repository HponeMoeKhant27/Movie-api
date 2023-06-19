<?php

namespace Movie\Api\Movie\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Movie\Api\Comment\Models\Comment;

class Movie extends Model
{
    use SoftDeletes;

    protected $table = 'movies';


    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'summary', 'cover_image', 'generes', 'author', 'tags', 'imdb_rate'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
