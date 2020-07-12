<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

	 protected $fillable = [
        'title', 'description', 'price', 'image', 'tags', 'time', 'cat_id'
    ];


     protected $dates = [
        'created_at',
        'updated_at',
    // your other new column
    ];

    public function category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }
}
