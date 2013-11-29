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

}
