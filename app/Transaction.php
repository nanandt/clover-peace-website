<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Transaction extends Model
{
    use softDeletes;

    protected $fillable = [
        'travel_packages_id', 'users_id', 'transaction_total', 'transaction_status'
    ];

    protected $hidden =[

    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
        // relasi dengan model TransactionDetail
    }

    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
        // relasi dgn model TravelPackage
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
