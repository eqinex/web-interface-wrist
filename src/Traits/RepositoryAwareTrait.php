<?php

namespace App\Traits;

use App\Entity\Configuration;
use App\Entity\Indicator;
use App\Entity\MedicalIndicator;
use App\Entity\Patient;
use App\Entity\Procedure;
use App\Repository\ConfigurationRepository;
use App\Repository\IndicatorRepository;
use App\Repository\MedicalIndicatorRepository;
use App\Repository\PatientRepository;
use App\Repository\ProcedureRepository;

trait RepositoryAwareTrait
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm()
    {
        return $this->getDoctrine()->getManager();
    }

    /**
     * @return PatientRepository
     */
    protected function getPatientRepository()
    {
        return $this->getDoctrine()->getRepository(Patient::class);
    }

    /**
     * @return ProcedureRepository
     */
    protected function getProcedureRepository()
    {
        return $this->getDoctrine()->getRepository(Procedure::class);
    }

    /**
     * @return MedicalIndicatorRepository
     */
    protected function getMedicalIndicatorRepository()
    {
        return $this->getDoctrine()->getRepository(MedicalIndicator::class);
    }

    /**
     * @return IndicatorRepository
     */
    protected function getIndicatorRepository()
    {
        return $this->getDoctrine()->getRepository(Indicator::class);
    }

    /**
     * @return ConfigurationRepository
     */
    protected function getConfigurationRepository()
    {
        return $this->getDoctrine()->getRepository(Configuration::class);
    }
}