<?php

namespace App\Models\Account;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status',
        'slug',
        'user_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->slug = Str::slug(request()->name, '-');
            $user->user_id = request()->user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
