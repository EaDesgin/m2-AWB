<?php
/**
 * Copyright © 2017 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Api\Data;

interface AwbInterface
{
    const ENTITY_ID = 'entity_id';
    const IS_ACTIVE = 'is_active';
    const RECIPIENT = 'recipient';
    const COUNTRY_ID = 'country_id';
    const REGION_ID = 'region_id';
    const CITY = 'city';
    const STREET = 'street';
    const TELEPHONE = 'telephone';
    const CUSTOMER_EMAIL = 'customer_email';
    const POSTCODE = 'postcode';
    const CARRIER_ID = 'carrier_id';
    const PAYMENT_METHOD = 'payment_method';
    const TARIFF_PLAN = 'tariff_plan';
    const AWB_PICKUP_ID = 'awb_pickup_id';
    const DELIVERY_PAYMENT = 'delivery_payment';
    const WEIGHT = 'weight';
    const PACKAGES = 'packages';
    const ENVELOPES = 'envelopes';
    const ORDER_VALUE = 'order_value';
    const REPAYMENT_VALUE = 'repayment_value';
    const CONTENT = 'content';
    const DELIVERY_SATURDAY = 'delivery_saturday';
    const OPEN_PACKAGE = 'open_package';
    const COMMENTS = 'comments';
    const DELIVERY_COMPANY = 'delivery_company';



    public function getId();

    public function getIsActive();

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

    public function getDeliveryCompany();



    public function setId($entityId);

    public function setIsActive($isActive);

    public function setRecipient($Recipient);

    public function setCountryId($CountryId);

    public function setRegionId($RegionId);

    public function setCity($City);

    public function setStreet($Street);

    public function setTelephone($Telephone);

    public function setCustomerEmail($CustomerEmail);

    public function setPostcode($Postcode);

    public function setCarrierId($CarrierId);

    public function setPaymentMethod($PaymentMethod);

    public function setTariffPlan($TariffPlan);

    public function setAwbPickupId($AwbPickupId);

    public function setDeliveryPayment($DeliveryPayment);

    public function setWeight($Weight);

    public function setPackages($Packages);

    public function setEnvelopes($Envelopes);

    public function setOrderValue($OrderValue);

    public function setRepaymentValue($RepaymentValue);

    public function setContent($Content);

    public function setDeliverySaturday($DeliverySaturday);

    public function setOpenPackage($OpenPackage);

    public function setComments($Comments);

    public function setDeliveryCompany($DeliveryCompany);


}