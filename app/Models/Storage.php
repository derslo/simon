<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{

    use CrudTrait;

    protected $fillable = [
        'amount',
        'unit',
        'type',
        'raid',
        'raid_level',
    ];

    public function getFormNameAttribute()
    {
        $base = $this->amount.' '.$this->unit.' '.$this->type;

        return $this->raid ? $base.' (RAID '.$this->raid_level.')' : $base;
    }
}
