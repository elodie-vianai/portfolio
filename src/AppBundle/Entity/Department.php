<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table(name="department")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DepartmentRepository")
 */
class Department
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
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255, unique=true)
     */
    private $department;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Training", mappedBy="training", cascade={"persist"})
     *
     */
    private $trainings;


    function __construct()
    {
        $this->trainings    = new ArrayCollection();
    }


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
     * Set code
     *
     * @param string $code
     *
     * @return Department
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set department
     *
     * @param string $department
     *
     * @return Department
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Link a training to a department
     *
     * @param \AppBundle\Entity\Training $training
     *
     * @return Department
     */
    public function addTraining(Training $training)
    {
        $this->trainings[] = $training;

        // Link the advert to the application
        $training->setDepartment($this);

        return $this;
    }

    /**
     * Remove Training
     *
     * @param \AppBundle\Entity\Training $training
     */
    public function removeTraining(Training $training)
    {
        $this->trainings->removeElement($training);
    }

    /**
     * Get trainings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrainings()
    {
        return $this->trainings;
    }
}

