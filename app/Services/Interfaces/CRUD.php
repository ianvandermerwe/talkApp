<?php namespace App\Services\Interfaces;

interface CRUD {

    public function create($object);

    public function edit($object);

    public function deleteItem($object);

}