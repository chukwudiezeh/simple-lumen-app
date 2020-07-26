<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'isbn', 'title', 'description', 'author_id',
    ];

    public function author() {

        return $this->belongsTo(Author::class);
        
    }
}
