<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * States
 *
 * @ORM\Table(name="states", indexes={@ORM\Index(name="FK_states_1", columns={"countryID"})})
 * @ORM\Entity
 */
class States
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
     * @ORM\Column(name="countryID", type="integer", nullable=true)
     */
    private $countryid;

    /**
     * @var string
     *
     * @ORM\Column(name="stateName", type="string", length=100, nullable=false)
     */
    private $statename;

    /**
     * @var string
     *
     * @ORM\Column(name="stateStatus", type="string", nullable=false)
     */
    private $statestatus;

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
     * Set countryid
     *
     * @param  integer $countryid
     * @return States
     */
    public function setCountryid($countryid)
    {
        $this->countryid = $countryid;

        return $this;
    }

    /**
     * Get countryid
     *
     * @return integer
     */
    public function getCountryid()
    {
        return $this->countryid;
    }

    /**
     * Set statename
     *
     * @param  string $statename
     * @return States
     */
    public function setStatename($statename)
    {
        $this->statename = $statename;

        return $this;
    }

    /**
     * Get statename
     *
     * @return string
     */
    public function getStatename()
    {
        return $this->statename;
    }

    /**
     * Set statestatus
     *
     * @param  string $statestatus
     * @return States
     */
    public function setStatestatus($statestatus)
    {
        $this->statestatus = $statestatus;

        return $this;
    }

    /**
     * Get statestatus
     *
     * @return string
     */
    public function getStatestatus()
    {
        return $this->statestatus;
    }
}
