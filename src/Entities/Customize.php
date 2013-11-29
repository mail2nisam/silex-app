<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Customize
 *
 * @ORM\Table(name="customize")
 * @ORM\Entity
 */
class Customize
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=355, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=355, nullable=false)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="navbar_color", type="string", length=355, nullable=false)
     */
    private $navbarColor;

    /**
     * @var string
     *
     * @ORM\Column(name="primary_color", type="string", length=355, nullable=false)
     */
    private $primaryColor;

    /**
     * @var string
     *
     * @ORM\Column(name="button_color", type="string", length=355, nullable=false)
     */
    private $buttonColor;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_ext", type="string", length=355, nullable=false)
     */
    private $logoExt;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFormat", type="string", length=250, nullable=false)
     */
    private $dateformat;

    /**
     * @var string
     *
     * @ORM\Column(name="dateFormat2", type="string", length=250, nullable=false)
     */
    private $dateformat2;

    /**
     * Get id
     *
     * @return boolean
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param  string    $name
     * @return Customize
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
     * Set descrip
     *
     * @param  string    $descrip
     * @return Customize
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get descrip
     *
     * @return string
     */
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Set navbarColor
     *
     * @param  string    $navbarColor
     * @return Customize
     */
    public function setNavbarColor($navbarColor)
    {
        $this->navbarColor = $navbarColor;

        return $this;
    }

    /**
     * Get navbarColor
     *
     * @return string
     */
    public function getNavbarColor()
    {
        return $this->navbarColor;
    }

    /**
     * Set primaryColor
     *
     * @param  string    $primaryColor
     * @return Customize
     */
    public function setPrimaryColor($primaryColor)
    {
        $this->primaryColor = $primaryColor;

        return $this;
    }

    /**
     * Get primaryColor
     *
     * @return string
     */
    public function getPrimaryColor()
    {
        return $this->primaryColor;
    }

    /**
     * Set buttonColor
     *
     * @param  string    $buttonColor
     * @return Customize
     */
    public function setButtonColor($buttonColor)
    {
        $this->buttonColor = $buttonColor;

        return $this;
    }

    /**
     * Get buttonColor
     *
     * @return string
     */
    public function getButtonColor()
    {
        return $this->buttonColor;
    }

    /**
     * Set logoExt
     *
     * @param  string    $logoExt
     * @return Customize
     */
    public function setLogoExt($logoExt)
    {
        $this->logoExt = $logoExt;

        return $this;
    }

    /**
     * Get logoExt
     *
     * @return string
     */
    public function getLogoExt()
    {
        return $this->logoExt;
    }

    /**
     * Set dateformat
     *
     * @param  string    $dateformat
     * @return Customize
     */
    public function setDateformat($dateformat)
    {
        $this->dateformat = $dateformat;

        return $this;
    }

    /**
     * Get dateformat
     *
     * @return string
     */
    public function getDateformat()
    {
        return $this->dateformat;
    }

    /**
     * Set dateformat2
     *
     * @param  string    $dateformat2
     * @return Customize
     */
    public function setDateformat2($dateformat2)
    {
        $this->dateformat2 = $dateformat2;

        return $this;
    }

    /**
     * Get dateformat2
     *
     * @return string
     */
    public function getDateformat2()
    {
        return $this->dateformat2;
    }
}
