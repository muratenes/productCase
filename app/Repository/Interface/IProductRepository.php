<?php

namespace App\Repository\Interface;

interface IProductRepository
{
    public function all();
    public function findById(int $id);
}
