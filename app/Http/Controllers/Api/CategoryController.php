<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\ICategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends BaseApiController
{
    protected $repository;

    /**
     * CategoryController constructor.
     */
    public function __construct(ICategory $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->repository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request) :JsonResponse
    {
        $storedItem = $this->repository->saveItem($request->validated());
        return $storedItem ?
            $this->success('Successfully created & stored', $storedItem, Response::HTTP_CREATED) :
            $this->error();
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
     * @param CategoryRequest $request
     * @param Category $category
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, Category $category) :JsonResponse
    {
        $updateItem = $this->repository->editItem($request->validated(), $category);
        return $updateItem ?
            $this->success('Successfully updated', $updateItem, Response::HTTP_OK) :
            $this->error();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category) :JsonResponse
    {
        $deletedItem = $this->repository->deleteItem($category);
        return $deletedItem ?
            $this->success('Successfully deleted', $deletedItem->id, Response::HTTP_OK) :
            $this->error();
    }
}
