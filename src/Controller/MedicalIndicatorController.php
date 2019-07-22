<?php

namespace App\Controller;

use App\Entity\MedicalIndicator;
use App\Traits\RepositoryAwareTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MedicalIndicatorController extends AbstractController
{
    use RepositoryAwareTrait;

    /**
     * @Route("procedure/{id}/details/add-indicator", name="add_indicator")
     */
    public function addIndicatorAction(Request $request)
    {
        $procedureId = $request->get('id');
        $procedure = $this->getProcedureRepository()->find($procedureId);
        $indicatorDetails = $request->get('indicator');

        $indicator = new MedicalIndicator();

        $indicator
            ->setProcedure($procedure)
            ->setIndicator($this->getIndicatorRepository()->find($indicatorDetails['indicator']))
            ->setValue($indicatorDetails['value'])
        ;

        $em = $this->getEm();
        $em->persist($indicator);
        $em->flush();

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("procedure/{id}/details/{indicatorId}/edit-indicator", name="edit_indicator")
     */
    public function editIndicatorAction(Request $request)
    {
        $indicatorId = $request->get('indicatorId');
        /** @var MedicalIndicator $indicator */
        $indicator = $this->getMedicalIndicatorRepository()->find($indicatorId);

        $indicatorDetails = $request->get('indicator');

        $indicator
            ->setIndicator($this->getIndicatorRepository()->find($indicatorDetails['indicator']))
            ->setValue($indicatorDetails['value'])
        ;

        $em = $this->getEm();
        $em->persist($indicator);
        $em->flush();

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("procedure/{id}/details/{indicatorId}/remove-indicator", name="remove_indicator")
     */
    public function removeIndicatorAction(Request $request)
    {
        $indicatorId = $request->get('indicatorId');

        /** @var MedicalIndicator $indicator */
        $indicator = $this->getMedicalIndicatorRepository()->find($indicatorId);

        $em = $this->getEm();
        $em->remove($indicator);
        $em->flush();

        return $this->redirect($request->headers->get('referer'));
    }
}