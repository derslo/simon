<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StorageCrudRequest as StoreRequest;
use App\Http\Requests\StorageCrudRequest as UpdateRequest;

class StorageCrudController extends CrudController
{
    public function setup() {
        $this->crud->setModel("App\Models\Storage");
        $this->crud->setRoute("admin/storage");
        $this->crud->setEntityNameStrings('Speichersystem', 'Speichersysteme');

        $this->crud->setFromDb();
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}
