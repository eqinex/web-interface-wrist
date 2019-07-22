<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="patients")
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
{
    const GENDER_FEMALE = 'f';
    const GENDER_MALE = 'm';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=255)
     */
    private $age;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime")
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=2)
     */
    private $gender = self::GENDER_MALE;

    /**
     * @var string
     *
     * @ORM\Column(name="diagnosis", type="string", length=255)
     */
    private $diagnosis;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=64)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="number_oms", type="string", length=255)
     */
    private $numberOms;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Patient
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param string $age
     * @return Patient
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param \DateTime $dateOfBirth
     * @return Patient
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return Patient
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return string
     */
    public function getDiagnosis()
    {
        return $this->diagnosis;
    }

    /**
     * @param string $diagnosis
     * @return Patient
     */
    public function setDiagnosis($diagnosis)
    {
        $this->diagnosis = $diagnosis;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Patient
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Patient
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumberOms()
    {
        return $this->numberOms;
    }

    /**
     * @param string $numberOms
     * @return Patient
     */
    public function setNumberOms($numberOms)
    {
        $this->numberOms = $numberOms;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
