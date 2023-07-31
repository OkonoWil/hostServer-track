<?php

namespace App\Console\Commands;

use App\Models\Ping;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ScriptServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scriptserver';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cette commande va s\'exercute un script qui va vérifier la disponibilité des server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Tâche scriptserver exécutée à : ' . now()->toDateTimeString());
        $servers = DB::table('servers')->get();
        foreach ($servers as $server) {
            $ping = new Ping();
            $ping->server_id = $server->id;
            $ping->result = $server->availablity;
            $ping->save();
            if ($ping->result) {
                $this->info('Server ' . $server->id . ' est actif');
            } else {
                $this->info('Server ' . $server->id . ' est inactif');
            }
        }
    }
}
