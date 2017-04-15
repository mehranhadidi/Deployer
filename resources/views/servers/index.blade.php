@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Create a Server</div>

                <div class="panel-body">
                    {{-- validate server creation --}}
                    @if($errors->all())
                        <div class="alert alert-danger" role="alert">
                            <strong>Ops, </strong>
                            Please fix the following errors:
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Server creation successfull message --}}
                    @if (session('server.created'))
                        <div class="alert alert-success">
                            <strong>Congratulation!</strong><br>
                            {{ session('server.created') }}
                        </div>
                    @endif

                    <form class="form-horizontal col-md-6 col-md-offset-3" method="post" action="{{ route('servers.store') }}" autocomplete="off">

                        {{ csrf_field() }}

                        {{-- Name --}}
                        <div class="form-group">
                            <label for="name" class="control-label col-sm-3">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>

                        {{-- IP Address --}}
                        <div class="form-group">
                            <label for="ip" class="control-label col-sm-3">IP Address</label>
                            <div class="col-sm-9">
                                <input type="text" name="ip" id="ip" class="form-control">
                            </div>
                        </div>

                        <hr>

                        {{-- SSH Username --}}
                        <div class="form-group">
                            <label for="username" class="control-label col-sm-3">SSH Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                        </div>

                        {{-- SSH Password --}}
                        <div class="form-group">
                            <label for="password" class="control-label col-sm-3">SSH Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>

                        {{-- Save --}}
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i>Create Server</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Servers</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>IP Address</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Manage</th>
                        </tr>

                        @if(count($servers))
                            @foreach($servers as $server)
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $server->name }}</td>
                                    <td>{{ $server->ip }}</td>
                                    <td><i class="glyphicon glyphicon-ok color-green"></i>Active</td>
                                    <td><i class="glyphicon glyphicon-time" title="{{ $server->created_at }}"></i>{{ $server->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-cog"></i>Manage</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="6">You don't have any server at this time. Start by creating it.</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection