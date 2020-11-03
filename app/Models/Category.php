<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded =  [];
    public $timestamps = false;

    const EXCLUSIVES = [
        'target' => 'Target',
        'walmart' => 'Walmart',
        'samsClub' => 'Sam\'s Club',
        'kmart' => 'Kmart',
        'toysRus' => 'Toys "R" Us',
        'ukFauxWheelPromotion' => 'UK Faux Wheel Drive Promotion',
        'matty' => 'MattyCollector.com',
        'mattel' => 'Mattel',
        'frGaskPromotion' => 'France Gask-its Promotion',
        'disneyland' => 'Disneyland and Disney World',
        'carsLand' => 'Cars Land',
    ];
}

