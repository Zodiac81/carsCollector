<?php


namespace App\Repository\Api;


use App\Models\Series;
use Illuminate\Support\Str;

class SeriesRepository
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        return response()->json(['data' => Series::orderBy('position')->get()]);
    }

    /**
     * @param array $request
     * @return Series
     */
    public function store(array $request) :Series
    {
        if(empty($request['reference']))
        {
            $request['reference'] = $this->createSlug($request['name']);
        }
        return Series::create($request);
    }

    public function update(array $request, int $id) :Series
    {
        $item = Series::find($id);
        $item->update($request);
        return $item;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id) :bool
    {
        $series =  Series::find($id);
        return $series->delete();
    }

    /**
     * @param $name
     * @return string
     */
    protected function createSlug(string $name) :string
    {
        return Str::slug($name, '_');
    }
}
