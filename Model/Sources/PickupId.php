<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model\Sources;

/**
 * Class PickupId
 * @package Eadesigndev\Awb\ModelSource
 */
class PickupId extends AbstractSource
{
    const AWB_PICKUP_ID = 1;

    /**
     * @return array
     * @deprecated
     */
    public function getAvailable()
    {
        $pickupLocation = [
            ['value' => '22420',   'label' => __('Magazia Lu Costica - Online')],
            ['value' => '1001085',   'label' => __('Depozit AGT')],
            ['value' => '201239786', 'label' => __('Depozit Dakard')],
            ['value' => '201195321', 'label' => __('Depozit EMT')],
            ['value' => '201156779', 'label' => __('Depozit Felco')],
            ['value' => '201214339', 'label' => __('Depozit Fiskars')],
            ['value' => '201173065', 'label' => __('Depozit Honda')],
            ['value' => '201194417', 'label' => __('Depozit Marolex')],
            ['value' => '201251525', 'label' => __('Depozit Proenerg')],
            ['value' => '201252060', 'label' => __('Depozit Proenerg Cernica')],
            ['value' => '201240279', 'label' => __('Depozit Scule')],
            ['value' => '201198698', 'label' => __('Depozit SOLO')],
            ['value' => '201162606', 'label' => __('Depozit Husqvarna Iasi')],
        ];

        return $pickupLocation;
    }

    public function toOptionArray()
    {
        $getAvailable = $this->getAvailable();

        return $getAvailable;
    }
}
