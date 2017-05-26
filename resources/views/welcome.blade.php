@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-content">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#server" aria-controls="server" role="tab"
                                                                      data-toggle="tab">Server</a></li>
                            <li role="presentation"><a href="#service" aria-controls="service" role="tab"
                                                       data-toggle="tab">Dienste</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="server">
                                <table id="servers-table" class="table table-bordered table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>FQDN</th>
                                        <th>IP</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="service">
                                <table id="services-table" class="table table-bordered table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Adresse</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#servers-table').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/German.json"
            },
            serverSide: true,
            processing: true,
            ajax: '{{ route('welcome.server.datatable') }}',
            columns: [
                {data: 'name'},
                {data: 'fqdn'},
                {data: 'ipV4'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });

    $(function () {
        $('#services-table').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/German.json"
            },
            serverSide: true,
            processing: true,
            ajax: '{{ route('welcome.service.datatable') }}',
            columns: [
                {data: 'name'},
                {data: 'url'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush