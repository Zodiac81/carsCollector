<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreSeriesRequest;
use App\Models\Series;

use App\Repositories\Series\ISeries;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SeriesController extends BaseApiController
{
    protected $repository;

    /**
     * SeriesController constructor.
     * @param ISeries $repository
     */
    public function __construct(ISeries $repository)
    {
        $this->repository =$repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return $this->repository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSeriesRequest $request
     * @return JsonResponse
     */
    public function store(StoreSeriesRequest $request)
    {
        $storedItem = $this->repository->saveItem($request->validated());
        return $storedItem ?
            $this->success('Successfully created & stored', $storedItem, Response::HTTP_CREATED) :
            $this->error();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreSeriesRequest $request
     * @param Series $series
     * @return JsonResponse
     */
    public function update(StoreSeriesRequest $request, Series $series): JsonResponse
    {
        $updateItem = $this->repository->editItem($request->validated(), $series);
        return $updateItem ?
            $this->success('Successfully updated', $updateItem, Response::HTTP_OK) :
            $this->error();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Series $series
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Series $series) :JsonResponse
    {
        $deletedItem = $this->repository->deleteItem($series);
        return $deletedItem ? $this->success('Successfully deleted', $deletedItem->id, Response::HTTP_OK) :
            $this->error();
    }
}
