<?php

/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class StatusType
 * @package Eadesigndev\Awb\ModelSource
 */
class StatusType extends AbstractSource
{

    const STATUS_ENABLED  = 0;
    const STATUS_DISABLED = 1;

    /**
     * Prepare post's statuses.
     *
     * @return array
     */
    public function getAvailable()
    {
        $status = [
            self::STATUS_ENABLED => __('Nou'),
            self::STATUS_DISABLED => __('Aprobat')
        ];

        return $status;
    }
}