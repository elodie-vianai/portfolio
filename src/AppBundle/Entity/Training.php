<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Date;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Training
 *
 * @ORM\Table(name="training")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrainingRepository")
 * @Vich\Uploadable
 */
class Training
{
    /**
     * Training unique identifiant
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
     * Name of the training
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Type of the training (diploma, training...)
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * Name of the institution where the training was followed
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="institution", type="string", length=255)
     */
    private $institution;

    /**
     * City where the institution is
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * Date of the beginning of the training
     *
     * @var Date
     * @Assert\Type("datetime")
     *
     * @ORM\Column(name="begin_at", type="date")
     */
    private $beginAt;

    /**
     * Date of the end of the training
     *
     * @var Date
     * @Assert\Type("datetime")
     *
     * @ORM\Column(name="end_at", type="date", nullable=true)
     */
    private $endAt;

    /**
     * Mention of the diploma
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="mention", type="string", length=2)
     */
    private $mention;

    /**
     * Department where the institution is
     *
     * @Assert\Type("object")
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Department")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    /**
     * @Assert\Type("object")
     *
     * @Vich\UploadableField(mapping="logo_institution", fileNameProperty="image")
     *
     * @var File $imageFile
     * @Assert\Image(groups="training")
     */
    private $imageFile;

    /**
     * Name of the image file
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Assert\Image(groups="training")
     */
    private $image;


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
     * @return Training
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
     * Set type
     *
     * @param string $type
     *
     * @return Training
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set institution
     *
     * @param string $institution
     *
     * @return Training
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;

        return $this;
    }

    /**
     * Get institution
     *
     * @return string
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Training
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
     * @return Training
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
     * @return Training
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
     * Set mention
     *
     * @param string $mention
     *
     * @return Training
     */
    public function setMention($mention)
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * Get mention
     *
     * @return string
     */
    public function getMention()
    {
        return $this->mention;
    }

    /**
     * Get department
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Get department
     *
     * @param mixed $department
     */
    public function setDepartment(Department $department)
    {
        $this->department = $department;
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
     * @return Training
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File|null $image
     *
     * @return Training
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

}
