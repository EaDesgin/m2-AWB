<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */
namespace Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit\Tab;

use Eadesigndev\Awb\Model\Awb;
use Eadesigndev\Awb\Model\Sources\CarrierType;
use Eadesigndev\Awb\Model\Sources\PaymentMethod;
use Eadesigndev\Awb\Model\Sources\DeliveryPayment;
use Eadesigndev\Awb\Model\Sources\Tariff;
use Eadesigndev\Urgent\Model\Sources\PickupId;
use Eadesigndev\Awb\Model\Sources\InputType;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Framework\Data\Form;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Phrase;
use Magento\Framework\Registry;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Config\Model\Config\Source\Yesno;
use Magento\Store\Model\System\Store as SystemStore;

/**
 * Class Curier
 * @package Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit\Tab
 */
class Curier extends Generic implements TabInterface
{
    /**
     * @var CarrierType
     */
    private $carrierType;

    /**
     * @var PaymentMethod
     */
    private $paymentMethod;

    /**
     * @var DeliveryPayment
     */
    private $deliveryPayment;

    /**
     * @var Tariff
     */
    private $tariff;

    /**
     * @var PickupId
     */
    private $pickupId;

    /**
     * @var InputType
     */
    private $inputType;

    /**
     * @var Yesno
     */
    private $yesNo;

    /**
     * @var SystemStore
     */
    private $systemStore;

    /**
     * @var Registry
     */
    private $registry;

    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Yesno $yesNo,
        SystemStore $systemStore,
        CarrierType $carrierType,
        PaymentMethod $paymentMethod,
        DeliveryPayment $deliveryPayment,
        Tariff $tariff,
        PickupId $pickupId,
        InputType $inputType,
        array $data = []
    ) {
        $this->registry        = $registry;
        $this->yesNo           = $yesNo;
        $this->systemStore     = $systemStore;
        $this->carrierType     = $carrierType;
        $this->paymentMethod   = $paymentMethod;
        $this->deliveryPayment = $deliveryPayment;
        $this->tariff          = $tariff;
        $this->pickupId        = $pickupId;
        $this->inputType       = $inputType;

        parent::__construct(
            $context,
            $registry,
            $formFactory,
            $data
        );
    }

    /**
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function _prepareForm()
    {
        /** @var Awb $model */
        $model = $this->registry->registry('awb_data');

        /** @var Form $form */
        $form = $this->_formFactory->create();

        $fieldSet = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Info')]
        );

        $types = $this->carrierType->getAvailable();
        $fieldSet->addField(
            'carrier_id',
            'select',
            [
                'name' => 'carrier_id',
                'label' => __('Carrier'),
                'title' => __('Carrier'),
                'values' => $types,
                'required' => true,
                'readonly' => true,
            ]
        );

        $types = $this->paymentMethod->getAvailable();
        $fieldSet->addField(
            'payment_method',
            'select',
            [
                'name' => 'payment_method',
                'label' => __('Payment Method(Collector account/Standard)'),
                'title' => __('Payment Method(Collector account/Standard)'),
                'values' => $types,
                'required' => true,
            ]
        );

        $types = $this->tariff->getAvailable();
        $fieldSet->addField(
            'tariff_plan',
            'select',
            [
                'name' => 'tariff_plan',
                'label' => __('Tariff plan'),
                'title' => __('Tariff plan'),
                'values' => $types,
                'required' => true,
            ]
        );

        $types = $this->pickupId->getAvailable();
        $fieldSet->addField(
            'awb_pickup_id',
            'select',
            [
                'name' => 'awb_pickup_id',
                'label' => __('Awb Pickup Id'),
                'title' => __('Awb Pickup Id'),
                'values' => $types,
                'required' => true,
            ]
        );

        $types = $this->deliveryPayment->getAvailable();
        $fieldSet->addField(
            'delivery_payment',
            'select',
            [
                'name' => 'delivery_payment',
                'label' => __('Delivery Payment(Sender/Consignee)'),
                'title' => __('Delivery Payment (Sender/Consignee)'),
                'values' => $types,
                'required' => true,
            ]
        );

        $types = $this->inputType->getAvailable();
        $fieldSet->addField(
            'weight',
            'text',
            [
                'name' => 'weight',
                'label' => __('Weight'),
                'title' => __('Weight'),
                'values' => $types,
                'required' => true,
            ]
        );

        $types = $this->inputType->getAvailable();
        $fieldSet->addField(
            'packages',
            'text',
            [
                'name' => 'packages',
                'label' => __('Packages'),
                'title' => __('Packages'),
                'values' => $types,
                'required' => false,
            ]
        );

        $types = $this->inputType->getAvailable();
        $fieldSet->addField(
            'order_id',
            'hidden',
            [
                'name' => 'order_id',
                'label' => __('Order Id'),
                'title' => __('Order Id'),
                'values' => $types,
                'required' => false,
            ]
        );

        $types = $this->inputType->getAvailable();
        $fieldSet->addField(
            'shipment_id',
            'hidden',
            [
                'name' => 'shipment_id',
                'label' => __('Shipment Id'),
                'title' => __('Shipment Id'),
                'values' => $types,
                'required' => false,
            ]
        );

        $types = $this->inputType->getAvailable();
        $fieldSet->addField(
            'envelopes',
            'text',
            [
                'name' => 'envelopes',
                'label' => __('Envelopes'),
                'title' => __('Envelopes'),
                'values' => $types,
                'required' => false,
            ]
        );

        $types = $this->inputType->getAvailable();
        $fieldSet->addField(
            'order_value',
            'text',
            [
                'name' => 'order_value',
                'label' => __('Value order control'),
                'title' => __('Value order control'),
                'values' => $types,
                'required' => false,
            ]
        );

        $types = $this->inputType->getAvailable();
        $fieldSet->addField(
            'repayment_value',
            'text',
            [
                'name' => 'repayment_value',
                'label' => __('Repayment value'),
                'title' => __('Repayment value'),
                'values' => $types,
                'required' => true,
            ]
        );

        $types = $this->inputType->getAvailable();
        $fieldSet->addField(
            'content',
            'textarea',
            [
                'name' => 'content',
                'label' => __('Content'),
                'title' => __('Content'),
                'values' => $types,
                'required' => false,
            ]
        );

        $fieldSet->addField(
            'delivery_saturday',
            'select',
            [
                'name' => 'delivery_saturday',
                'label' => __('Saturday delivery'),
                'title' => __('Saturday delivery'),
                'values' => $this->yesNo->toOptionArray(),
                'required' => true,
            ]
        );

        $fieldSet->addField(
            'open_package',
            'select',
            [
                'name' => 'open_package',
                'label' => __('Open package'),
                'title' => __('Open package'),
                'values' => $this->yesNo->toOptionArray(),
                'required' => true,
            ]
        );

        $types = $this->inputType->getAvailable();
        $fieldSet->addField(
            'comments',
            'textarea',
            [
                'name' => 'comments',
                'label' => __('Comments'),
                'title' => __('Comments'),
                'values' => $types,
                'required' => false,
            ]
        );

        $form->setValues($model->getData());
        $this->setForm($form);

        parent::_prepareForm();

        return $this;
    }

    /**
     * @return Phrase
     */
    public function getTabLabel()
    {
        return __('Curier');
    }

    /**
     * Prepare title for tab
     *
     * @return Phrase
     */
    public function getTabTitle()
    {
        return __('Curier');
    }

    /**
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }
}