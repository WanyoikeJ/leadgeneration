<?php

namespace App\Models\Agent;

use App\Models\Admin\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'admin_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->admin_id = request()->user()->id;
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
