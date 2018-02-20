<?php

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
 * @package Eadesigndev\Awb\ModelSource
 */
class Tariff extends AbstractSource
{
    const ACT = 1;

    public function getAvailable()
    {
        return [
            self::ACT => __('test'),
        ];
    }
}
