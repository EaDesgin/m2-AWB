<?php

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
 * @package Eadesigndev\Awb\ModelSource
 */
class DeliveryPayment extends AbstractSource
{
    /**
     * DeliveryPayment
     */
    const DESTINATAR = 0;
    const EXPEDITOR = 1;
    /**
     * @return array
     */
    public function getAvailable()
    {
        return [
            self::DESTINATAR => __('Destinatar'),
            self::EXPEDITOR => __('Expeditor'),
        ];
    }
}
