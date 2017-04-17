{{-- Create a new site --}}
<div>
    <h3>Create Site</h3>
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
    @if (session('site.created'))
        <div class="alert alert-success">
            <strong>Congratulation!</strong><br>
            {{ session('site.created') }}
        </div>
    @endif

    <span class=""></span>

    <form class="form-horizontal col-md-6 col-md-offset-3" method="post" action="{{ route('servers.sites.store', $server->id) }}">

        {{ csrf_field() }}

        {{-- Domain --}}
        <div class="form-group">
            <label for="domain" class="control-label col-sm-3">Domain</label>
            <div class="col-sm-9">
                <input type="text" name="domain" id="domain" class="form-control" placeholder="site.com">
            </div>
        </div>

        {{-- Document Root --}}
        <div class="form-group">
            <label for="doc_root" class="control-label col-sm-3">Document Root</label>
            <div class="col-sm-9">
                <input type="text" name="doc_root" id="doc_root" class="form-control" placeholder="siteroot/docroot">
            </div>
        </div>

        {{-- Repository --}}
        <div class="form-group">
            <label for="repository" class="control-label col-sm-3">Repository</label>
            <div class="col-sm-9">
                <a href="#" class="btn btn-success"><i class="fa fa-github"></i>Connect to github</a>
                {{--<input type="text" name="repository" id="repository" class="form-control" placeholder="mehranhadidi/deployer">--}}
            </div>
        </div>

        {{-- SSL --}}
        <div class="form-group">
            <label for="ssl" class="control-label col-sm-3">SSL</label>
            <div class="col-sm-9">
                <a href="#" class="btn btn-success"><i class="fa fa-lock"></i>Configure SSL</a>
            </div>
        </div>

        {{-- Auto Deploy --}}
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="auto_deploy" id="auto_deploy"> Auto Deploy?
                    </label>
                </div>
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

{{-- Sites --}}
<table class="table table-striped no-border-top">
    <tr>
        <th>#</th>
        <th>Domain</th>
        <th>Document Root</th>
        <th>Repository</th>
        <th>Workers</th>
        <th>SSL</th>
        <th>Manage</th>
    </tr>
    @if(count($server->sites))
        @foreach($server->sites as $site)
            <tr>
                <td>{{ ++$loop->index }}</td>
                <td>{{ $site->domain ?: 'None' }}</td>
                <td>{{ $site->doc_root }}</td>
                <td>{{ $site->repository ?: 'None' }}</td>
                <td>0</td>
                <td>{{ $site->ssl ? 'Active' : 'Inactive' }}</td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('servers.sites.show', [$server->id, $site->id]) }}" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i> Manage</a>
                        <a href="{{ route('servers.sites.destroy', [$server->id, $site->id]) }}" class="btn btn-danger delete"><i class="glyphicon glyphicon-remove"></i> Remove</a>
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7" class="text-center">This server don't have any site. Lets start by creating it.</td>
        </tr>
    @endif
</table>