<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OsCrudRequest as StoreRequest;
use App\Http\Requests\OsCrudRequest as UpdateRequest;

class OsCrudController extends CrudController
{
    public function setup() {
        $this->crud->setModel("App\Models\Os");
        $this->crud->setRoute("admin/os");
        $this->crud->setEntityNameStrings('Betriebssystem', 'Betriebssysteme');

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
