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

}
