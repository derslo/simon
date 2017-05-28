<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StorageCrudRequest as StoreRequest;
use App\Http\Requests\StorageCrudRequest as UpdateRequest;

class StorageCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel("App\Models\Storage");
        $this->crud->setRoute("admin/storage");
        $this->crud->setEntityNameStrings('Speichersystem', 'Speichersysteme');
        $this->crud->setFromDb();

        $this->crud->setColumns(
            [
                [
                    'name'  => 'form_name',
                    'label' => 'Name',
                ],
            ]
        );

        /**
         * Insert a Numberfield Field for Amount
         */
        $this->crud->addField(
            [
                'name'  => 'amount',
                'label' => "Menge",
                'type'  => 'number',
                // 'suffix' => ".00",
            ]
        );

        /**
         * Insert an Select2 Field for Unit
         */
        $this->crud->addField(
            [
                'type'      => 'select2',
                'name'      => 'unit_id', // the db column for the foreign key
                'entity'    => 'unit', // the method that defines the relationship in your Model
                'attribute' => 'value', // foreign key attribute that is shown to user
                'model'     => "App\Models\StorageUnit", // foreign key model
                'label'     => "Unit",
            ]
        );

        /**
         * Insert an Select2 Field for Type
         */
        $this->crud->addField(
            [
                'type'      => 'select2',
                'name'      => 'type_id', // the db column for the foreign key
                'entity'    => 'type', // the method that defines the relationship in your Model
                'attribute' => 'value', // foreign key attribute that is shown to user
                'model'     => "App\Models\StorageType", // foreign key model
                'label'     => "Type",
            ]
        );

        /**
         * Insert a Checkbox Field for Raid
         */
        $this->crud->addField(
            [
                'name'  => 'raid',
                'label' => "Raid",
                'type'  => 'checkbox',
            ]
        );

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
