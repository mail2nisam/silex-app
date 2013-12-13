<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * States
 *
 * @ORM\Table(name="states", indexes={@ORM\Index(name="FK_states_1", columns={"countryID"})})
 * @ORM\Entity
 */
class States
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
     * @ORM\Column(name="countryID", type="integer", nullable=true)
     */
    private $countryid;

    /**
     * @var string
     *
     * @ORM\Column(name="stateName", type="string", length=100, nullable=false)
     */
    private $statename;

    /**
     * @var string
     *
     * @ORM\Column(name="stateStatus", type="string", nullable=false)
     */
    private $statestatus;


}
