<?php

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
 * @package Eadesigndev\Awb\ModelSource
 */
class PickupId extends AbstractSource
{
    const PICKUP = 1;

    public function getAvailable()
    {
        return [
            self::PICKUP => __('test'),
        ];
    }
}
