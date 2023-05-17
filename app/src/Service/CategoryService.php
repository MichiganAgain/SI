<?php

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\TaskRepository;

class CategoryService implements CategoryServiceInterface
{

    private CategoryRepository $categoryRepository;
    private TaskRepository $taskRepository;

    public function __construct(CategoryRepository $categoryRepository, TaskRepository $taskRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->taskRepository = $taskRepository;
    }

    public function save(Category $category): void
    {
        if (null == $category->getId()) {
            $category->setCreatedAt(new \DateTimeImmutable());
        }
        $category->setUpdatedAt(new \DateTimeImmutable());

        $this->categoryRepository->save($category);
    }

    /**
     * Can Category be deleted?
     *
     * @param Category $category Category entity
     *
     * @return bool Result
     */
    public function canBeDeleted(Category $category): bool
    {
        try {
            $result = $this->taskRepository->countByCategory($category);

            return !($result > 0);
        } catch (NoResultException|NonUniqueResultException) {
            return false;
        }
    }
}