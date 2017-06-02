<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    public function index()
    {

        return view('home');
    }

    public function serverDatatable(Datatables $datatables)
    {
        $builder = Server::query();

        if (\Auth::guest()) {
            $builder->where('public', true);
        }

        return $datatables->eloquent($builder)
            ->addColumn('action', 'tables.servers-action')
            ->make(true);
    }

    public function serviceDatatable(Datatables $datatables)
    {
        $builder = Service::query();

        if (\Auth::guest()) {
            $builder->where('public', true);
        }

        return $datatables->eloquent($builder)
            ->addColumn('action', 'tables.services-action')
            ->make(true);
    }

    public function showServer(Server $server)
    {
        if (\Auth::guest() && !$server->public) {
            return abort(403);
        }

        return $server;
    }

    public function showService(Service $service)
    {
        if (\Auth::guest() && !$service->public) {
            return abort(403);
        }

        return view('home.service', ['service' => $service]);
    }
}
