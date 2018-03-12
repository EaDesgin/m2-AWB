<?php

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
 * @package Eadesigndev\Awb\ModelSource
 */
class PackageType extends AbstractSource
{
    /**
     * DeliveryPayment
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
