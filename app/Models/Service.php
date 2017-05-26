<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    use CrudTrait;

    protected $fillable = [
        'name',
        'description',
        'url',
        'admin_url',
        'contact_id',
        'public',
        'server_id',
    ];

    public function contact()
    {
        $this->belongsTo(Contact::class);
    }

    public function server()
    {
        $this->belongsTo(Server::class);
    }

    public function getLink()
    {
        return '<a href="'.$this->url.'" target="_blank">'.$this->url.'</a>';
    }
}
