<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
      return [
           'id' => $this->id,
           'title' => $this->title,
           'desc' => $this->desc,

      ];
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'desc'
    ];    
}