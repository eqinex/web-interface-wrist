<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MedicalIndicator
 *
 * @ORM\Table(name="medical_indicators")
 * @ORM\Entity(repositoryClass="App\Repository\MedicalIndicatorRepository")
 */
class MedicalIndicator
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Procedure")
     * @ORM\JoinColumn(name="procedure_column", referencedColumnName="id", nullable=true)
     */
    private $procedure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Indicator")
     * @ORM\JoinColumn(name="indicator", referencedColumnName="id", nullable=true)
     */
    private $indicator;

    /**
     * @var string
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getProcedure()
    {
        return $this->procedure;
    }

    /**
     * @param mixed $procedure
     * @return MedicalIndicator
     */
    public function setProcedure($procedure)
    {
        $this->procedure = $procedure;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndicator()
    {
        return $this->indicator;
    }

    /**
     * @param mixed $indicator
     * @return MedicalIndicator
     */
    public function setIndicator($indicator)
    {
        $this->indicator = $indicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return MedicalIndicator
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}