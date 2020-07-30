<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Block\Adminhtml\Xtea\Edit;

use Magento\Backend\Block\Widget\Tabs as WidgetTabs;

/**
 * Admin page left menu Date AWB
 */
class Tabs extends WidgetTabs
{
    /**
     * @return void
     */
    public function _construct()
    {
        parent::_construct();
        $this->setId('xtea_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Date AWB'));
    }

    protected function _beforeToHtml()
    {
        return parent::_beforeToHtml();
    }
}
