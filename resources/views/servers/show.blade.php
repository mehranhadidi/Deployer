@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Server Details
                        </div>
                        <div class="col-md-6">
                            <table class="server-details">
                                <tr>
                                    <td>{{ $server->name }}</td>
                                    <td>{{ $server->ip }}</td>
                                    <td>
                                        Active <i class="glyphicon glyphicon-ok color-green"></i>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#sites" aria-controls="sites" role="tab" data-toggle="tab">Sites</a></li>
                            <li role="presentation"><a href="#ssh_keys" aria-controls="ssh_keys" role="tab" data-toggle="tab">SSH Keys</a></li>
                            <li role="presentation"><a href="#scheduler" aria-controls="scheduler" role="tab" data-toggle="tab">Scheduler</a></li>
                            <li role="presentation"><a href="#daemons" aria-controls="daemons" role="tab" data-toggle="tab">Daemons</a></li>
                            <li role="presentation"><a href="#network" aria-controls="network" role="tab" data-toggle="tab">Network</a></li>
                            <li role="presentation"><a href="#monitoring" aria-controls="monitoring" role="tab" data-toggle="tab">Monitoring</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="sites">
                                @include('servers.sites.index')
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="ssh_keys">SSH Keys</div>
                            <div role="tabpanel" class="tab-pane fade" id="scheduler">Scheduler</div>
                            <div role="tabpanel" class="tab-pane fade" id="daemons">Daemons</div>
                            <div role="tabpanel" class="tab-pane fade" id="network">Network</div>
                            <div role="tabpanel" class="tab-pane fade" id="monitoring">Monitoring</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection