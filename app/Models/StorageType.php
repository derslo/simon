<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class StorageType extends Model
{
    protected $table = 'codes';

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('type', function (Builder $builder) {
            $builder->where('type', 'storage.type');
        });
    }

    public function save(array $options = [])
    {
        $this->type = 'storage.type';
        parent::save();
    }
}
