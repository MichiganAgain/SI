<?php

namespace App\Service;

use App\Entity\Category;

interface CategoryServiceInterface
{
    public function save(Category $category): void;

    /**
     * Can Category be deleted?
     *
     * @param Category $category Category entity
     *
     * @return bool Result
     */
    public function canBeDeleted(Category $category): bool;
}

