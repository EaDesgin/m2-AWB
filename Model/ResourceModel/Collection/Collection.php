<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\ResourceModel\Collection;

use Eadesigndev\Awb\Model\Awb as AwbModel;
use Eadesigndev\Awb\Model\ResourceModel\Awb  as AwbResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    //@codingStandardsIgnoreLine
    protected $_idAwbName = 'entity_id';

    /**
     * Init resource model
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            AwbModel::class,
            AwbResourceModel::class
        );
        $this->_map['awb']['entity_id'] = 'main_table.entity_id';
    }

    /**
     * Add filter by store
     *
     * @param int|array|\Magento\Store\Model\Store $store
     * @param bool $withAdmin
     * @return $this
     */
    public function addStoreFilter($store, $withAdmin = true)
    {
        return $this;
    }
}
