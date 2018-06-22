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
    const ACT = 48654;
    const MKT = 64252;

    /**
     * @return array
     */
    public function getAvailable()
    {
        $tariffPlan = [
            self::ACT => __('ACT ADD 02.03.2017'),
            self::MKT => __('Tarif MKT Place 5106'),
        ];

        return $tariffPlan;
    }
}
