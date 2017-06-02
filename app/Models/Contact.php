<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    use CrudTrait;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'organisation_id',
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }

    public function getFormNameAttribute()
    {
        return '[' . Organisation::findOrFail($this->organisation_id)->name . '] ' . $this->name;
    }
}
