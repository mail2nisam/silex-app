<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Sessions
 *
 * @ORM\Table(name="sessions")
 * @ORM\Entity
 */
class Sessions
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=32, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="text", nullable=false)
     */
    private $data;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_accessed", type="datetime", nullable=false)
     */
    private $lastAccessed = 'CURRENT_TIMESTAMP';

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set data
     *
     * @param  string   $data
     * @return Sessions
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set lastAccessed
     *
     * @param  \DateTime $lastAccessed
     * @return Sessions
     */
    public function setLastAccessed($lastAccessed)
    {
        $this->lastAccessed = $lastAccessed;

        return $this;
    }

    /**
     * Get lastAccessed
     *
     * @return \DateTime
     */
    public function getLastAccessed()
    {
        return $this->lastAccessed;
    }
}
