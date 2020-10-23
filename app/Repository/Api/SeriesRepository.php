<?php


namespace App\Repository\Api;


use App\Models\Series;

class SeriesRepository
{
    public function get()
    {
        return response()->json(['data' => Series::all()]);
    }
}
