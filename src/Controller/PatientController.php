<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Traits\RepositoryAwareTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PatientController extends AbstractController
{
    use RepositoryAwareTrait;

    const PER_PAGE = 20;

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $filters = $request->get('filters', []);
        $currentPage = $request->get('page', 1);

        $patients = $this->getPatientRepository()->getAvailablePatients($filters, $currentPage, self::PER_PAGE);
        $patientFilter = $this->getPatientRepository()->findAll();

        $maxRows = $patients->count();
        $maxPages = ceil($maxRows / self::PER_PAGE);

        return $this->render('patients/list.html.twig', [
            'patients' => $patients,
            'patientFilter' => $patientFilter,
            'startYear' => $startYear = new \DateTime('01.01.1930'),
            'filters' => $filters,
            'currentPage' => $currentPage,
            'maxPages' => $maxPages,
            'maxRows' => $maxRows
        ]);
    }

    /**
     * @Route("/patients/add", name="add_patient")
     */
    public function addOperatorAction(Request $request)
    {
        $patientDetails = $request->get('patient');

        $patient = new Patient();
        $patient
            ->setName($patientDetails['name'])
            ->setAge($patientDetails['age'])
            ->setDateOfBirth(new \DateTime($patientDetails['dateOfBirth']))
            ->setGender($patientDetails['gender'])
            ->setDiagnosis($patientDetails['diagnosis'])
            ->setPhone($patientDetails['phone'])
            ->setAddress($patientDetails['address'])
            ->setNumberOms($patientDetails['numberOms'])
        ;

        $em = $this->getEm();
        $em->persist($patient);
        $em->flush();

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("/patients/edit", name="edit_patient")
     */
    public function editOperatorAction(Request $request)
    {
        $patientId = $request->get('id');
        $patientDetails = $request->get('patient');
        $patient = $this->getPatientRepository()->find($patientId);

        $patient
            ->setName($patientDetails['name'])
            ->setAge($patientDetails['age'])
            ->setDateOfBirth(new \DateTime($patientDetails['dateOfBirth']))
            ->setGender($patientDetails['gender'])
            ->setDiagnosis($patientDetails['diagnosis'])
            ->setPhone($patientDetails['phone'])
            ->setAddress($patientDetails['address'])
            ->setNumberOms($patientDetails['numberOms'])
        ;

        $em = $this->getEm();
        $em->persist($patient);
        $em->flush();

        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("/patients/{id}/details", name="patients_details")
     */
    public function detailsAction(Request $request)
    {
        $patientId = $request->get('id');
        $patient = $this->getPatientRepository()->find($patientId);
        $procedureId = $request->get('procedure');

        $procedureId ? $procedure = $this->getProcedureRepository()->find($procedureId) : $procedure = null;

        $procedures = $this->getProcedureRepository()->findBy([
            'patient' => $patient
        ]);

        $indicatorNames =$this->getIndicatorRepository()->findAll();

        $indicators = $this->getMedicalIndicatorRepository()->findBy([
            'procedure' => $procedureId
        ]);

        return $this->render('patients/details.html.twig', [
            'patient' => $patient,
            'procedures' => $procedures,
            'indicators' => $indicators,
            'indicatorNames' => $indicatorNames,
            'procedure' => $procedure
        ]);
    }
}