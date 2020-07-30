<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\ResourceModel;

use Eadesigndev\Awb\Api\Data\AwbInterface;
use Eadesigndev\Awb\Setup\InstallSchema;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

/**
 * Class Awb Resource Model
 * @package Eadesigndev\Awb\Model\ResourceModel
 */
class Awb extends AbstractDb
{
    /**
     * Awb constructor.
     * @param Context $context
     * @param string|null $connectionName
     */
    public function __construct(
        Context $context,
        string $connectionName = null
    ) {
        parent::__construct(
            $context,
            $connectionName
        );
    }

    public function _construct()
    {
        $this->_init(InstallSchema::TABLE, AwbInterface::ENTITY_ID);
    }
}
