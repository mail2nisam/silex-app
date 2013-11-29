<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Locations
 *
 * @ORM\Table(name="locations")
 * @ORM\Entity
 */
class Locations
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
     * @var integer
     *
     * @ORM\Column(name="org_id", type="integer", nullable=false)
     */
    private $orgId;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_name", type="string", length=250, nullable=false)
     */
    private $locName;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_address", type="string", length=250, nullable=false)
     */
    private $locAddress;

    /**
     * @var integer
     *
     * @ORM\Column(name="loc_country", type="integer", nullable=false)
     */
    private $locCountry;

    /**
     * @var integer
     *
     * @ORM\Column(name="loc_state", type="integer", nullable=false)
     */
    private $locState;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_city", type="string", length=200, nullable=false)
     */
    private $locCity;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_zip", type="string", length=50, nullable=false)
     */
    private $locZip;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_latitude", type="string", length=100, nullable=false)
     */
    private $locLatitude;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_longitude", type="string", length=100, nullable=false)
     */
    private $locLongitude;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_access_key", type="string", length=250, nullable=false)
     */
    private $locAccessKey;

    /**
     * @var string
     *
     * @ORM\Column(name="loc_secret", type="string", length=250, nullable=false)
     */
    private $locSecret;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_zone", type="integer", nullable=false)
     */
    private $timeZone;

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
     * Set orgId
     *
     * @param  integer   $orgId
     * @return Locations
     */
    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;

        return $this;
    }

    /**
     * Get orgId
     *
     * @return integer
     */
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * Set locName
     *
     * @param  string    $locName
     * @return Locations
     */
    public function setLocName($locName)
    {
        $this->locName = $locName;

        return $this;
    }

    /**
     * Get locName
     *
     * @return string
     */
    public function getLocName()
    {
        return $this->locName;
    }

    /**
     * Set locAddress
     *
     * @param  string    $locAddress
     * @return Locations
     */
    public function setLocAddress($locAddress)
    {
        $this->locAddress = $locAddress;

        return $this;
    }

    /**
     * Get locAddress
     *
     * @return string
     */
    public function getLocAddress()
    {
        return $this->locAddress;
    }

    /**
     * Set locCountry
     *
     * @param  integer   $locCountry
     * @return Locations
     */
    public function setLocCountry($locCountry)
    {
        $this->locCountry = $locCountry;

        return $this;
    }

    /**
     * Get locCountry
     *
     * @return integer
     */
    public function getLocCountry()
    {
        return $this->locCountry;
    }

    /**
     * Set locState
     *
     * @param  integer   $locState
     * @return Locations
     */
    public function setLocState($locState)
    {
        $this->locState = $locState;

        return $this;
    }

    /**
     * Get locState
     *
     * @return integer
     */
    public function getLocState()
    {
        return $this->locState;
    }

    /**
     * Set locCity
     *
     * @param  string    $locCity
     * @return Locations
     */
    public function setLocCity($locCity)
    {
        $this->locCity = $locCity;

        return $this;
    }

    /**
     * Get locCity
     *
     * @return string
     */
    public function getLocCity()
    {
        return $this->locCity;
    }

    /**
     * Set locZip
     *
     * @param  string    $locZip
     * @return Locations
     */
    public function setLocZip($locZip)
    {
        $this->locZip = $locZip;

        return $this;
    }

    /**
     * Get locZip
     *
     * @return string
     */
    public function getLocZip()
    {
        return $this->locZip;
    }

    /**
     * Set locLatitude
     *
     * @param  string    $locLatitude
     * @return Locations
     */
    public function setLocLatitude($locLatitude)
    {
        $this->locLatitude = $locLatitude;

        return $this;
    }

    /**
     * Get locLatitude
     *
     * @return string
     */
    public function getLocLatitude()
    {
        return $this->locLatitude;
    }

    /**
     * Set locLongitude
     *
     * @param  string    $locLongitude
     * @return Locations
     */
    public function setLocLongitude($locLongitude)
    {
        $this->locLongitude = $locLongitude;

        return $this;
    }

    /**
     * Get locLongitude
     *
     * @return string
     */
    public function getLocLongitude()
    {
        return $this->locLongitude;
    }

    /**
     * Set locAccessKey
     *
     * @param  string    $locAccessKey
     * @return Locations
     */
    public function setLocAccessKey($locAccessKey)
    {
        $this->locAccessKey = $locAccessKey;

        return $this;
    }

    /**
     * Get locAccessKey
     *
     * @return string
     */
    public function getLocAccessKey()
    {
        return $this->locAccessKey;
    }

    /**
     * Set locSecret
     *
     * @param  string    $locSecret
     * @return Locations
     */
    public function setLocSecret($locSecret)
    {
        $this->locSecret = $locSecret;

        return $this;
    }

    /**
     * Get locSecret
     *
     * @return string
     */
    public function getLocSecret()
    {
        return $this->locSecret;
    }

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Locations
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param  \DateTime $updatedAt
     * @return Locations
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set timeZone
     *
     * @param  integer   $timeZone
     * @return Locations
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * Get timeZone
     *
     * @return integer
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }
}
