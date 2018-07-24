<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Block\Adminhtml\Xtea;

use Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit\Buttons\DuplicateButton;
use Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit\Buttons\AprobaAwb;
use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Block\Widget\Form\Container;
use Magento\Framework\Registry;

/**
 * Class EditAwb
 * @package Eadesigndev\Awb\Block\Adminhtml\Xtea
 */
class EditAwb extends Container
{
    private $duplicateButton;

    private $aprobaAwb;

    /**
     * Core registry
     * @var Registry
     * @var DuplicateButton
     * @var AprobaAwb
     */

    private $coreRegistry = null;

    public function __construct(
        Context $context,
        Registry $registry,
        DuplicateButton $duplicateButton,
        AprobaAwb $aprobaAwb,
        array $data = []
    ) {

        $this->coreRegistry = $registry;
        $this->duplicateButton = $duplicateButton;
        $this->aprobaAwb = $aprobaAwb;
        parent::__construct(
            $context,
            $data
        );
    }

    /**
     *
     * @return void
     */
    public function _construct()
    {
        $this->_objectId = 'entity_id';
        $this->_blockGroup = 'Eadesigndev_Awb';
        $this->_controller = 'adminhtml_xtea';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save Awb'));

        $duplicate = $this->duplicateButton->getButtonData();

        $this->buttonList->add(
            'duplicate',
            $duplicate
        );

        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => [
                            'event' => 'saveAndContinueEdit',
                            'target' => '#edit_form'
                        ],
                    ],
                ]
            ],
            -100
        );

        $this->buttonList->update(
            'delete',
            'label',
            __('Delete Awb')
        );
    }
}