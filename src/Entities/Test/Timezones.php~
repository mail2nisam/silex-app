<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Timezones
 *
 * @ORM\Table(name="timezones")
 * @ORM\Entity
 */
class Timezones
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
     * @ORM\Column(name="timeZoneName", type="string", length=200, nullable=false)
     */
    private $timezonename;

    /**
     * @var string
     *
     * @ORM\Column(name="timeZoneDetail", type="string", length=200, nullable=false)
     */
    private $timezonedetail;

    /**
     * @var string
     *
     * @ORM\Column(name="timeZoneAbbreviation", type="string", length=10, nullable=false)
     */
    private $timezoneabbreviation;

    /**
     * @var string
     *
     * @ORM\Column(name="timeZoneDiff", type="string", length=10, nullable=true)
     */
    private $timezonediff;

    /**
     * @var string
     *
     * @ORM\Column(name="timeZoneDiffDST", type="string", length=10, nullable=true)
     */
    private $timezonediffdst;

    /**
     * @var string
     *
     * @ORM\Column(name="timeZoneDiffDefault", type="string", length=10, nullable=true)
     */
    private $timezonediffdefault;

    /**
     * @var integer
     *
     * @ORM\Column(name="countryID", type="integer", nullable=true)
     */
    private $countryid;

    /**
     * @var string
     *
     * @ORM\Column(name="daylightSavingsDiff", type="string", length=10, nullable=false)
     */
    private $daylightsavingsdiff;

    /**
     * @var string
     *
     * @ORM\Column(name="dstStartDate", type="string", length=255, nullable=true)
     */
    private $dststartdate;

    /**
     * @var string
     *
     * @ORM\Column(name="dstEndDate", type="string", length=255, nullable=true)
     */
    private $dstenddate;


}
