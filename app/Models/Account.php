<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'user_id'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function revenues()
    {
        return $this->hasMany(Revenue::class);
    }

    public function originTransfers()
    {
        return $this->hasMany(Transfer::class, 'origin_account_id');
    }

    public function destinationTransfers()
    {
        return $this->hasMany(Transfer::class, 'destination_account_id');
    }
}
