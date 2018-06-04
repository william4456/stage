<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MoleculeRepository")
 */
class Molecule
{
    /**
     * @ORM\Id( )
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $scientificName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @Assert\Valid
     * @Assert\NotBlank(message="Please, choose a molecule as an obj file.")
     * @ORM\OneToOne(targetEntity="MoleculeFile", cascade="persist")
     * @ORM\JoinColumn(name="MoleculeFile_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $file;


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getScientificName()
    {
        return $this->scientificName;
    }

    public function setScientificName(string $scientificName): self
    {
        $this->scientificName = $scientificName;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get file
     *
     * @return MoleculeFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set file
     *
     * @param MoleculeFile $file
     *
     * @return Molecule
     */
    public function setFile(MoleculeFile $file = null)
    {
        $this->file = $file;

        return $this;
    }
}
