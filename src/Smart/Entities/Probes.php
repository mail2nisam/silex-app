<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Probes
 *
 * @ORM\Table(name="probes")
 * @ORM\Entity
 */
class Probes
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
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var float
     *
     * @ORM\Column(name="alertHighLimit", type="float", precision=10, scale=0, nullable=false)
     */
    private $alerthighlimit;

    /**
     * @var float
     *
     * @ORM\Column(name="alertLowLimit", type="float", precision=10, scale=0, nullable=false)
     */
    private $alertlowlimit;

    /**
     * @var integer
     *
     * @ORM\Column(name="siteNo", type="integer", nullable=false)
     */
    private $siteno;

    /**
     * @var string
     *
     * @ORM\Column(name="colling_device", type="string", length=300, nullable=false)
     */
    private $collingDevice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastCalibrationDateTime", type="datetime", nullable=false)
     */
    private $lastcalibrationdatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="nextCalibrationDue", type="date", nullable=false)
     */
    private $nextcalibrationdue;

    /**
     * @var string
     *
     * @ORM\Column(name="serialNumber", type="string", length=200, nullable=false)
     */
    private $serialnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="probeType", type="string", length=300, nullable=false)
     */
    private $probetype;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registeredDate", type="date", nullable=false)
     */
    private $registereddate;

    /**
     * @var string
     *
     * @ORM\Column(name="samplePeriodUnits", type="string", length=300, nullable=false)
     */
    private $sampleperiodunits;

    /**
     * @var integer
     *
     * @ORM\Column(name="samplePeriod", type="integer", nullable=false)
     */
    private $sampleperiod;

    /**
     * @var float
     *
     * @ORM\Column(name="warningHighLimit", type="float", precision=10, scale=0, nullable=false)
     */
    private $warninghighlimit;

    /**
     * @var float
     *
     * @ORM\Column(name="warningLowLimit", type="float", precision=10, scale=0, nullable=false)
     */
    private $warninglowlimit;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status = 'Inactive';

    /**
     * @var integer
     *
     * @ORM\Column(name="loc_id", type="integer", nullable=false)
     */
    private $locId;

}
