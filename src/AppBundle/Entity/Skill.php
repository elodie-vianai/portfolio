<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Skill
 *
 * @ORM\Table(name="skill")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SkillRepository")
 * @Vich\Uploadable
 */
class Skill
{
    /**
     * Skill unique identifiant
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
     * Name of the skill
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @Assert\Type("object")
     *
     * @Vich\UploadableField(mapping="logo_skill", fileNameProperty="image")
     *
     * @var File $imageFile
     * @Assert\Image(groups="skill")
     */
    private $imageFile;

    /**
     * Name of the image file
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * @Assert\Image(groups="skill")
     */
    private $image;

    /**
     * Level of the skill (from 1 for debutant to 5 to expert)
     *
     * @var int
     * @Assert\Type("integer")
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * Category of the skill
     *
     * @var string
     * @Assert\Type("string")
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;


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
     * @return Skill
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
     * Set level
     *
     * @param integer $level
     *
     * @return Skill
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Skill
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
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
     * @return Skill
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File|null $image
     *
     * @return \AppBundle\Entity\Skill
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
