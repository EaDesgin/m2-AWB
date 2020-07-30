<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Api\Data;

interface AwbInterface
{
    const ENTITY_ID         = 'entity_id';
    const IS_ACTIVE         = 'is_active';
    const CREATED_AT        = 'created_at';
    const ORDER_ID          = 'order_id';
    const SHIPPING_ID       = 'shipment_id';
    const RECIPIENT         = 'recipient';
    const COUNTRY_ID        = 'country_id';
    const REGION_ID         = 'region_id';
    const CITY              = 'city';
    const STREET            = 'street';
    const TELEPHONE         = 'telephone';
    const CUSTOMER_EMAIL    = 'customer_email';
    const POSTCODE          = 'postcode';
    const CARRIER_ID        = 'carrier_id';
    const PAYMENT_METHOD    = 'payment_method';
    const TARIFF_PLAN       = 'tariff_plan';
    const AWB_PICKUP_ID     = 'awb_pickup_id';
    const DELIVERY_PAYMENT  = 'delivery_payment';
    const WEIGHT            = 'weight';
    const PACKAGES          = 'packages';
    const ENVELOPES         = 'envelopes';
    const ORDER_VALUE       = 'order_value';
    const REPAYMENT_VALUE   = 'repayment_value';
    const CONTENT           = 'content';
    const DELIVERY_SATURDAY = 'delivery_saturday';
    const OPEN_PACKAGE      = 'open_package';
    const COMMENTS          = 'comments';
    const STATUS            = 'status';
    const DELIVERY_COMPANY  = 'delivery_company';


    public function getId();

    public function getIsActive();

    public function getCreatedAt();

    public function getOrderId();

    public function getShippingId();

    public function getRecipient();

    public function getCountryId();

    public function getRegionId();

    public function getCity();

    public function getStreet();

    public function getTelephone();

    public function getCustomerEmail();

    public function getPostcode();

    public function getCarrierId();

    public function getPaymentMethod();

    public function getTariffPlan();

    public function getAwbPickupId();

    public function getDeliveryPayment();

    public function getWeight();

    public function getPackages();

    public function getEnvelopes();

    public function getOrderValue();

    public function getRepaymentValue();

    public function getContent();

    public function getDeliverySaturday();

    public function getOpenPackage();

    public function getComments();

    public function getStatus();

    public function getDeliveryCompany();


    public function setId($entityId);

    public function setIsActive($isActive);

    public function setCreatedAt($createdAt);

    public function setOrderId($orderId);

    public function setShippingId($shippingId);

    public function setRecipient($recipient);

    public function setCountryId($countryId);

    public function setRegionId($regionId);

    public function setCity($city);

    public function setStreet($street);

    public function setTelephone($telephone);

    public function setCustomerEmail($customerEmail);

    public function setPostcode($postcode);

    public function setCarrierId($carrierId);

    public function setPaymentMethod($paymentMethod);

    public function setTariffPlan($tariffPlan);

    public function setAwbPickupId($awbPickupId);

    public function setDeliveryPayment($deliveryPayment);

    public function setWeight($weight);

    public function setPackages($packages);

    public function setEnvelopes($envelopes);

    public function setOrderValue($orderValue);

    public function setRepaymentValue($repaymentValue);

    public function setContent($content);

    public function setDeliverySaturday($deliverySaturday);

    public function setOpenPackage($openPackage);

    public function setComments($comments);

    public function setStatus($status);

    public function setDeliveryCompany($deliveryCompany);
}
