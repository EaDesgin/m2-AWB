<?php

namespace Eadesigndev\Awb\Model;

use Eadesigndev\Awb\Api\Data\AwbInterface;
use Eadesigndev\Awb\Model\ResourceModel\Awb as AwbResourceModel;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource as AbstractResourceModel;
use Magento\Framework\Registry;

class Awb extends AbstractModel implements AwbInterface
{
    public function __construct(
        Context $context,
        Registry $registry,
        AbstractResourceModel $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection,
            $data
        );
    }

    public function _construct()
    {
        $this->_init(AwbResourceModel::class);
    }

    public function getId()
    {
        return $this->getData(AwbInterface::ENTITY_ID);
    }

    public function getIsActive()
    {
        return $this->getData(AwbInterface::IS_ACTIVE);
    }

    public function getCreatedAt()
    {
        return $this->getData(AwbInterface::CREATED_AT);
    }

    public function getOrderId()
    {
        return $this->getData(AwbInterface::ORDER_ID);
    }

    public function getShippingId()
    {
        return $this->getData(AwbInterface::SHIPPING_ID);
    }

    public function getRecipient()
    {
        return $this->getData(AwbInterface::RECIPIENT);
    }

    public function getCountryId()
    {
        return $this->getData(AwbInterface::COUNTRY_ID);
    }

    public function getRegionId()
    {
        return $this->getData(AwbInterface::REGION_ID);
    }

    public function getCity()
    {
        return $this->getData(AwbInterface::CITY);
    }

    public function getStreet()
    {
        return $this->getData(AwbInterface::STREET);
    }

    public function getTelephone()
    {
        return $this->getData(AwbInterface::TELEPHONE);
    }

    public function getCustomerEmail()
    {
        return $this->getData(AwbInterface::CUSTOMER_EMAIL);
    }

    public function getPostcode()
    {
        return $this->getData(AwbInterface::POSTCODE);
    }

    public function getCarrierId()
    {
        return $this->getData(AwbInterface::CARRIER_ID);
    }

    public function getPaymentMethod()
    {
        return $this->getData(AwbInterface::PAYMENT_METHOD);
    }

    public function getTariffPlan()
    {
        return $this->getData(AwbInterface::TARIFF_PLAN);
    }

    public function getAwbPickupId()
    {
        return $this->getData(AwbInterface::AWB_PICKUP_ID);
    }

    public function getDeliveryPayment()
    {
        return $this->getData(AwbInterface::DELIVERY_PAYMENT);
    }

    public function getWeight()
    {
        return $this->getData(AwbInterface::WEIGHT);
    }

    public function getPackages()
    {
        return $this->getData(AwbInterface::PACKAGES);
    }

    public function getEnvelopes()
    {
        return $this->getData(AwbInterface::ENVELOPES);
    }

    public function getOrderValue()
    {
        return $this->getData(AwbInterface::ORDER_VALUE);
    }

    public function getRepaymentValue()
    {
        return $this->getData(AwbInterface::REPAYMENT_VALUE);
    }

    public function getContent()
    {
        return $this->getData(AwbInterface::CONTENT);
    }

    public function getDeliverySaturday()
    {
        return $this->getData(AwbInterface::DELIVERY_SATURDAY);
    }

    public function getOpenPackage()
    {
        return $this->getData(AwbInterface::OPEN_PACKAGE);
    }

    public function getComments()
    {
        return $this->getData(AwbInterface::COMMENTS);
    }

    public function getStatus()
    {
        return $this->getData(AwbInterface::STATUS);
    }

    public function getDeliveryCompany()
    {
        return $this->getData(AwbInterface::DELIVERY_COMPANY);
    }



    public function setId($entityId)
    {
        $this->setData(AwbInterface::ENTITY_ID, $entityId);
    }

    public function setIsActive($isActive)
    {
        $this->setData(AwbInterface::IS_ACTIVE, $isActive);
    }

    public function setCreatedAt($createdAt)
    {
        $this->setData(AwbInterface::CREATED_AT, $createdAt);
    }

    public function setOrderId($orderId)
    {
        $this->setData(AwbInterface::ORDER_ID, $orderId);
    }

    public function setShippingId($shippingId)
    {
        $this->setData(AwbInterface::SHIPPING_ID, $shippingId);
    }

    public function setRecipient($Recipient)
    {
        $this->setData(AwbInterface::RECIPIENT, $Recipient);
    }

    public function setCountryId($CountryId)
    {
        $this->setData(AwbInterface::COUNTRY_ID, $CountryId);
    }

    public function setRegionId($RegionId)
    {
        $this->setData(AwbInterface::REGION_ID, $RegionId);
    }

    public function setCity($City)
    {
        $this->setData(AwbInterface::CITY, $City);
    }

    public function setStreet($Street)
    {
        $this->setData(AwbInterface::STREET, $Street);
    }

    public function setTelephone($Telephone)
    {
        $this->setData(AwbInterface::TELEPHONE, $Telephone);
    }

    public function setCustomerEmail($CustomerEmail)
    {
        $this->setData(AwbInterface::CUSTOMER_EMAIL, $CustomerEmail);
    }

    public function setPostcode($Postcode)
    {
        $this->setData(AwbInterface::POSTCODE, $Postcode);
    }

    public function setCarrierId($CarrierId)
    {
        $this->setData(AwbInterface::CARRIER_ID, $CarrierId);
    }

    public function setPaymentMethod($PaymentMethod)
    {
        $this->setData(AwbInterface::PAYMENT_METHOD, $PaymentMethod);
    }

    public function setTariffPlan($TariffPlan)
    {
        $this->setData(AwbInterface::TARIFF_PLAN, $TariffPlan);
    }

    public function setAwbPickupId($AwbPickupId)
    {
        $this->setData(AwbInterface::AWB_PICKUP_ID, $AwbPickupId);
    }

    public function setDeliveryPayment($DeliveryPayment)
    {
        $this->setData(AwbInterface::DELIVERY_PAYMENT, $DeliveryPayment);
    }

    public function setWeight($Weight)
    {
        $this->setData(AwbInterface::WEIGHT, $Weight);
    }

    public function setPackages($Packages)
    {
        $this->setData(AwbInterface::PACKAGES, $Packages);
    }

    public function setEnvelopes($Envelopes)
    {
        $this->setData(AwbInterface::ENVELOPES, $Envelopes);
    }

    public function setOrderValue($OrderValue)
    {
        $this->setData(AwbInterface::ORDER_VALUE, $OrderValue);
    }

    public function setRepaymentValue($RepaymentValue)
    {
        $this->setData(AwbInterface::REPAYMENT_VALUE, $RepaymentValue);
    }

    public function setContent($Content)
    {
        $this->setData(AwbInterface::CONTENT, $Content);
    }

    public function setDeliverySaturday($DeliverySaturday)
    {
        $this->setData(AwbInterface::DELIVERY_SATURDAY, $DeliverySaturday);
    }

    public function setOpenPackage($OpenPackage)
    {
        $this->setData(AwbInterface::OPEN_PACKAGE, $OpenPackage);
    }

    public function setComments($Comments)
    {
        $this->setData(AwbInterface::COMMENTS, $Comments);
    }

    public function setStatus($Status)
    {
        $this->setData(AwbInterface::STATUS, $Status);
    }

    public function setDeliveryCompany($DeliveryCompany)
    {
        $this->setData(AwbInterface::DELIVERY_COMPANY, $DeliveryCompany);
    }



}