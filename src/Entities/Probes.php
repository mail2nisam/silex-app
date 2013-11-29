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
     * Set userId
     *
     * @param integer $userId
     * @return Probes
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set alerthighlimit
     *
     * @param float $alerthighlimit
     * @return Probes
     */
    public function setAlerthighlimit($alerthighlimit)
    {
        $this->alerthighlimit = $alerthighlimit;

        return $this;
    }

    /**
     * Get alerthighlimit
     *
     * @return float 
     */
    public function getAlerthighlimit()
    {
        return $this->alerthighlimit;
    }

    /**
     * Set alertlowlimit
     *
     * @param float $alertlowlimit
     * @return Probes
     */
    public function setAlertlowlimit($alertlowlimit)
    {
        $this->alertlowlimit = $alertlowlimit;

        return $this;
    }

    /**
     * Get alertlowlimit
     *
     * @return float 
     */
    public function getAlertlowlimit()
    {
        return $this->alertlowlimit;
    }

    /**
     * Set siteno
     *
     * @param integer $siteno
     * @return Probes
     */
    public function setSiteno($siteno)
    {
        $this->siteno = $siteno;

        return $this;
    }

    /**
     * Get siteno
     *
     * @return integer 
     */
    public function getSiteno()
    {
        return $this->siteno;
    }

    /**
     * Set collingDevice
     *
     * @param string $collingDevice
     * @return Probes
     */
    public function setCollingDevice($collingDevice)
    {
        $this->collingDevice = $collingDevice;

        return $this;
    }

    /**
     * Get collingDevice
     *
     * @return string 
     */
    public function getCollingDevice()
    {
        return $this->collingDevice;
    }

    /**
     * Set lastcalibrationdatetime
     *
     * @param \DateTime $lastcalibrationdatetime
     * @return Probes
     */
    public function setLastcalibrationdatetime($lastcalibrationdatetime)
    {
        $this->lastcalibrationdatetime = $lastcalibrationdatetime;

        return $this;
    }

    /**
     * Get lastcalibrationdatetime
     *
     * @return \DateTime 
     */
    public function getLastcalibrationdatetime()
    {
        return $this->lastcalibrationdatetime;
    }

    /**
     * Set nextcalibrationdue
     *
     * @param \DateTime $nextcalibrationdue
     * @return Probes
     */
    public function setNextcalibrationdue($nextcalibrationdue)
    {
        $this->nextcalibrationdue = $nextcalibrationdue;

        return $this;
    }

    /**
     * Get nextcalibrationdue
     *
     * @return \DateTime 
     */
    public function getNextcalibrationdue()
    {
        return $this->nextcalibrationdue;
    }

    /**
     * Set serialnumber
     *
     * @param string $serialnumber
     * @return Probes
     */
    public function setSerialnumber($serialnumber)
    {
        $this->serialnumber = $serialnumber;

        return $this;
    }

    /**
     * Get serialnumber
     *
     * @return string 
     */
    public function getSerialnumber()
    {
        return $this->serialnumber;
    }

    /**
     * Set probetype
     *
     * @param string $probetype
     * @return Probes
     */
    public function setProbetype($probetype)
    {
        $this->probetype = $probetype;

        return $this;
    }

    /**
     * Get probetype
     *
     * @return string 
     */
    public function getProbetype()
    {
        return $this->probetype;
    }

    /**
     * Set registereddate
     *
     * @param \DateTime $registereddate
     * @return Probes
     */
    public function setRegistereddate($registereddate)
    {
        $this->registereddate = $registereddate;

        return $this;
    }

    /**
     * Get registereddate
     *
     * @return \DateTime 
     */
    public function getRegistereddate()
    {
        return $this->registereddate;
    }

    /**
     * Set sampleperiodunits
     *
     * @param string $sampleperiodunits
     * @return Probes
     */
    public function setSampleperiodunits($sampleperiodunits)
    {
        $this->sampleperiodunits = $sampleperiodunits;

        return $this;
    }

    /**
     * Get sampleperiodunits
     *
     * @return string 
     */
    public function getSampleperiodunits()
    {
        return $this->sampleperiodunits;
    }

    /**
     * Set sampleperiod
     *
     * @param integer $sampleperiod
     * @return Probes
     */
    public function setSampleperiod($sampleperiod)
    {
        $this->sampleperiod = $sampleperiod;

        return $this;
    }

    /**
     * Get sampleperiod
     *
     * @return integer 
     */
    public function getSampleperiod()
    {
        return $this->sampleperiod;
    }

    /**
     * Set warninghighlimit
     *
     * @param float $warninghighlimit
     * @return Probes
     */
    public function setWarninghighlimit($warninghighlimit)
    {
        $this->warninghighlimit = $warninghighlimit;

        return $this;
    }

    /**
     * Get warninghighlimit
     *
     * @return float 
     */
    public function getWarninghighlimit()
    {
        return $this->warninghighlimit;
    }

    /**
     * Set warninglowlimit
     *
     * @param float $warninglowlimit
     * @return Probes
     */
    public function setWarninglowlimit($warninglowlimit)
    {
        $this->warninglowlimit = $warninglowlimit;

        return $this;
    }

    /**
     * Get warninglowlimit
     *
     * @return float 
     */
    public function getWarninglowlimit()
    {
        return $this->warninglowlimit;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Probes
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set locId
     *
     * @param integer $locId
     * @return Probes
     */
    public function setLocId($locId)
    {
        $this->locId = $locId;

        return $this;
    }

    /**
     * Get locId
     *
     * @return integer 
     */
    public function getLocId()
    {
        return $this->locId;
    }
}
