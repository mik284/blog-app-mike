<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Blog extends Model
{
    /**
     * Get the author that wrote the posts.
     */
    public function writer()
    {
        return $this->belongsTo('App\User', 'author', 'id');
    }
}
