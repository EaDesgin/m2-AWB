<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\Sources;

use Eadesigndev\Urgent\Helper\ConnectUrgent;

/**
 * Class Tariff
 * @package Eadesigndev\Awb\ModelSource
 */
class Tariff extends AbstractSource
{
    /**
     * @var ConnectUrgent
     */
    private $connectUrgent;

    /**
     * Tariff constructor.
     * @param ConnectUrgent $connectUrgent
     */
    public function __construct(
        ConnectUrgent $connectUrgent
    ) {
        $this->connectUrgent     = $connectUrgent;
    }

    /**
     * @param $array
     * @param $key
     * @param $value
     * @return array
     */
    public function toOptionArrayReplaceList($array, $key, $value): ?array
    {
        if (!empty($array)) {
            $return = [];
            foreach ($array as $element) {
                $return[$element[$key]] = $element[$value];
            }
            return $return;
        }
    }

    /**
     * @return array
     */
    public function getAvailable(): array
    {
        $connectUrgent = $this->connectUrgent;
        $tariffPlan = $connectUrgent->connect('PriceTables', \Zend_Http_Client::GET);
        if ($tariffPlan != '"Failed to authenticate!"') {
            return $this->toOptionArrayReplaceList($tariffPlan, 'PriceTableId', 'Name');
        }
        return ['0'=> 'Failed to authenticate!'];
    }
}
