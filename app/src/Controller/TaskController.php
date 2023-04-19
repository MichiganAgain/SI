<?php

namespace App\Controller;

use App\Repository\RecordRepository;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('task')]
class TaskController extends AbstractController
{

    private TaskRepository $repository;

    /**
     * @param TaskRepository $repository
     */
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }


    #[Route(
        '',
        name: 'task_index',
        methods: 'GET'
    )]
    public function index():Response
    {
        //return new Response('Index Action');
        $tasks = $this->repository->findAll();

        return $this->render(
            'task/index.html.twig',
            ['tasks'=>$tasks]
        );
    }
}