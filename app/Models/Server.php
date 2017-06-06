<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Server extends Model
{
    use CrudTrait;

    protected $fillable = [
        'name',
        'fqdn',
        'public',
        'location_id',
        'description',
        'contact_id',
        'os_id',
        'virtual',
        'ram',
        'cores',
        'storage_id',
        'ipV4',
        'ipV6'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function getLocationName()
    {
        return Location::find($this->location_id)->name;
    }

    public function os()
    {
        return $this->belongsTo(Os::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

}
