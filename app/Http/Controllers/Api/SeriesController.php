<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSeriesRequest;
use App\Models\Series;
use App\Repository\Api\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeriesController extends BaseApiController
{
    protected $repository;

    /**
     * SeriesController constructor.
     */
    public function __construct()
    {
        $this->repository = new SeriesRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @param SeriesRepository $seriesRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->repository->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreSeriesRequest $request)
    {
       // dd($request->all());
        $storedItem = $this->repository->store($request->validated());

        return $storedItem ? response()->json(['status' => 'success', 'msg' => 'data created & stored', 'data' => $storedItem], Response::HTTP_CREATED)
            : response()->json(['status' => 'error', 'msg' => 'data doesn`t stored'], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $deletedItem = $this->repository->destroy($id);
        return $deletedItem ? response()->json(['status' => 'success', 'msg' => 'deleted', 'data' => $id], Response::HTTP_OK)
            : response()->json(['status' => 'error', 'msg' => 'data doesn`t deleted'], Response::HTTP_BAD_REQUEST);
    }
}
