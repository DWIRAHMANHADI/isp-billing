<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PPPoEUser;
class PPPoEUser extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara manual
    protected $table = 'pppoe_users';

    protected $fillable = [
        'user_id',
        'username',
        'password',
        'package_id',
        'odp_id',
        'subscription_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function odp()
    {
        return $this->belongsTo(ODP::class);
    }
}


