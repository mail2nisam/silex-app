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

}
