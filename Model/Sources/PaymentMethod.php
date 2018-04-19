<?php

namespace Eadesigndev\Awb\Model\Sources;

use Eadesigndev\Awb\Helper\Data;

/**
 * Class PaymentMethod
 * @package Eadesigndev\Awb\ModelSource
 */
class PaymentMethod extends AbstractSource
{
    /**
     * @var Data
     */
    public $helper;

    /**
     * PaymentMethod
     */
    const SELECT = 1;
    const RAMBURS = 2;
    const CONT = 3;

    public function __construct(
        Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * @return array
     */
    public function getAvailable()
    {
        return [
            self::SELECT => __('Select'),
            self::RAMBURS => __('Ramburs'),
            self::CONT => __('Cont Colector'),
        ];
    }
}