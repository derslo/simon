@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $server->name }} ({{ $server->fqdn }})
                        @if($server->public)
                            <span class="label label-success">public</span>
                        @else
                            <span class="label label-danger">private</span>
                        @endif
                        <span class="pull-right">
                        <a href="{{ url('/admin/server/'.$server->id.'/edit') }}" class="btn btn-xs btn-info">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Bearbeiten</a>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>Beschreibung</h4>
                                            </div><!--panel-heading-->
                                            <div class="panel-body">
                                                {!! Markdown::convertToHtml($server->description) !!}
                                            </div><!--panel-body-->
                                        </div><!--panel-->
                                    </div><!--col-md-6-->
                                </div><!--row-->
                                <div class="row">
                                    @if($server->contact)
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>Ansprechpartner</h4>
                                            </div><!--panel-heading-->
                                            <div class="panel-body">
                                                <ul>
                                                    <li>{{ $server->contact->organisation->name }}</li>
                                                    <li>{{ $server->contact->name }}</li>
                                                    <li>{{ $server->contact->email }}</li>
                                                    <li>{{ $server->contact->mobile }}</li>
                                                </ul>
                                            </div><!--panel-body-->
                                        </div><!--panel-->
                                    </div><!--col-md-6-->
                                    @endif
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>Standort</h4>
                                            </div><!--panel-heading-->
                                            <div class="panel-body">
                                                <ul>
                                                    <li>{{ $server->location->name }}</li>
                                                </ul>
                                            </div><!--panel-body-->
                                        </div><!--panel-->
                                    </div><!--col-md-6-->
                                </div><!--row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>Netzwerk</h4>
                                            </div><!--panel-heading-->
                                            <div class="panel-body">
                                                <ul>
                                                    <li>IPv4: {{ $server->ipV4 }}</li>
                                                    <li>IPv6: {{ $server->ipV6 }}</li>
                                                </ul>
                                            </div><!--panel-body-->
                                        </div><!--panel-->
                                    </div><!--col-md-6-->
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>Hardware</h4>
                                            </div><!--panel-heading-->
                                            <div class="panel-body">
                                                <ul>
                                                    @if($server->os)<li>Betriebssystem: {{ $server->os->name }}</li>@endif
                                                    <li>Prozessoren: {{ $server->cores }}</li>
                                                    <li>RAM: {{ $server->ram }} GB</li>
                                                    @if($server->storage)<li>Storage: {{ $server->storage->form_name }}</li>@endif
                                                </ul>
                                            </div><!--panel-body-->
                                        </div><!--panel-->
                                    </div><!--col-md-6-->
                                </div><!--row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>Dienste</h4>
                                            </div><!--panel-heading-->
                                            <div class="panel-body">
                                                <table id="services-table"
                                                       class="table table-bordered table-striped text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Adresse</th>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div><!--panel-body-->
                                        </div><!--panel-->
                                    </div><!--col-md-6-->
                                </div><!--row-->
                            </div><!--col-md-8-->
                        </div><!--row-->
                    </div><!--panel body-->
                </div><!-- panel -->
            </div><!-- col-md-10 -->
        </div><!-- row -->
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#services-table').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/German.json"
            },
            serverSide: true,
            processing: true,
            ajax: '{{ route('home.service.datatable', ['server' => $server]) }}',
            columns: [
                {data: 'name'},
                {data: 'url'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush