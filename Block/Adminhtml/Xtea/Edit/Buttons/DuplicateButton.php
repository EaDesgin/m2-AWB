<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */
namespace Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit\Buttons;

use Eadesigndev\Awb\Controller\Adminhtml\Index\Index;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DuplicateButton
 */
class DuplicateButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        /**
         * to do duplicate to a awb
         */
        $data = [];
        if ($this->_isAllowedAction(Index::ADMIN_RESOURCE)) {
                $data = [
                    'label' => __('Duplicate'),
                    'class' => 'duplicate',
                    'on_click' => sprintf("location.href = '%s';", $this->getDuplicateUrl()),
                    'sort_order' => 20,
                ];
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getDuplicateUrl()
    {
        return $this->getUrl(
            '*/*/duplicate',
            [
                'entity_id' => $this->getEntityId()
            ]
        );
    }
}