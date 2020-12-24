<?php


namespace App\Repositories\Series;


use App\Http\Resources\SeriesResource;
use App\Models\Series;
use Illuminate\Support\Str;

class SeriesRepository implements ISeries
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        return response()->json(['data' => Series::orderBy('position')->with('categories')->get()]);
    }

    public function getById(int $itemId){

        dd(__METHOD__);
    }

    /**
     * @param array $data
     * @return SeriesResource
     */
    public function saveItem(array $data) :SeriesResource
    {
        if(empty($data['reference']))
        {
            $data['reference'] = $this->createSlug($data['name']);
        }

        $createdItem =  Series::create($data);
        $createdItem->categories()->attach($data['categories']);  //ids of categories
        return new SeriesResource($createdItem);
    }

    /**
     * @param Series $series
     * @param array $data
     * @return SeriesResource
     */
    public function editItem(array $data, Series $series) :SeriesResource
    {

        $series->update($data);
        $series->categories()->sync($data['categories']);
        return new SeriesResource($series);
    }

    /**
     * @param Series $series
     * @return Series
     * @throws \Exception
     */
    public function deleteItem(Series $series) :Series
    {
        $series->delete();
        $series->categories()->detach();
        return $series;
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
