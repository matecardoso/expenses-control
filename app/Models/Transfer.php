<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['description', 'amount', 'date', 'origin_account_id', 'destination_account_id'];

    protected $dates = ['deleted_at'];

    public function originAccount()
    {
        return $this->belongsTo(Account::class, 'origin_account_id');
    }

    public function destinationAccount()
    {
        return $this->belongsTo(Account::class, 'destination_account_id');
    }
}
