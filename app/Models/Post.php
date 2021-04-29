<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id', 'title', 'content','photo','slug'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id' );
    }

    // public function getFeaturedAttribute($photo)
    // {
    //     return asset($photo);
    // }


    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag' );
    }

}
