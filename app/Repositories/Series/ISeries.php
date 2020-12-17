<?php


namespace App\Repositories\Series;


use App\Models\Series;

interface ISeries
{
    public function getAll();

    public function getById(int $itemId);

    public function saveItem(array $itemData);

    public function editItem(array $itemData, Series $item);

    public function deleteItem(Series $item);

}
