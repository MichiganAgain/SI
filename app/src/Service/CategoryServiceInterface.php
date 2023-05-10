<?php

namespace App\Service;

use App\Entity\Category;

interface CategoryServiceInterface
{
    public function save(Category $category): void;
}