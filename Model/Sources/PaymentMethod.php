<?php

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
 * @package Eadesigndev\Awb\ModelSource
 */
class PaymentMethod extends AbstractSource
{


    public function getAvailable()
    {
        return [
            'boolean' => __('Yes/No'),
        ];
    }
}
