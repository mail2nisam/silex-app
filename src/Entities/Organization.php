<?php

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
     * @param  string       $orgName
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
     * @param  string       $orgDescription
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
     * @param  \DateTime    $orgCreatedAt
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
     * @param  \DateTime    $orgUpdatedOn
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
}
