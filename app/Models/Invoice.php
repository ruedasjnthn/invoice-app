<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $guarded = ['user_id'];

    protected $fillable = [
    'user_id',
    'client_name',
    'client_email',
    'client_street_address',
    'client_city',
    'client_postal_code',
    'client_country',
    'street_address',
    'city',
    'postal_code',
    'country',
    'invoice_date',
    'payment_terms',
    'project_description',
    'item_list',
    'status',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
