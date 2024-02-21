<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_id';

    protected $fillable = [
        'type_id',
        'date',
    ];
    public function prodactAll()
    {

        return $this->belongsTo(ProductType::class, 'type_id', 'type_id');
    }
}
