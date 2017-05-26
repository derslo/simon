<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ContactCrudRequest as StoreRequest;
use App\Http\Requests\ContactCrudRequest as UpdateRequest;

class ContactCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel("App\Models\Contact");
        $this->crud->setRoute("admin/contact");
        $this->crud->setEntityNameStrings('Kontakt', 'Kontakte');

        $this->crud->setColumns(
            [
                'name',
                'email',
            ]
        );

        $this->crud->addField(
            [
                'name'  => 'name',
                'label' => "Name",
            ]
        );

        /**
         * Insert an E-Mail Field for Email
         */
        $this->crud->addField(
            [
                'type'  => 'email',
                'name'  => 'email',
                'label' => "Email",
            ]
        );

        /**
         * Insert a Textfield for Mobil
         */
        $this->crud->addField(
            [
                'name'  => 'mobile',
                'label' => "Mobil",
            ]
        );

        /**
         * Insert an Select2 Field for Organisation
         */
        $this->crud->addField(
            [
                'type'      => 'select2',
                'name'      => 'organisation_id', // the db column for the foreign key
                'entity'    => 'organisation', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Organisation", // foreign key model
                'label'     => "Organisation",
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
