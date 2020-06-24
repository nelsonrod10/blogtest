<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'description',
        'slug',
        'publication_date',
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
