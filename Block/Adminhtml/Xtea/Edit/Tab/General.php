<?php

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
use Magento\Backend\Block\Store\Switcher\Form\Renderer\Fieldset\Element;

/**
 * Class Main
 * @package Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit\Tab
 */
class General extends Generic implements TabInterface
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

        parent::__construct($context, $registry, $formFactory, $data);
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


        if ($inputType = $model->getRecipient('recipient')) {
        }

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

        if ($inputType = $model->getCountryId('country_id')) {
        }

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

        if ($inputType = $model->getRegionId('region_id')) {
        }

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

        if ($inputType = $model->getCity('city')) {
        }

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

        if ($inputType = $model->getStreet('street')) {
        }

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

        if ($inputType = $model->getPostcode('postcode')) {
        }

        $fieldSet->addField(
            'postcode',
            'text',
            [
                'name' => 'postcode',
                'label' => __('Cod postal'),
                'title' => __('Cod postal'),
                'required' => true,
            ]
        );

        if ($inputType = $model->getTelephone('telephone')) {
        }

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

        if ($inputType = $model->getCustomerEmail('customer_email')) {
        }

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