<?php


namespace App\Repositories\Category;


use App\Models\Category;

interface ICategory
{
    public function getAll();

    public function getById(int $itemId);

    public function saveItem(array $itemData);

    public function editItem(array $itemData, Category $item);

    public function deleteItem(Category $item);
}
