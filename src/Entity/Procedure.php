<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="procedures")
 * @ORM\Entity(repositoryClass="App\Repository\ProcedureRepository")
 */
class Procedure
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient")
     * @ORM\JoinColumn(name="patient", referencedColumnName="id")
     */
    private $patient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_at", type="datetime")
     */
    private $startAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_at", type="datetime")
     */
    private $endAt;
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Patient $patient
     * @return $this
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * Get operator
     *
     * @return Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @return \DateTime
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * @param \DateTime $startAt
     * @return Procedure
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * @param \DateTime $endAt
     * @return Procedure
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Procedure
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }
}