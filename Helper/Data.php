<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * Handles the config and other settings
 *
 * Class Data
 * @package Eadesigndev\Awb\Helper
 */
class Data extends AbstractHelper
{
    const ACTION = 'awb';

    const DELETE = 3;

    const ENABLED = 'ea_awb/awb/enabled';

    const ENABLED_URGENT = 'ea_awb/urgent_courier/enabled_urgent';

    const USER_ACCOUNT_URGENT = 'ea_awb/urgent_courier/user_account_urgent';

    const USER_PASSWORD_URGENT = 'ea_awb/urgent_courier/user_password_urgent';

    const TARIFF_PLAN = 'ea_awb/urgent_courier/tariff_plan';

    const PICKUP_ID = 'ea_awb/urgent_courier/pickup_id';

    const DELIVERY_PAYMENT_URGENT = 'ea_awb/urgent_courier/delivery_payment_urgent';

    const PAYMENT_METHOD = 'ea_awb/urgent_courier/payment_method';

    const OPEN_PACKAGE = 'ea_awb/urgent_courier/open_package';

    const ORDER_VALUE = 'ea_awb/urgent_courier/order_value';

    const DELIVERY_SATURDAY = 'ea_awb/urgent_courier/delivery_saturday';

    const PACKAGE_TYPE = 'ea_awb/urgent_courier/package_type';

    const ENABLED_FAN = 'ea_awb/fan_courier/enabled_fan';

    const TITLE = 'ea_awb/fan_courier/title';

    const CLIENT_ID = 'ea_awb/fan_courier/authentication/client_id';

    const USER_ACCOUNT_FAN = 'ea_awb/fan_courier/authentication/user_account_fan';

    const USER_PASSWORD_FAN = 'ea_awb/fan_courier/authentication/user_password_fan';

    const AWB_CONFIRMATION = 'ea_awb/fan_courier/authentication/awb_confirmation';

    const SHIPPING_PARCELS = 'ea_awb/fan_courier/awb_option/shipping_parcels';

    const PARCELS_NUMBER = 'ea_awb/fan_courier/awb_option/parcels_number';

    const DELIVERY_PAYMENT_FAN = 'ea_awb/fan_courier/awb_option/delivery_payment_fan';

    const PRICE_WITHOUT_VAT = 'ea_awb/fan_courier/awb_option/price_without_vat';

    const RATES_FOREIGN_CURRENCY = 'ea_awb/fan_courier/awb_option/rates_foreign_currency';

    const HIDE_SHIPPING_CHARGE = 'ea_awb/fan_courier/awb_option/hide_shipping_charge';

    const FREE_SHIPPING_AMOUNT = 'ea_awb/fan_courier/awb_option/free_shipping_amount';

    const FIXED_AMOUNT = 'ea_awb/fan_courier/awb_option/fixed_amount';

    const CASH_ON_DELIVERY_REFUNDS = 'ea_awb/fan_courier/awb_option/cash_on_delivery_refunds';


    /**
     * @var ScopeConfigInterface
     */
    public $config;

    /**
     * Data constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        $this->config = $context->getScopeConfig();
        parent::__construct($context);
    }

    /**
     * @param string $configPath
     * @return bool
     */
    public function getConfig($configPath)
    {
        return $this->config->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE
        );
    }

    public function isEnabled($enableAwb = self::ENABLED)
    {
        return $this->getConfig($enableAwb);
    }

    public function isEnabledUrgent($enabledUrgent = self::ENABLED_URGENT)
    {
        return $this->getConfig($enabledUrgent);
    }

    public function isUserAccountUrgent($userAccountUrgent = self::USER_ACCOUNT_URGENT)
    {
        return $this->getConfig($userAccountUrgent);
    }

    public function isUserPasswordUrgent($userPasswordUrgent = self::USER_PASSWORD_URGENT)
    {
        return $this->getConfig($userPasswordUrgent);
    }

    public function isTariffPlan($tariffPlan = self::TARIFF_PLAN)
    {
        return $this->getConfig($tariffPlan);
    }

    public function isPickupId($pickupId = self::PICKUP_ID)
    {
        return $this->getConfig($pickupId);
    }

    public function isDeliveryPaymentUrgent($deliveryPaymentUrgent = self::DELIVERY_PAYMENT_URGENT)
    {
        return $this->getConfig($deliveryPaymentUrgent);
    }

    public function isPaymentMethod($paymentMethod = self::PAYMENT_METHOD)
    {
        return $this->getConfig($paymentMethod);
    }

    public function isOpenPackage($openPackage = self::OPEN_PACKAGE)
    {
        return $this->getConfig($openPackage);
    }

    public function isOrderValue($orderValue = self::ORDER_VALUE)
    {
        return $this->getConfig($orderValue);
    }

    public function isDeliverySaturday($deliverySaturday = self::DELIVERY_SATURDAY)
    {
        return $this->getConfig($deliverySaturday);
    }

    public function isPackageType($packageType = self::PACKAGE_TYPE)
    {
        return $this->getConfig($packageType);
    }

    public function isEnabledFan($enabledFan = self::ENABLED_FAN)
    {
        return $this->getConfig($enabledFan);
    }

    public function isTitle($title = self::TITLE)
    {
        return $this->getConfig($title);
    }

    public function isClientId($clientId = self::CLIENT_ID)
    {
        return $this->getConfig($clientId);
    }

    public function isUserAccountFan($userAccountFan = self::USER_ACCOUNT_FAN)
    {
        return $this->getConfig($userAccountFan);
    }

    public function isUserPasswordFan($userPasswordFan = self::USER_PASSWORD_FAN)
    {
        return $this->getConfig($userPasswordFan);
    }

    public function isAwbConfirmation($awbConfirmation = self::AWB_CONFIRMATION)
    {
        return $this->getConfig($awbConfirmation);
    }

    public function isShippingParcels($shippingParcels = self::SHIPPING_PARCELS)
    {
        return $this->getConfig($shippingParcels);
    }

    public function isParcelsNumber($parcelsNumber = self::PARCELS_NUMBER)
    {
        return $this->getConfig($parcelsNumber);
    }

    public function isDeliveryPaymentFan($deliveryPaymentFan = self::DELIVERY_PAYMENT_FAN)
    {
        return $this->getConfig($deliveryPaymentFan);
    }

    public function isPriceWithoutVat($priceWithoutVat = self::PRICE_WITHOUT_VAT)
    {
        return $this->getConfig($priceWithoutVat);
    }

    public function isRatesForeignCurrency($ratesForeignCurrency = self::RATES_FOREIGN_CURRENCY)
    {
        return $this->getConfig($ratesForeignCurrency);
    }

    public function isHideShippingCharge($hideShippingCharge = self::HIDE_SHIPPING_CHARGE)
    {
        return $this->getConfig($hideShippingCharge);
    }

    public function isFreeShippingAmount($freeShippingAmount = self::FREE_SHIPPING_AMOUNT)
    {
        return $this->getConfig($freeShippingAmount);
    }

    public function isFixedAmount($fixedAmount = self::FIXED_AMOUNT)
    {
        return $this->getConfig($fixedAmount);
    }

    public function isCashOnDeliveryRefunds($cashOnDeliveryRefunds = self::CASH_ON_DELIVERY_REFUNDS)
    {
        return $this->getConfig($cashOnDeliveryRefunds);
    }
}
