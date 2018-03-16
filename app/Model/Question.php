<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    // protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];

    // narozdíl or fillablu se neptá na nesrovanlosti, ale doplní všechny pole
    protected $guarded = [];

    // místo id doadí slug - getRouteKeyname()
    public function getRouteKeyName(){
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
