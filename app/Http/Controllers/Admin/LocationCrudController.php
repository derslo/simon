<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\LocationCrudRequest as StoreRequest;
use App\Http\Requests\LocationCrudRequest as UpdateRequest;

class LocationCrudController extends CrudController
{
    public function setup() {
        $this->crud->setModel("App\Models\Location");
        $this->crud->setRoute("admin/location");
        $this->crud->setEntityNameStrings('Standort', 'Standorte');

        $this->crud->setColumns(['name']);
        $this->crud->addField([
            'name' => 'name',
            'label' => "Standort"
        ]);
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
