<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * AlertContacts
 *
 * @ORM\Table(name="alert_contacts", uniqueConstraints={@ORM\UniqueConstraint(name="org_or_probe_id", columns={"org_or_probe_id", "contcat_type", "contact_for", "contact"})})
 * @ORM\Entity
 */
class AlertContacts
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
     * @ORM\Column(name="org_or_probe_id", type="integer", nullable=false)
     */
    private $orgOrProbeId;

    /**
     * @var string
     *
     * @ORM\Column(name="contcat_type", type="string", nullable=false)
     */
    private $contcatType;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_for", type="string", nullable=false)
     */
    private $contactFor;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=100, nullable=false)
     */
    private $contact;



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
     * Set orgOrProbeId
     *
     * @param integer $orgOrProbeId
     * @return AlertContacts
     */
    public function setOrgOrProbeId($orgOrProbeId)
    {
        $this->orgOrProbeId = $orgOrProbeId;

        return $this;
    }

    /**
     * Get orgOrProbeId
     *
     * @return integer 
     */
    public function getOrgOrProbeId()
    {
        return $this->orgOrProbeId;
    }

    /**
     * Set contcatType
     *
     * @param string $contcatType
     * @return AlertContacts
     */
    public function setContcatType($contcatType)
    {
        $this->contcatType = $contcatType;

        return $this;
    }

    /**
     * Get contcatType
     *
     * @return string 
     */
    public function getContcatType()
    {
        return $this->contcatType;
    }

    /**
     * Set contactFor
     *
     * @param string $contactFor
     * @return AlertContacts
     */
    public function setContactFor($contactFor)
    {
        $this->contactFor = $contactFor;

        return $this;
    }

    /**
     * Get contactFor
     *
     * @return string 
     */
    public function getContactFor()
    {
        return $this->contactFor;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return AlertContacts
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }
}
