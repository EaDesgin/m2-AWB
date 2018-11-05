<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class Tariff
 * @package Eadesigndev\Awb\ModelSource
 */
class Tariff extends AbstractSource
{
    /**
     * Tariff
     */
    const ACT = 84828;
    const MKT = 64252;

    /**
     * @return array
     */
    public function getAvailable()
    {
        $tariffPlan = [
            self::ACT => __('Act Add 01.11.2018'),
            self::MKT => __('Tarif MKT Place 5106'),
        ];

        return $tariffPlan;
    }
}
