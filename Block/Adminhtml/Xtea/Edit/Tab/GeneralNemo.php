<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */
namespace Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit\Tab;

use Eadesigndev\Awb\Model\Awb;
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
 * Class General
 * @package Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit\Tab
 */
class GeneralNemo extends Generic implements TabInterface
{
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
        array $data = []
    ) {
        $this->registry    = $registry;
        $this->yesNo       = $yesNo;
        $this->systemStore = $systemStore;

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
            [
                'legend' => __('Info - Nemo Express')
            ]
        );

        $fieldSet->addField(
            'recipient',
            'text',
            [
                'name' => 'recipient',
                'label' => __('Recipient'),
                'title' => __('Recipient'),
                'required' => true,
            ]
        );

        $fieldSet->addField(
            'country_id',
            'text',
            [
                'name' => 'country_id',
                'label' => __('Country'),
                'title' => __('Country'),
                'required' => true,
            ]
        );

        $fieldSet->addField(
            'region_id',
            'text',
            [
                'name' => 'region_id',
                'label' => __('State/Province'),
                'title' => __('State/Province'),
                'required' => true,
            ]
        );

        $fieldSet->addField(
            'city',
            'text',
            [
                'name' => 'city',
                'label' => __('City'),
                'title' => __('City'),
                'required' => true,
            ]
        );

        $fieldSet->addField(
            'street',
            'text',
            [
                'name' => 'street',
                'label' => __('Street'),
                'title' => __('Street'),
                'required' => true,
            ]
        );

        $fieldSet->addField(
            'telephone',
            'text',
            [
                'name' => 'telephone',
                'label' => __('Telephone'),
                'title' => __('Telephone'),
                'required' => true,
            ]
        );

        $fieldSet->addField(
            'customer_email',
            'text',
            [
                'name' => 'customer_email',
                'label' => __('E-mail'),
                'title' => __('E-mail'),
                'required' => true,
            ]
        );

        $fieldSet->addField(
            'postcode',
            'text',
            [
                'name' => 'postcode',
                'label' => __('Cod postal'),
                'title' => __('Cod postal'),
                'required' => false,
            ]
        );

        if ($model->getId()) {
            $fieldSet->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        }

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
        return __('Address');
    }

    /**
     * Prepare title for tab
     *
     * @return Phrase
     */
    public function getTabTitle()
    {
        return __('Address');
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
