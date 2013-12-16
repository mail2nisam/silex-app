<?php
namespace Entities;



use Doctrine\ORM\Mapping as ORM;

/**
 * CoolingDevice
 *
 * @ORM\Table(name="cooling_device", uniqueConstraints={@ORM\UniqueConstraint(name="device_name", columns={"device_name"})})
 * @ORM\Entity
 */
class CoolingDevice
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
     * @ORM\Column(name="device_name", type="string", length=250, nullable=false)
     */
    private $deviceName;

    /**
     * @var string
     *
     * @ORM\Column(name="device_status", type="string", nullable=false)
     */
    private $deviceStatus = 'active';



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
     * Set deviceName
     *
     * @param string $deviceName
     * @return CoolingDevice
     */
    public function setDeviceName($deviceName)
    {
        $this->deviceName = $deviceName;

        return $this;
    }

    /**
     * Get deviceName
     *
     * @return string 
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * Set deviceStatus
     *
     * @param string $deviceStatus
     * @return CoolingDevice
     */
    public function setDeviceStatus($deviceStatus)
    {
        $this->deviceStatus = $deviceStatus;

        return $this;
    }

    /**
     * Get deviceStatus
     *
     * @return string 
     */
    public function getDeviceStatus()
    {
        return $this->deviceStatus;
    }
}
