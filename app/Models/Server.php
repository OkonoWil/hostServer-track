<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Server extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'ip_address', 'datacenter_name', 'availablity'];

    public function pings(): HasMany
    {
        return $this->hasMany(Ping::class);
    }
}
