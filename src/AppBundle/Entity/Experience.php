<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Experience
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExperienceRepository")
 * @Vich\Uploadable
 */
class Experience
{
    /**
     * Experience unique identifiant
     *
     * @var int
     * @Assert\Type("integer")
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Name of the experience
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Type of the contract of the experience
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="contract", type="string", length=255)
     */
    private $contract;

    /**
     * Name of the company
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;

    /**
     * City where is the company
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * Date of the beginning of the contract
     *
     * @var Date
     * @Assert\Type("datetime")
     *
     * @ORM\Column(name="begin_at", type="date")
     */
    private $beginAt;

    /**
     * Date of the end of the contract
     *
     * @var Date
     * @Assert\Type("datetime")
     *
     * @ORM\Column(name="end_at", type="date", nullable=true)
     */
    private $endAt;

    /**
     * @Assert\Type("object")
     *
     * @Vich\UploadableField(mapping="logo_company", fileNameProperty="image")
     *
     * @var File $imageFile
     * @Assert\Image(groups="experience")
     */
    private $imageFile;

    /**
     * Name of the image file for the company
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * @Assert\Image(groups="experience")
     */
    private $image;

    /**
     * Department of the city of the company
     *
     * @Assert\Type("object")
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Department")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    /**
     * Projects created/updated during the experience
     *
     * @Assert\Type("object")
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project", mappedBy="experience", cascade={"persist"})
     *
     */
    private $projects;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projects = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Experience
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set contract
     *
     * @param string $contract
     *
     * @return Experience
     */
    public function setContract($contract)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get contract
     *
     * @return string
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Experience
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Experience
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set beginAt
     *
     * @param Date $beginAt
     *
     * @return Experience
     */
    public function setBeginAt($beginAt)
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    /**
     * Get beginAt
     *
     * @return Date
     */
    public function getBeginAt()
    {
        return $this->beginAt;
    }

    /**
     * Set endAt
     *
     * @param Date $endAt
     *
     * @return Experience
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return Date
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set Image
     *
     * @param string|null $image
     *
     * @return Experience
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File|null $image
     *
     * @return Experience
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment(Department $department)
    {
        $this->department = $department;
    }

    /**
     * Link a project to an experience
     *
     * @param \AppBundle\Entity\Project $project
     *
     * @return Experience
     */
    public function addProject(Project $project)
    {
        $this->projects[] = $project;

        return $this;
    }

    /**
     * Remove a project
     *
     * @param \AppBundle\Entity\Project $project
     */
    public function removeProject(Project $project)
    {
        $this->projects->removeElement($project);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjects()
    {
        return $this->projects;
    }
}
