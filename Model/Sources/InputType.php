<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class InputType
 * @package Eadesigndev\Awb\ModelSource
 */
class InputType extends AbstractSource
{
    public function getAvailable()
    {
        $inputType = [
                'text' => __('Text Field'),
                'textarea' => __('Text Area'),
                'date' => __('Date & Time'),
                'boolean' => __('Yes/No'),
                'multiselect' => __('Multiple Select'),
                'select' => __('Dropdown'),
            ];

        return $inputType;
    }
}
