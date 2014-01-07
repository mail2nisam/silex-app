<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * BuyerInfo
 *
 * @ORM\Table(name="buyer_info", uniqueConstraints={@ORM\UniqueConstraint(name="billing_country", columns={"billing_country"}), @ORM\UniqueConstraint(name="billing_state", columns={"billing_state"}), @ORM\UniqueConstraint(name="shipping_state", columns={"shipping_state"}), @ORM\UniqueConstraint(name="shipping_country", columns={"shipping_country"})})
 * @ORM\Entity
 */
class BuyerInfo {

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
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=70, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_address1", type="string", length=500, nullable=false)
     */
    private $billingAddress1;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_address2", type="string", length=500, nullable=true)
     */
    private $billingAddress2;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_city", type="string", length=100, nullable=false)
     */
    private $billingCity;

    /**
     * @var integer
     *
     * @ORM\Column(name="billing_zip", type="integer", nullable=false)
     */
    private $billingZip;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_address1", type="string", length=500, nullable=false)
     */
    private $shippingAddress1;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_address2", type="string", length=500, nullable=true)
     */
    private $shippingAddress2;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_city", type="string", length=100, nullable=false)
     */
    private $shippingCity;

    /**
     * @var integer
     *
     * @ORM\Column(name="shipping_zip", type="integer", nullable=false)
     */
    private $shippingZip;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_status", type="string", length=100, nullable=false)
     */
    private $paymentStatus = 'waiting';

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_id", type="string", length=100, nullable=true)
     */
    private $transactionId;

    /**
     * @var string
     *
     * @ORM\Column(name="ship_n_bill", type="boolean", nullable=true)
     */
    private $shipNBill;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_of_probes", type="integer", nullable=false)
     */
    private $noOfProbes;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isMonitored", type="boolean", nullable=false)
     */
    private $ismonitored;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_response", type="string", length=500, nullable=true)
     */
    private $transactionResponse;

    /**
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="billing_country", referencedColumnName="id")
     * })
     */
    private $billingCountry;

    /**
     * @var \States
     *
     * @ORM\ManyToOne(targetEntity="States")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="billing_state", referencedColumnName="id")
     * })
     */
    private $billingState;

    /**
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shipping_country", referencedColumnName="id")
     * })
     */
    private $shippingCountry;

    /**
     * @var \States
     *
     * @ORM\ManyToOne(targetEntity="States")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shipping_state", referencedColumnName="id")
     * })
     */
    private $shippingState;

    /**
     * @var string
     *
     * @ORM\Column(name="subscription_response", type="string", length=1000, nullable=true)
     */
    private $subscriptionResponse;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return BuyerInfo
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set billingAddress1
     *
     * @param string $billingAddress1
     * @return BuyerInfo
     */
    public function setBillingAddress1($billingAddress1) {
        $this->billingAddress1 = $billingAddress1;

        return $this;
    }

    /**
     * Get billingAddress1
     *
     * @return string 
     */
    public function getBillingAddress1() {
        return $this->billingAddress1;
    }

    /**
     * Set billingAddress2
     *
     * @param string $billingAddress2
     * @return BuyerInfo
     */
    public function setBillingAddress2($billingAddress2) {
        $this->billingAddress2 = $billingAddress2;

        return $this;
    }

    /**
     * Get billingAddress2
     *
     * @return string 
     */
    public function getBillingAddress2() {
        return $this->billingAddress2;
    }

    /**
     * Set billingCity
     *
     * @param string $billingCity
     * @return BuyerInfo
     */
    public function setBillingCity($billingCity) {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * Get billingCity
     *
     * @return string 
     */
    public function getBillingCity() {
        return $this->billingCity;
    }

    /**
     * Set billingZip
     *
     * @param integer $billingZip
     * @return BuyerInfo
     */
    public function setBillingZip($billingZip) {
        $this->billingZip = $billingZip;

        return $this;
    }

    /**
     * Get billingZip
     *
     * @return integer 
     */
    public function getBillingZip() {
        return $this->billingZip;
    }

    /**
     * Set shippingAddress1
     *
     * @param string $shippingAddress1
     * @return BuyerInfo
     */
    public function setShippingAddress1($shippingAddress1) {
        $this->shippingAddress1 = $shippingAddress1;

        return $this;
    }

    /**
     * Get shippingAddress1
     *
     * @return string 
     */
    public function getShippingAddress1() {
        return $this->shippingAddress1;
    }

    /**
     * Set shippingAddress2
     *
     * @param string $shippingAddress2
     * @return BuyerInfo
     */
    public function setShippingAddress2($shippingAddress2) {
        $this->shippingAddress2 = $shippingAddress2;

        return $this;
    }

    /**
     * Get shippingAddress2
     *
     * @return string 
     */
    public function getShippingAddress2() {
        return $this->shippingAddress2;
    }

    /**
     * Set shippingCity
     *
     * @param string $shippingCity
     * @return BuyerInfo
     */
    public function setShippingCity($shippingCity) {
        $this->shippingCity = $shippingCity;

        return $this;
    }

    /**
     * Get shippingCity
     *
     * @return string 
     */
    public function getShippingCity() {
        return $this->shippingCity;
    }

    /**
     * Set shippingZip
     *
     * @param integer $shippingZip
     * @return BuyerInfo
     */
    public function setShippingZip($shippingZip) {
        $this->shippingZip = $shippingZip;

        return $this;
    }

    /**
     * Get shippingZip
     *
     * @return integer 
     */
    public function getShippingZip() {
        return $this->shippingZip;
    }

    /**
     * Set paymentStatus
     *
     * @param string $paymentStatus
     * @return BuyerInfo
     */
    public function setPaymentStatus($paymentStatus) {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * Get paymentStatus
     *
     * @return string 
     */
    public function getPaymentStatus() {
        return $this->paymentStatus;
    }

    /**
     * Set transactionId
     *
     * @param string $transactionId
     * @return BuyerInfo
     */
    public function setTransactionId($transactionId) {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * Get transactionId
     *
     * @return string 
     */
    public function getTransactionId() {
        return $this->transactionId;
    }

    /**
     * Set transactionResponse
     *
     * @param string $transactionResponse
     * @return BuyerInfo
     */
    public function setTransactionResponse($transactionResponse) {
        $this->transactionResponse = $transactionResponse;

        return $this;
    }

    /**
     * Get transactionResponse
     *
     * @return string 
     */
    public function getTransactionResponse() {
        return $this->transactionResponse;
    }

    /**
     * Set shipNBill
     *
     * @param string $shipNBill
     * @return BuyerInfo
     */
    public function setShipNBill($shipNBill) {
        $this->shipNBill = $shipNBill;

        return $this;
    }

    /**
     * Get shipNBill
     *
     * @return string 
     */
    public function getShipNBill() {
        return $this->shipNBill;
    }

    /**
     * Set billingCountry
     *
     * @param \Countries $billingCountry
     * @return BuyerInfo
     */
    public function setBillingCountry(Countries $billingCountry = null) {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    /**
     * Get billingCountry
     *
     * @return \Countries 
     */
    public function getBillingCountry() {
        return $this->billingCountry;
    }

    /**
     * Set billingState
     *
     * @param \States $billingState
     * @return BuyerInfo
     */
    public function setBillingState(States $billingState = null) {
        $this->billingState = $billingState;

        return $this;
    }

    /**
     * Get billingState
     *
     * @return \States 
     */
    public function getBillingState() {
        return $this->billingState;
    }

    /**
     * Set shippingCountry
     *
     * @param \Countries $shippingCountry
     * @return BuyerInfo
     */
    public function setShippingCountry(Countries $shippingCountry = null) {
        $this->shippingCountry = $shippingCountry;

        return $this;
    }

    /**
     * Get shippingCountry
     *
     * @return \Countries 
     */
    public function getShippingCountry() {
        return $this->shippingCountry;
    }

    /**
     * Set shippingState
     *
     * @param \States $shippingState
     * @return BuyerInfo
     */
    public function setShippingState(States $shippingState = null) {
        $this->shippingState = $shippingState;

        return $this;
    }

    /**
     * Get shippingState
     *
     * @return \States 
     */
    public function getShippingState() {
        return $this->shippingState;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BuyerInfo
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set noOfProbes
     *
     * @param integer $noOfProbes
     * @return BuyerInfo
     */
    public function setNoOfProbes($noOfProbes) {
        $this->noOfProbes = $noOfProbes;

        return $this;
    }

    /**
     * Get noOfProbes
     *
     * @return integer 
     */
    public function getNoOfProbes() {
        return $this->noOfProbes;
    }

    /**
     * Set ismonitored
     *
     * @param boolean $ismonitored
     * @return BuyerInfo
     */
    public function setIsmonitored($ismonitored) {
        $this->ismonitored = $ismonitored;

        return $this;
    }

    /**
     * Get ismonitored
     *
     * @return boolean 
     */
    public function getIsmonitored() {
        return $this->ismonitored;
    }

    /**
     * Set subscriptionResponse
     *
     * @param string $subscriptionResponse
     * @return BuyerInfo
     */
    public function setSubscriptionResponse($subscriptionResponse) {
        $this->subscriptionResponse = $subscriptionResponse;

        return $this;
    }

    /**
     * Get subscriptionResponse
     *
     * @return string 
     */
    public function getSubscriptionResponse() {
        return $this->subscriptionResponse;
    }

}
