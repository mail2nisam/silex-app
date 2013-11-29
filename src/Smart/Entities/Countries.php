<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Countries
 *
 * @ORM\Table(name="countries")
 * @ORM\Entity
 */
class Countries
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


}
