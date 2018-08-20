<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class DeliveryPayment
 * @package Eadesigndev\Awb\ModelSource
 */
class DeliveryPayment extends AbstractSource
{
    /**
     * DeliveryPayment
     */
    const EXPEDITOR = 0;
    const DESTINATAR = 1;

    /**
     * @return array
     */
    public function getAvailable()
    {
        $deliveryPayment = [
            self::EXPEDITOR => __('Expeditor'),
            self::DESTINATAR => __('Destinatar'),
        ];

        return $deliveryPayment;
    }
}
