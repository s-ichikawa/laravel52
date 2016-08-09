<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Sleimanx2\Plastic\Searchable;

class Book extends Model
{
    use Searchable;

    protected $fillable = ['name', 'body', 'tags', 'images'];

    public $searchable = ['id', 'name', 'body', 'tags', 'images'];

//    public $syncDocument = false;

    public function buildDocument()
    {
        return [
            'id'   => $this->id,
            'tags' => $this->tags,
        ];
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}