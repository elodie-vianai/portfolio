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


//    /**
//     * Link an experience to a department
//     *
//     * @param \AppBundle\Entity\Experience $experience
//     *
//     * @return Department
//     */
//    public function addExperience(Experience $experience)
//    {
//        $this->experiences[] = $experience;
//
//        return $this;
//    }
//
//    /**
//     * Remove an experience
//     *
//     * @param \AppBundle\Entity\Experience $experience
//     */
//    public function removeExperience(Experience $experience)
//    {
//        $this->experiences->removeElement($experience);
//    }
//
//    /**
//     * Get experiences
//     *
//     * @return \Doctrine\Common\Collections\Collection
//     */
//    public function getExperiences()
//    {
//        return $this->experiences;
//    }
}
