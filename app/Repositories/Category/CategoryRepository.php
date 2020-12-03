<?php


namespace App\Repositories\Category;


use App\Models\Category;

class CategoryRepository implements ICategory
{

    public function getAll()
    {
        return response()->json(['data' => Category::orderBy('id')->with('series')->get()]);
    }

    public function getById(int $itemId)
    {
        // TODO: Implement getById() method.
    }

    public function saveItem(array $itemData)
    {
        // TODO: Implement saveItem() method.
    }

    public function editItem(array $itemData, Category $item)
    {
        // TODO: Implement editItem() method.
    }

    public function deleteItem(Category $item)
    {
        // TODO: Implement deleteItem() method.
    }
}
