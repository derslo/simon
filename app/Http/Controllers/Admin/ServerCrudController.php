<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ServerCrudRequest as StoreRequest;
use App\Http\Requests\ServerCrudRequest as UpdateRequest;

class ServerCrudController extends CrudController
{

    public function setup()
    {
        $this->crud->setModel("App\Models\Server");
        $this->crud->setRoute("admin/server");
        $this->crud->setEntityNameStrings('Server', 'Server');

        $this->crud->setColumns(
            [
                'name',
                'fqdn',
                [
                    'name'  => 'public',
                    'label' => 'Öffentlich',
                    'type'  => 'boolean',
                ],
                [
                    'label'         => "Standort", // Table column heading
                    'type'          => "model_function",
                    'function_name' => 'getLocationName', // the method in your Model
                ],
            ]
        );

        /** Neuer Tabulator: Allgemein */

        $this->crud->addField(
            [
                'name'  => 'name',
                'label' => "Name",
                'tab'   => 'Allgemein',
            ]
        );


        $this->crud->addField(
            [
                'name'  => 'fqdn',
                'label' => "FQDN",
                'tab'   => 'Allgemein',
            ]
        );

        $this->crud->addField(
            [  // Select2
                'label'     => "Standort",
                'type'      => 'select2',
                'tab'       => 'Allgemein',
                'name'      => 'location_id', // the db column for the foreign key
                'entity'    => 'location', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Location" // foreign key model
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
                'label'     => "Contact",
                'tab'       => 'Allgemein',
            ]
        );

        $this->crud->addField(
            [
                'type'  => 'checkbox',
                'name'  => 'public',
                'label' => "Öffentlich",
                'tab'   => 'Allgemein',
            ]
        );

        /** Neuer Tabulator: Netzwerk */

        $this->crud->addField(
            [
                'label' => "IP-Adresse (ipV4)",
                'type'  => 'text',
                'tab'   => 'Netzwerk',
                'name'  => 'ipV4', // the db column for the foreign key
            ]
        );

        $this->crud->addField(
            [
                'label' => "IP-Adresse (ipV6)",
                'type'  => 'text',
                'tab'   => 'Netzwerk',
                'name'  => 'ipV6', // the db column for the foreign key
            ]
        );

        /** Neuer Tabulator: Hardware */

        /**
         * Insert an Select2 Field for Os
         */
        $this->crud->addField(
            [
                'type'      => 'select2',
                'name'      => 'os_id', // the db column for the foreign key
                'entity'    => 'os', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Os", // foreign key model
                'label'     => "Os",
                'tab'       => 'Hardware',
            ]
        );

        $this->crud->addField(
            [
                'name'  => 'ram',
                'label' => "RAM (GB)",
                'tab'   => 'Hardware',
            ]
        );

        /**
         * Insert a Textfield for Prozessorkerne
         */
        $this->crud->addField(
            [
                'name'  => 'cores',
                'label' => "Prozessorkerne",
                'tab'   => 'Hardware',
            ]
        );

        /**
         * Insert an Select2 Field for Storage
         */
        $this->crud->addField(
            [
                'type'      => 'select2',
                'name'      => 'storage_id', // the db column for the foreign key
                'entity'    => 'storage', // the method that defines the relationship in your Model
                'attribute' => 'form_name', // foreign key attribute that is shown to user
                'model'     => "App\Models\Storage", // foreign key model
                'label'     => "Speichersystem",
                'tab'       => 'Hardware',
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
