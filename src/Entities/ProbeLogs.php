<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * ProbeLogs
 *
 * @ORM\Table(name="probe_logs")
 * @ORM\Entity
 */
class ProbeLogs
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
     * @var float
     *
     * @ORM\Column(name="temperature_high", type="float", precision=10, scale=0, nullable=false)
     */
    private $temperatureHigh;

    /**
     * @var float
     *
     * @ORM\Column(name="temperature_low", type="float", precision=10, scale=0, nullable=false)
     */
    private $temperatureLow;

    /**
     * @var string
     *
     * @ORM\Column(name="status_1", type="string", length=10, nullable=false)
     */
    private $status1;

    /**
     * @var string
     *
     * @ORM\Column(name="status_2", type="string", length=10, nullable=false)
     */
    private $status2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time", nullable=false)
     */
    private $time;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="trip_1", type="string", length=10, nullable=false)
     */
    private $trip1;

    /**
     * @var string
     *
     * @ORM\Column(name="trip_2", type="string", length=10, nullable=false)
     */
    private $trip2;

    /**
     * @var string
     *
     * @ORM\Column(name="probe_id", type="string", length=250, nullable=false)
     */
    private $probeId;

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
     * Set temperatureHigh
     *
     * @param  float     $temperatureHigh
     * @return ProbeLogs
     */
    public function setTemperatureHigh($temperatureHigh)
    {
        $this->temperatureHigh = $temperatureHigh;

        return $this;
    }

    /**
     * Get temperatureHigh
     *
     * @return float
     */
    public function getTemperatureHigh()
    {
        return $this->temperatureHigh;
    }

    /**
     * Set temperatureLow
     *
     * @param  float     $temperatureLow
     * @return ProbeLogs
     */
    public function setTemperatureLow($temperatureLow)
    {
        $this->temperatureLow = $temperatureLow;

        return $this;
    }

    /**
     * Get temperatureLow
     *
     * @return float
     */
    public function getTemperatureLow()
    {
        return $this->temperatureLow;
    }

    /**
     * Set status1
     *
     * @param  string    $status1
     * @return ProbeLogs
     */
    public function setStatus1($status1)
    {
        $this->status1 = $status1;

        return $this;
    }

    /**
     * Get status1
     *
     * @return string
     */
    public function getStatus1()
    {
        return $this->status1;
    }

    /**
     * Set status2
     *
     * @param  string    $status2
     * @return ProbeLogs
     */
    public function setStatus2($status2)
    {
        $this->status2 = $status2;

        return $this;
    }

    /**
     * Get status2
     *
     * @return string
     */
    public function getStatus2()
    {
        return $this->status2;
    }

    /**
     * Set time
     *
     * @param  \DateTime $time
     * @return ProbeLogs
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set date
     *
     * @param  \DateTime $date
     * @return ProbeLogs
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set trip1
     *
     * @param  string    $trip1
     * @return ProbeLogs
     */
    public function setTrip1($trip1)
    {
        $this->trip1 = $trip1;

        return $this;
    }

    /**
     * Get trip1
     *
     * @return string
     */
    public function getTrip1()
    {
        return $this->trip1;
    }

    /**
     * Set trip2
     *
     * @param  string    $trip2
     * @return ProbeLogs
     */
    public function setTrip2($trip2)
    {
        $this->trip2 = $trip2;

        return $this;
    }

    /**
     * Get trip2
     *
     * @return string
     */
    public function getTrip2()
    {
        return $this->trip2;
    }

    /**
     * Set probeId
     *
     * @param  string    $probeId
     * @return ProbeLogs
     */
    public function setProbeId($probeId)
    {
        $this->probeId = $probeId;

        return $this;
    }

    /**
     * Get probeId
     *
     * @return string
     */
    public function getProbeId()
    {
        return $this->probeId;
    }
}
