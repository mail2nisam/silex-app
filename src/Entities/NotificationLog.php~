<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * NotificationLog
 *
 * @ORM\Table(name="notification_log")
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
     * @var integer
     *
     * @ORM\Column(name="probe_id", type="integer", nullable=false)
     */
    private $probeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;


}
