<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="id", columns={"id"})})
 * @ORM\Entity
 */
class Users
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
     * @ORM\Column(name="username", type="string", length=80, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=355, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=355, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="access", type="string", length=10, nullable=false)
     */
    private $access;

    /**
     * @var string
     *
     * @ORM\Column(name="last_ip", type="string", length=80, nullable=false)
     */
    private $lastIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login_date", type="date", nullable=false)
     */
    private $lastLoginDate;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_key", type="string", length=250, nullable=true)
     */
    private $activationKey;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="org_id", type="integer", nullable=false)
     */
    private $orgId;

    /**
     * @var integer
     *
     * @ORM\Column(name="loc_id", type="integer", nullable=false)
     */
    private $locId;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=250, nullable=false)
     */
    private $roles;


}
