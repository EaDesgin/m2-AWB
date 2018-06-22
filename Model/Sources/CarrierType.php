<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class CarrierType
 * @package Eadesigndev\Awb\ModelSource
 */
class CarrierType extends AbstractSource
{
    /**
     * CarrierType
     */
    const URGENT_CURRIER = 0;
    const FAN_CURRIER = 1;

    /**
     * @return array
     */
    public function getAvailable()
    {
        $carrierType = [
            self::URGENT_CURRIER => __('Urgent Currier'),
            self::FAN_CURRIER => __('Fan Currier'),
        ];

        return $carrierType;
    }
}
