<?php

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
 * @package Eadesigndev\Awb\ModelSource
 */
class CarrierType extends AbstractSource
{
    const URGENT_CURRIER = 1;
    const FAN_CURRIER = 2;

    public function getAvailable()
    {
        return [
            self::URGENT_CURRIER => __('Urgent Currier'),
            self::FAN_CURRIER => __('Fan Currier'),
        ];
    }
}
