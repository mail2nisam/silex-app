<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="username", columns={"username"})}, indexes={@ORM\Index(name="org_id", columns={"org_id"}), @ORM\Index(name="new_fk_constraint_52", columns={"loc_id"})})
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
     * @ORM\Column(name="last_ip", type="string", length=80, nullable=true)
     */
    private $lastIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login_date", type="date", nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=250, nullable=false)
     */
    private $roles;

    /**
     * @var \Locations
     *
     * @ORM\ManyToOne(targetEntity="Locations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="loc_id", referencedColumnName="id")
     * })
     */
    private $loc;

    /**
     * @var \Organization
     *
     * @ORM\ManyToOne(targetEntity="Organization")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="org_id", referencedColumnName="id")
     * })
     */
    private $org;



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
     * Set username
     *
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set access
     *
     * @param string $access
     * @return Users
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access
     *
     * @return string 
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set lastIp
     *
     * @param string $lastIp
     * @return Users
     */
    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;

        return $this;
    }

    /**
     * Get lastIp
     *
     * @return string 
     */
    public function getLastIp()
    {
        return $this->lastIp;
    }

    /**
     * Set lastLoginDate
     *
     * @param \DateTime $lastLoginDate
     * @return Users
     */
    public function setLastLoginDate($lastLoginDate)
    {
        $this->lastLoginDate = $lastLoginDate;

        return $this;
    }

    /**
     * Get lastLoginDate
     *
     * @return \DateTime 
     */
    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    /**
     * Set activationKey
     *
     * @param string $activationKey
     * @return Users
     */
    public function setActivationKey($activationKey)
    {
        $this->activationKey = $activationKey;

        return $this;
    }

    /**
     * Get activationKey
     *
     * @return string 
     */
    public function getActivationKey()
    {
        return $this->activationKey;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Users
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
     * Set roles
     *
     * @param string $roles
     * @return Users
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return string 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set loc
     *
     * @param \Locations $loc
     * @return Users
     */
    public function setLoc(\Locations $loc = null)
    {
        $this->loc = $loc;

        return $this;
    }

    /**
     * Get loc
     *
     * @return \Locations 
     */
    public function getLoc()
    {
        return $this->loc;
    }

    /**
     * Set org
     *
     * @param \Organization $org
     * @return Users
     */
    public function setOrg(\Organization $org = null)
    {
        $this->org = $org;

        return $this;
    }

    /**
     * Get org
     *
     * @return \Organization 
     */
    public function getOrg()
    {
        return $this->org;
    }
}
