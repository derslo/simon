<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{

    use CrudTrait;

    protected $fillable = [
        'amount',
        'unit_id',
        'type_id',
        'raid',
        'raid_level',
    ];

    public function unit()
    {
        $this->belongsTo(StorageUnit::class);
    }

    public function type()
    {
        $this->belongsTo(StorageType::class);
    }

    public function getFormNameAttribute()
    {
        $base = $this->amount.' '.StorageUnit::find($this->unit_id)->value.' '.StorageType::find($this->type_id)->value;

        return $this->raid ? $base.' (RAID '.$this->raid_level.')' : $base;
    }
}
