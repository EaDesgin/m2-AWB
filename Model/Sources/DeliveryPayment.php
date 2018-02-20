<?php

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
 * @package Eadesigndev\Awb\ModelSource
 */
class DeliveryPayment extends AbstractSource
{

    public function getAvailable()
    {
        return [
            'boolean' => __('Yes/No'),
        ];
    }
}
