<?php

namespace App\Controller;

use App\Traits\RepositoryAwareTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ProcedureController extends AbstractController
{
    use RepositoryAwareTrait;

    const PER_PAGE = 20;

    /**
     * @Route("/procedures", name="procedures_list")
     */
    public function listAction(Request $request)
    {
        $filters = $request->get('filters', []);
        $currentPage = $request->get('page', 1);

        $procedures = $this->getProcedureRepository()->getAvailableProcedures($filters, $currentPage, self::PER_PAGE);
        $patients = $this->getPatientRepository()->findAll();

        $maxRows = $procedures->count();
        $maxPages = ceil($maxRows / self::PER_PAGE);

        return $this->render('procedures/list.html.twig', [
           'procedures' => $procedures,
            'patients' => $patients,
            'filters' => $filters,
            'currentPage' => $currentPage,
            'maxPages' => $maxPages,
            'maxRows' => $maxRows
        ]);
    }
}