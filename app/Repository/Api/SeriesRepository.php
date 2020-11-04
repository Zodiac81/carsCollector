<?php


namespace App\Repository\Api;


use App\Http\Resources\SeriesResource;
use App\Models\Series;
use Illuminate\Support\Str;

class SeriesRepository
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        return response()->json(['data' => Series::orderBy('position')->with('categories')->get()]);
    }

    /**
     * @param array $request
     * @return SeriesResource
     */
    public function store(array $request) :SeriesResource
    {
        if(empty($request['reference']))
        {
            $request['reference'] = $this->createSlug($request['name']);
        }

        $createdItem =  Series::create($request);
        $createdItem->categories()->attach($request['categories']);
        return new SeriesResource($createdItem);
    }

    public function update(array $request, int $id) :SeriesResource
    {
        $item = Series::find($id);
        $item->update($request);
        $item->categories()->sync($request['categories']);
        return new SeriesResource($item);
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id) :bool
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
