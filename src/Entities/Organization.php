<?php
namespace Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * Organization
 *
 * @ORM\Table(name="organization", indexes={@ORM\Index(name="org_description", columns={"org_description"})})
 * @ORM\Entity
 */
class Organization
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="org_name", type="string", length=250, nullable=false)
     */
    private $orgName;

    /**
     * @var string
     *
     * @ORM\Column(name="org_description", type="text", nullable=false)
     */
    private $orgDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="org_created_at", type="datetime", nullable=false)
     */
    private $orgCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="org_updated_on", type="datetime", nullable=false)
     */
    private $orgUpdatedOn;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=500, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=100, nullable=false)
     */
    private $zipCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="country", type="integer", nullable=false)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="office_phone", type="string", length=100, nullable=false)
     */
    private $officePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="office_fax", type="string", length=100, nullable=false)
     */
    private $officeFax;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_phone", type="string", length=100, nullable=false)
     */
    private $mobilePhone;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set orgName
     *
     * @param string $orgName
     * @return Organization
     */
    public function setOrgName($orgName)
    {
        $this->orgName = $orgName;

        return $this;
    }

    /**
     * Get orgName
     *
     * @return string 
     */
    public function getOrgName()
    {
        return $this->orgName;
    }

    /**
     * Set orgDescription
     *
     * @param string $orgDescription
     * @return Organization
     */
    public function setOrgDescription($orgDescription)
    {
        $this->orgDescription = $orgDescription;

        return $this;
    }

    /**
     * Get orgDescription
     *
     * @return string 
     */
    public function getOrgDescription()
    {
        return $this->orgDescription;
    }

    /**
     * Set orgCreatedAt
     *
     * @param \DateTime $orgCreatedAt
     * @return Organization
     */
    public function setOrgCreatedAt($orgCreatedAt)
    {
        $this->orgCreatedAt = $orgCreatedAt;

        return $this;
    }

    /**
     * Get orgCreatedAt
     *
     * @return \DateTime 
     */
    public function getOrgCreatedAt()
    {
        return $this->orgCreatedAt;
    }

    /**
     * Set orgUpdatedOn
     *
     * @param \DateTime $orgUpdatedOn
     * @return Organization
     */
    public function setOrgUpdatedOn($orgUpdatedOn)
    {
        $this->orgUpdatedOn = $orgUpdatedOn;

        return $this;
    }

    /**
     * Get orgUpdatedOn
     *
     * @return \DateTime 
     */
    public function getOrgUpdatedOn()
    {
        return $this->orgUpdatedOn;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Organization
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Organization
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set country
     *
     * @param integer $country
     * @return Organization
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return integer 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return Organization
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set officePhone
     *
     * @param string $officePhone
     * @return Organization
     */
    public function setOfficePhone($officePhone)
    {
        $this->officePhone = $officePhone;

        return $this;
    }

    /**
     * Get officePhone
     *
     * @return string 
     */
    public function getOfficePhone()
    {
        return $this->officePhone;
    }

    /**
     * Set officeFax
     *
     * @param string $officeFax
     * @return Organization
     */
    public function setOfficeFax($officeFax)
    {
        $this->officeFax = $officeFax;

        return $this;
    }

    /**
     * Get officeFax
     *
     * @return string 
     */
    public function getOfficeFax()
    {
        return $this->officeFax;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     * @return Organization
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string 
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }
}
