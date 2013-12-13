<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Countries
 *
 * @ORM\Table(name="countries")
 * @ORM\Entity
 */
class Countries {

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
     * @ORM\Column(name="countryName", type="string", length=200, nullable=false)
     */
    private $countryname;

    /**
     * @var string
     *
     * @ORM\Column(name="countryIsoA2", type="string", length=2, nullable=false)
     */
    private $countryisoa2;

    /**
     * @var string
     *
     * @ORM\Column(name="countryIsoA3", type="string", length=3, nullable=false)
     */
    private $countryisoa3;

    /**
     * @var string
     *
     * @ORM\Column(name="countryIsoNumber", type="string", length=4, nullable=false)
     */
    private $countryisonumber;

    /**
     * @var string
     *
     * @ORM\Column(name="countryAvailable", type="string", nullable=false)
     */
    private $countryavailable;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set countryname
     *
     * @param string $countryname
     * @return Countries
     */
    public function setCountryname($countryname) {
        $this->countryname = $countryname;

        return $this;
    }

    /**
     * Get countryname
     *
     * @return string 
     */
    public function getCountryname() {
        return $this->countryname;
    }

    /**
     * Set countryisoa2
     *
     * @param string $countryisoa2
     * @return Countries
     */
    public function setCountryisoa2($countryisoa2) {
        $this->countryisoa2 = $countryisoa2;

        return $this;
    }

    /**
     * Get countryisoa2
     *
     * @return string 
     */
    public function getCountryisoa2() {
        return $this->countryisoa2;
    }

    /**
     * Set countryisoa3
     *
     * @param string $countryisoa3
     * @return Countries
     */
    public function setCountryisoa3($countryisoa3) {
        $this->countryisoa3 = $countryisoa3;

        return $this;
    }

    /**
     * Get countryisoa3
     *
     * @return string 
     */
    public function getCountryisoa3() {
        return $this->countryisoa3;
    }

    /**
     * Set countryisonumber
     *
     * @param string $countryisonumber
     * @return Countries
     */
    public function setCountryisonumber($countryisonumber) {
        $this->countryisonumber = $countryisonumber;

        return $this;
    }

    /**
     * Get countryisonumber
     *
     * @return string 
     */
    public function getCountryisonumber() {
        return $this->countryisonumber;
    }

    /**
     * Set countryavailable
     *
     * @param string $countryavailable
     * @return Countries
     */
    public function setCountryavailable($countryavailable) {
        $this->countryavailable = $countryavailable;

        return $this;
    }

    /**
     * Get countryavailable
     *
     * @return string 
     */
    public function getCountryavailable() {
        return $this->countryavailable;
    }

    public function __toString() {
        return $this->getCountryname();
    }

}
