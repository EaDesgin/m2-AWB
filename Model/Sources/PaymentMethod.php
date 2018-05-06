<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\Sources;

use Eadesigndev\Awb\Helper\Data;

/**
 * Class PaymentMethod
 * @package Eadesigndev\Awb\ModelSource
 */
class PaymentMethod extends AbstractSource
{
    /**
     * @var Data
     */
    public $helper;

    /**
     * PaymentMethod
     */
    const RAMBURS = 0;
    const CONT    = 1;

    public function __construct(
        Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @return array
     */
    public function getAvailable()
    {
        return [
            self::RAMBURS => __('Ramburs'),
            self::CONT => __('Cont Colector'),
        ];
    }
}