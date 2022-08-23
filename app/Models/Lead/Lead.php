<?php

namespace App\Models\Lead;

use App\Models\Account\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'accounts_id',
        'description',
        'stage',
        'source',
        'timeline',
        'startdate',
        'amount'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->user_id = request()->user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'accounts_id');
    }
}
