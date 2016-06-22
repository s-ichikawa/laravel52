<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Sleimanx2\Plastic\Searchable;

class Event extends Model
{
    use Searchable;

    protected $fillable = [
        'event_id',
        'title',
        'catch',
        'description',
        'event_url',
    ];

    public $searchable = ['title', 'catch', 'description', 'event_url'];

    public function buildDocument()
    {
        return [
            'title'       => $this->title,
            'catch'       => $this->catch,
            'description' => $this->description,
            'event_url'   => $this->event_url,
        ];
    }
}