<?php

namespace Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit\Buttons;

use Eadesigndev\Awb\Controller\Adminhtml\Index\Index;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class AprobaAwb
 */
class AprobaAwb extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        /**
         * to do aprove to a awb
         */
        $data = [];
        if ($this->_isAllowedAction(Index::ADMIN_RESOURCE)) {
            $data = [

                'label' => __('Aproba Awb'),
                'class' => 'aproba_awb',
                'on_click' => sprintf("location.href = '%s';", $this->getDuplicateUrl()),
                'sort_order' => 30,
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
            ['entity_id' => $this->getEntityId()]
        );
    }
}