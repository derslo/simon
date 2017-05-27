<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ServiceCrudRequest as StoreRequest;
use App\Http\Requests\ServiceCrudRequest as UpdateRequest;

class ServiceCrudController extends CrudController
{

    public function setup()
    {
        $this->crud->setModel("App\Models\Service");
        $this->crud->setRoute("admin/service");
        $this->crud->setEntityNameStrings('Service', 'Services');

        $this->crud->setColumns(
            [
                'name',
                [
                    'label'         => 'Adresse',
                    'type'          => 'model_function',
                    'function_name' => 'getLink',
                ],
            ]
        );

        $this->crud->addField(
            [
                'name'  => 'name',
                'label' => "Name",
            ]
        );

        /**
         * Insert Markdown Editor for Description
         */
        $this->crud->addField(
            [
                'name'  => 'description',
                'label' => 'Description',
                'type'  => 'simplemde',
            ]
        );

        /**
         * Insert a URL Field for Adresse
         */
        $this->crud->addField(
            [
                'name'  => 'url',
                'label' => "Adresse",
                'type'  => 'url',
                'placeholder' => 'https://my.service.net'
            ]
        );

        /**
         * Insert a URL Field for Administration URL
         */
        $this->crud->addField(
            [
                'name'  => 'admin_url',
                'label' => "Administrations Adresse",
                'type'  => 'url',
            ]
        );

        /**
         * Insert an Select2 Field for Contact
         */
        $this->crud->addField(
            [
                'type'      => 'select2',
                'name'      => 'contact_id', // the db column for the foreign key
                'entity'    => 'contact', // the method that defines the relationship in your Model
                'attribute' => 'form_name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Contact", // foreign key model
                'label'     => "Kontakt",
            ]
        );

        /**
         * Insert an Select2 Field for Server
         */
        $this->crud->addField(
            [
                'type'      => 'select2',
                'name'      => 'server_id', // the db column for the foreign key
                'entity'    => 'server', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Server", // foreign key model
                'label'     => "Server",
            ]
        );

        /**
         * Insert a Checkbox Field for Public
         */
        $this->crud->addField(
            [
                'name'  => 'public',
                'label' => "Öffentlich",
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
