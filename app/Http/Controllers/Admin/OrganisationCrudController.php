<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OrganisationCrudRequest as StoreRequest;
use App\Http\Requests\OrganisationCrudRequest as UpdateRequest;

class OrganisationCrudController extends CrudController
{
    public function setup() {
        $this->crud->setModel("App\Models\Organisation");
        $this->crud->setRoute("admin/organisation");
        $this->crud->setEntityNameStrings('Organisation', 'Organisationen');

        $this->crud->setColumns(['name']);
        $this->crud->addField([
            'name' => 'name',
            'label' => "Organisation"
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
