@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $service->name }}
                        @if($service->public)
                            <span class="label label-success">public</span>
                        @else
                            <span class="label label-danger">private</span>
                        @endif
                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-4 col-md-push-8">

                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-left">
                                            <img class="media-object profile-picture" width="100px"
                                                 src="http://gitlab.devsensation.es/uploads/project/avatar/9/symfony-logo.png"
                                                 alt="Profile picture">
                                        </div><!--media-left-->

                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                {{ $service->name }}<br/>
                                                <small>
                                                    {{ $service->url }}<br/>
                                                    {{ $service->url_admin }}
                                                </small>
                                            </h4>

                                            @if($service->url)
                                                {{ link_to( $service->url , 'Login', ['class' => 'btn btn-info btn-xs fa fa-sign-in']) }}
                                            @endif
                                            @if($service->url_admin)
                                                {{ link_to($service->url_admin, 'Login admin', ['class' => 'btn btn-danger btn-xs']) }}
                                            @endif

                                        </div><!--media-body-->
                                    </li><!--media-->
                                </ul><!--media-list-->

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Server: {{ $service->server->name }}</h4>
                                    </div><!--panel-heading-->

                                    <div class="panel-body">
                                        <ul>
                                            <li>{{ $service->server->fqdn }}</li>
                                            <li>{{ $service->server->ipV4 }}</li>
                                        </ul>
                                        {{ link_to_route('home.server.show', 'Anzeigen' , ['server' => $service->server], ['class' => 'btn btn-info btn-xs']) }}
                                    </div><!--panel-body-->
                                </div><!--panel-->
                            </div><!--col-md-4-->

                            <div class="col-md-8 col-md-pull-4">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>Beschreibung</h4>
                                            </div><!--panel-heading-->

                                            <div class="panel-body">
                                                {!! Markdown::convertToHtml($service->description) !!}
                                            </div><!--panel-body-->
                                        </div><!--panel-->
                                    </div><!--col-xs-12-->
                                </div><!--row-->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>Ansprechpartner</h4>
                                            </div><!--panel-heading-->

                                            <div class="panel-body">
                                                <ul>
                                                    <li>{{ $service->contact->organisation->name }}</li>
                                                    <li>{{ $service->contact->name }}</li>
                                                    <li>{{ $service->contact->email }}</li>
                                                    <li>{{ $service->contact->mobile }}</li>
                                                </ul>
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