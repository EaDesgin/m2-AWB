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
use Eadesigndev\Nemo\Model\Sources\PickupId;
use Eadesigndev\Nemo\Helper\Data;
use Eadesigndev\Awb\Model\Sources\InputType;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Framework\App\Request\Http;
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
class CurierNemo extends Generic implements TabInterface
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

    /**
     * @var Data
     */
    private $helperData;

    public function __construct(
        Http $request,
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
        Data $helperData,
        array $data = []
    ) {
        $this->request         = $request;
        $this->registry        = $registry;
        $this->yesNo           = $yesNo;
        $this->systemStore     = $systemStore;
        $this->carrierType     = $carrierType;
        $this->paymentMethod   = $paymentMethod;
        $this->deliveryPayment = $deliveryPayment;
        $this->tariff          = $tariff;
        $this->pickupId        = $pickupId;
        $this->inputType       = $inputType;
        $this->helperData      = $helperData;

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
            ['legend' => __('Info - Nemo Express')]
        );

        $types = $this->carrierType->getAvailable();

        $carrierType = $this->request->getParam('carrier_id');
        if (!$carrierType) {
            $carrierType = $model->getData('carrier_id');
        }
        $typeC[$carrierType] = $types[$carrierType];
        $fieldSet->addField(
            'carrier_id',
            'select',
            [
                'name' => 'carrier_id',
                'label' => __('Carrier'),
                'title' => __('Carrier'),
                'values' => $typeC,
                'value' => $carrierType,
                'required' => true,
                'readonly' => true,
            ]
        );

        $defaultPickupId = $this->helperData->getPickupId();

        $types = $this->pickupId->getAvailable();
        $fieldSet->addField(
            'awb_pickup_id',
            'select',
            [
                'name' => 'awb_pickup_id',
                'label' => __('Awb Pickup Id'),
                'title' => __('Awb Pickup Id'),
                'value' => $defaultPickupId,
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
