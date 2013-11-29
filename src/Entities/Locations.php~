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


}
