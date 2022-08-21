<?php

namespace App\Models\Agent;

use App\Models\Admin\Admin;
use App\Models\Lead\Lead;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agentassignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lead_id',
        'admin_id',
        'description',
        'status',
    ];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($user) {
    //         $user->admin_id = request()->user()->id;
    //     });
    // }

    public function agent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    
}
