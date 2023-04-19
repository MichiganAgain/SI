<?php
/**
 * Record controller.
 */

namespace App\Controller;

use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RecordController.
 */
#[Route('/record')]
class RecordController extends AbstractController
{
    /**
     * Index action.
     *
     * @param RecordRepository $repository Record repository
     *
     * @return Response HTTP response
     */
    #[Route(
        '',
        name: 'record_index',
        methods: 'GET'
    )]
    public function index(RecordRepository $recordRepository):Response
    {
        //return new Response('Index Action');
        $records = $recordRepository->findAll();

        return $this->render(
           'record/index.html.twig',
           ['records'=>$records]
        );
    }

    #[Route(
        '/{id}',
        name: 'record_view',
        requirements: ['name' => '[1-9]\d*'],
        methods: 'GET'
    )]
    public function view (RecordRepository $recordRepository, int $id): Response
    {

        $record = $recordRepository->findOneById($id);
        return $this->render(
            'record/view.html.twig',
            ['record'=>$record]
        );
    }
}
