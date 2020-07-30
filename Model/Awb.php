<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

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

    public function setRecipient($recipient)
    {
        $this->setData(AwbInterface::RECIPIENT, $recipient);
    }

    public function setCountryId($countryId)
    {
        $this->setData(AwbInterface::COUNTRY_ID, $countryId);
    }

    public function setRegionId($regionId)
    {
        $this->setData(AwbInterface::REGION_ID, $regionId);
    }

    public function setCity($city)
    {
        $this->setData(AwbInterface::CITY, $city);
    }

    public function setStreet($street)
    {
        $this->setData(AwbInterface::STREET, $street);
    }

    public function setTelephone($telephone)
    {
        $this->setData(AwbInterface::TELEPHONE, $telephone);
    }

    public function setCustomerEmail($customerEmail)
    {
        $this->setData(AwbInterface::CUSTOMER_EMAIL, $customerEmail);
    }

    public function setPostcode($postcode)
    {
        $this->setData(AwbInterface::POSTCODE, $postcode);
    }

    public function setCarrierId($carrierId)
    {
        $this->setData(AwbInterface::CARRIER_ID, $carrierId);
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->setData(AwbInterface::PAYMENT_METHOD, $paymentMethod);
    }

    public function setTariffPlan($tariffPlan)
    {
        $this->setData(AwbInterface::TARIFF_PLAN, $tariffPlan);
    }

    public function setAwbPickupId($awbPickupId)
    {
        $this->setData(AwbInterface::AWB_PICKUP_ID, $awbPickupId);
    }

    public function setDeliveryPayment($deliveryPayment)
    {
        $this->setData(AwbInterface::DELIVERY_PAYMENT, $deliveryPayment);
    }

    public function setWeight($weight)
    {
        $this->setData(AwbInterface::WEIGHT, $weight);
    }

    public function setPackages($packages)
    {
        $this->setData(AwbInterface::PACKAGES, $packages);
    }

    public function setEnvelopes($envelopes)
    {
        $this->setData(AwbInterface::ENVELOPES, $envelopes);
    }

    public function setOrderValue($orderValue)
    {
        $this->setData(AwbInterface::ORDER_VALUE, $orderValue);
    }

    public function setRepaymentValue($repaymentValue)
    {
        $this->setData(AwbInterface::REPAYMENT_VALUE, $repaymentValue);
    }

    public function setContent($content)
    {
        $this->setData(AwbInterface::CONTENT, $content);
    }

    public function setDeliverySaturday($deliverySaturday)
    {
        $this->setData(AwbInterface::DELIVERY_SATURDAY, $deliverySaturday);
    }

    public function setOpenPackage($openPackage)
    {
        $this->setData(AwbInterface::OPEN_PACKAGE, $openPackage);
    }

    public function setComments($comments)
    {
        $this->setData(AwbInterface::COMMENTS, $comments);
    }

    public function setStatus($status)
    {
        $this->setData(AwbInterface::STATUS, $status);
    }

    public function setDeliveryCompany($deliveryCompany)
    {
        $this->setData(AwbInterface::DELIVERY_COMPANY, $deliveryCompany);
    }
}
