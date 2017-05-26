<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class WelcomeController extends Controller
{
    public function index()
    {

        return view('welcome');
    }

    public function serverDatatable(Datatables $datatables)
    {
        return $datatables->eloquent(Server::query())
            ->addColumn('action', 'tables.servers-action')
            ->make(true);
    }

    public function serviceDatatable(Datatables $datatables)
    {
        return $datatables->eloquent(Service::query())
            ->addColumn('action', 'tables.services-action')
            ->make(true);
    }
}
