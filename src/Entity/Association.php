<?php

namespace App\Entity;

use App\Repository\AssociationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssociationRepository::class)
 */
class Association
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable="true")
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable="true")
     */
    private $information;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     */
    private $longitude;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="associations")
     */
    private $pictures;

    /**
     * @ORM\ManyToMany(targetEntity=Audience::class, mappedBy="associations")
     */
    private $audiences;

    /**
     * @ORM\ManyToMany(targetEntity=Thematic::class, mappedBy="associations")
     */
    private $thematics;

    /**
     * @ORM\ManyToMany(targetEntity=Activity::class, mappedBy="associations")
     */
    private $activities;

    /**
     * @ORM\ManyToMany(targetEntity=Accessibility::class, mappedBy="associations")
     */
    private $accessibilities;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="found")
     * @ORM\JoinColumn(nullable=true)
     */
    private $founder;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="bookmark")
     */
    private $favorite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->audiences = new ArrayCollection();
        $this->thematics = new ArrayCollection();
        $this->activities = new ArrayCollection();
        $this->accessibilities = new ArrayCollection();
        $this->favorite = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function setInformation(string $information): self
    {
        $this->information = $information;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setAssociations($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getAssociations() === $this) {
                $picture->setAssociations(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Audience[]
     */
    public function getAudiences(): Collection
    {
        return $this->audiences;
    }

    public function addAudience(Audience $audience): self
    {
        if (!$this->audiences->contains($audience)) {
            $this->audiences[] = $audience;
            $audience->addAssociation($this);
        }

        return $this;
    }

    public function removeAudience(Audience $audience): self
    {
        if ($this->audiences->removeElement($audience)) {
            $audience->removeAssociation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Thematic[]
     */
    public function getThematics(): Collection
    {
        return $this->thematics;
    }

    public function addThematic(Thematic $thematic): self
    {
        if (!$this->thematics->contains($thematic)) {
            $this->thematics[] = $thematic;
            $thematic->addAssociation($this);
        }

        return $this;
    }

    public function removeThematic(Thematic $thematic): self
    {
        if ($this->thematics->removeElement($thematic)) {
            $thematic->removeAssociation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Activity[]
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activity $activity): self
    {
        if (!$this->activities->contains($activity)) {
            $this->activities[] = $activity;
            $activity->addAssociation($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): self
    {
        if ($this->activities->removeElement($activity)) {
            $activity->removeAssociation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Accessibility[]
     */
    public function getAccessibilities(): Collection
    {
        return $this->accessibilities;
    }

    public function addAccessibility(Accessibility $accessibility): self
    {
        if (!$this->accessibilities->contains($accessibility)) {
            $this->accessibilities[] = $accessibility;
            $accessibility->addAssociation($this);
        }

        return $this;
    }

    public function removeAccessibility(Accessibility $accessibility): self
    {
        if ($this->accessibilities->removeElement($accessibility)) {
            $accessibility->removeAssociation($this);
        }

        return $this;
    }

    public function getFounder(): ?User
    {
        return $this->founder;
    }

    public function setFounder(?User $founder): self
    {
        $this->founder = $founder;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getFavorite(): Collection
    {
        return $this->favorite;
    }

    public function addFavorite(User $favorite): self
    {
        if (!$this->favorite->contains($favorite)) {
            $this->favorite[] = $favorite;
            $favorite->addBookmark($this);
        }

        return $this;
    }

    public function removeFavorite(User $favorite): self
    {
        if ($this->favorite->removeElement($favorite)) {
            $favorite->removeBookmark($this);
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
