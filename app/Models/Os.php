<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Os extends Model
{

    use CrudTrait;

    protected $fillable = ['name'];
}
