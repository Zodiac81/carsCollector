<?php


namespace App\Repositories\Category;


use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryRepository implements ICategory
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        return response()->json(['data' => Category::orderBy('name', 'asc')
            ->with('series')
            ->get()]
        );
    }

    public function getById(int $itemId)
    {
        // TODO: Implement getById() method.
    }

    /**
     * @param array $itemData
     * @return CategoryResource
     */
    public function saveItem(array $itemData): CategoryResource
    {
        $createdItem =  Category::create($itemData);
        return new CategoryResource($createdItem);
    }

    public function editItem(array $itemData, Category $item)
    {
        $item->update($itemData);
        return new CategoryResource($item);
    }

    /**
     * @param Category $item
     * @return Category
     * @throws \Exception
     */
    public function deleteItem(Category $item) :Category
    {
        $item->delete();
        return $item;
    }
}
