<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'image', 'name', 'description', 'created_at', 'updated_at'
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    // your other new column
    ];

       public function product()
	{
	    return $this->belongsTo('App\Product', 'cat_id');
	}
}
