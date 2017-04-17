<?php

namespace App\Http\Controllers;

use App\Server;
use App\Site;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Server $server
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Server $server)
    {
        $this->validate($request, [
            'doc_root' => 'required',
        ]);

        if($server->sites()->create($request->all()))
        {
            return redirect()->route('servers.show', $server->id)
                ->with('site.created', 'Site Created. Now you can configure it.');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'yohooo';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Server $server
     * @param Site $site
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Server $server, Site $site)
    {
        $site->delete();

        return 'true';
    }
}
