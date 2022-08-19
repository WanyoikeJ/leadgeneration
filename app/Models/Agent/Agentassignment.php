<?php

namespace App\Models\Agent;

use App\Models\Admin\Admin;
use App\Models\Lead\Lead;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agentassignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'lead_id',
        'admin_id',
        'description',
        'status',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->admin_id = request()->user()->id;
        });
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
}
