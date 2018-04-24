<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class PackageType
 * @package Eadesigndev\Awb\ModelSource
 */
class PackageType extends AbstractSource
{
    /**
     * PackageType
     */
    const COLET = 0;
    const PLIC = 1;

    /**
     * @return array
     */
    public function getAvailable()
    {
        return [
            self::COLET => __('Colet'),
            self::PLIC => __('Plic'),
        ];
    }
}
