<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 * @Vich\Uploadable
 */
class Project
{
    /**
     * Project unique identifiant
     *
     * @Assert\Type("integer")
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Name of the project
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Description of the project
     *
     * @var string
     * @Assert\Type("text")
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * Year of the end of the project
     *
     * @var int
     * @Assert\Type("integer")
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @Assert\Type("object")
     *
     * @Vich\UploadableField(mapping="image_project", fileNameProperty="image")
     *
     * @var File $imageFile
     * @Assert\Image(groups="project")
     */
    private $imageFile;

    /**
     * Name of the image file
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Assert\Image(groups="project")
     */
    private $image;

    /**
     * Experience related to the project
     *
     * @Assert\Type("object")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Experience", inversedBy="projects")
     * @ORM\JoinColumn(nullable=true)
     */
    private $experience;

    /**
     * Skills used to make the project
     *
     * @Assert\Type("object")
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Skill", cascade={"persist"})
     */
    private $skills;

    /**
     * Project constructor.
     */
    public function __construct()
    {
        $this->skills = new ArrayCollection();
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
     * @return Project
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
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * @return Project
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File|null $image
     *
     * @return Project
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
     * Set year
     *
     * @param integer $year
     *
     * @return Project
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience(Experience $experience)
    {
        $experience->addProject($this);

        $this->experience = $experience;
    }

    /**
     * @param Skill $sill
     */
    public function addSkill(Skill $sill)
    {
        $this->skills[] = $sill;
    }

    /**
     * @param Skill $skill
     */
    public function removeSkill(Skill $skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }
}
