<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * NotificationLog
 *
 * @ORM\Table(name="notification_log", uniqueConstraints={@ORM\UniqueConstraint(name="probe_id", columns={"probe_id", "user_id"}), @ORM\UniqueConstraint(name="user_id", columns={"user_id"})}, indexes={@ORM\Index(name="IDX_ED15DF23D2D0D4A", columns={"probe_id"})})
 * @ORM\Entity
 */
class NotificationLog
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
     * @ORM\Column(name="notification_type", type="string", length=100, nullable=false)
     */
    private $notificationType;

    /**
     * @var string
     *
     * @ORM\Column(name="notification_action", type="string", length=100, nullable=false)
     */
    private $notificationAction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="notification_time", type="datetime", nullable=false)
     */
    private $notificationTime;

    /**
     * @var string
     *
     * @ORM\Column(name="notification_status", type="string", nullable=false)
     */
    private $notificationStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="notification_response", type="string", length=300, nullable=false)
     */
    private $notificationResponse;

    /**
     * @var string
     *
     * @ORM\Column(name="log_index", type="string", length=50, nullable=false)
     */
    private $logIndex;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Probes
     *
     * @ORM\ManyToOne(targetEntity="Probes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="probe_id", referencedColumnName="id")
     * })
     */
    private $probe;



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
     * Set notificationType
     *
     * @param string $notificationType
     * @return NotificationLog
     */
    public function setNotificationType($notificationType)
    {
        $this->notificationType = $notificationType;

        return $this;
    }

    /**
     * Get notificationType
     *
     * @return string 
     */
    public function getNotificationType()
    {
        return $this->notificationType;
    }

    /**
     * Set notificationAction
     *
     * @param string $notificationAction
     * @return NotificationLog
     */
    public function setNotificationAction($notificationAction)
    {
        $this->notificationAction = $notificationAction;

        return $this;
    }

    /**
     * Get notificationAction
     *
     * @return string 
     */
    public function getNotificationAction()
    {
        return $this->notificationAction;
    }

    /**
     * Set notificationTime
     *
     * @param \DateTime $notificationTime
     * @return NotificationLog
     */
    public function setNotificationTime($notificationTime)
    {
        $this->notificationTime = $notificationTime;

        return $this;
    }

    /**
     * Get notificationTime
     *
     * @return \DateTime 
     */
    public function getNotificationTime()
    {
        return $this->notificationTime;
    }

    /**
     * Set notificationStatus
     *
     * @param string $notificationStatus
     * @return NotificationLog
     */
    public function setNotificationStatus($notificationStatus)
    {
        $this->notificationStatus = $notificationStatus;

        return $this;
    }

    /**
     * Get notificationStatus
     *
     * @return string 
     */
    public function getNotificationStatus()
    {
        return $this->notificationStatus;
    }

    /**
     * Set notificationResponse
     *
     * @param string $notificationResponse
     * @return NotificationLog
     */
    public function setNotificationResponse($notificationResponse)
    {
        $this->notificationResponse = $notificationResponse;

        return $this;
    }

    /**
     * Get notificationResponse
     *
     * @return string 
     */
    public function getNotificationResponse()
    {
        return $this->notificationResponse;
    }

    /**
     * Set logIndex
     *
     * @param string $logIndex
     * @return NotificationLog
     */
    public function setLogIndex($logIndex)
    {
        $this->logIndex = $logIndex;

        return $this;
    }

    /**
     * Get logIndex
     *
     * @return string 
     */
    public function getLogIndex()
    {
        return $this->logIndex;
    }

    /**
     * Set user
     *
     * @param \Users $user
     * @return NotificationLog
     */
    public function setUser(\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Users 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set probe
     *
     * @param \Probes $probe
     * @return NotificationLog
     */
    public function setProbe(\Probes $probe = null)
    {
        $this->probe = $probe;

        return $this;
    }

    /**
     * Get probe
     *
     * @return \Probes 
     */
    public function getProbe()
    {
        return $this->probe;
    }
}
