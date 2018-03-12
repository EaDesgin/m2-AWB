<?php

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
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
        return [
            self::URGENT_CURRIER => __('Urgent Currier'),
            self::FAN_CURRIER => __('Fan Currier'),
        ];
    }
}
