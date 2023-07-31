<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servers = Server::paginate(8);
        return view('servers.index', ['servers' => $servers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('servers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'ip_address' => ['required', 'unique:servers,ip_address', 'regex:/^(?:(?:1\d{2}|2[0-4]\d|25[0-5]|[1-9]\d?|[1-9])\.){3}(?:1\d{2}|2[0-4]\d|25[0-5]|[1-9]\d?|[1-9])$/'],
            'datacenter_name' => 'required|string',
        ]);
        // Enregistrez le bien dans la table 'biens'
        $server = new Server($validatedData);
        $server->save();
        return redirect()->route('servers.index')->with('success', 'Le server a été enregistré avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Server $server)
    {
        $servers = Server::where('id', $server->id)
            ->with(['pings' => function ($query) {
                $query->orderBy('created_at', 'ASC')->select('id as ping_id', 'server_id', 'result', 'created_at');
            }])->select('id', 'name', 'ip_address', 'datacenter_name', 'availablity')->first();
        return view('servers.show', ['server' => $servers]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Bien $bien
     */
    public function edit(Server $server)
    {
        return view('servers.edit', ['server' => $server]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Server $server)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'ip_address' => ['required', Rule::unique("servers")->ignore($server->id), 'regex:/^(?:(?:1\d{2}|2[0-4]\d|25[0-5]|[1-9]\d?|[1-9])\.){3}(?:1\d{2}|2[0-4]\d|25[0-5]|[1-9]\d?|[1-9])$/'],
            'datacenter_name' => 'required|string',
            'availablity' => 'required|boolean',
        ]);
        // Enregistrez le bien dans la table 'biens'
        $server->name = $validatedData['name'];
        $server->ip_address = $validatedData['ip_address'];
        $server->datacenter_name = $validatedData['datacenter_name'];
        $server->availablity = $validatedData['availablity'];
        $server->save();
        return redirect()->route('servers.index')->with('success', 'Le server a été mis à jour avec avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     * @param Bien $bien
     */
    public function destroy(Server $server)
    {
        $server->delete();
        return Redirect::route('servers.index')->with('success', $server->titre . ' supprimé avec succès');
    }
}
