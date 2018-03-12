<?php

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
 * @package Eadesigndev\Awb\ModelSource
 */
class Tariff extends AbstractSource
{
    /**
     * DeliveryPayment
     */
    const ACT = 48654;
    const MKT = 64252;
    /**
     * @return array
     */
    public function getAvailable()
    {
        return [
            self::ACT => __('ACT ADD 02.03.2017'),
            self::MKT => __('Tarif MKT Place 5106'),
        ];
    }
}
