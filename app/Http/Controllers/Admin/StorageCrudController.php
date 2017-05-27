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
         * Insert an Radio-Field for Unit
         */
        $this->crud->addField(
            [
                'name'    => 'unit', // the name of the db column
                'label'   => 'Einheit', // the input label
                'type'    => 'radio',
                'options' => [ // the key will be stored in the db, the value will be shown as label;
                    'PB' => "PB",
                    'TB' => "TB",
                    'GB' => "GB",
                ],
                // optional
                'inline'  => true, // show the radios all on the same line?
            ]
        );

        /**
         * Insert an Radio-Field for Type
         */
        $this->crud->addField(
            [
                'name'    => 'type', // the name of the db column
                'label'   => 'Typ', // the input label
                'type'    => 'radio',
                'options' => [ // the key will be stored in the db, the value will be shown as label;
                    'TB' => "TB",
                    'GB' => "GB",
                ],
                // optional
                'inline'  => true, // show the radios all on the same line?
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
