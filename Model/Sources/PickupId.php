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
            ['value' => '0',         'label' => __('Sediu')],
            ['value' => '22420',     'label' => __('Costin Paun')],
            ['value' => '24509',     'label' => __('George Popescu')],
            ['value' => '24510',     'label' => __('Mihaita Budaca')],
            ['value' => '1001085',   'label' => __('AGT')],
            ['value' => '1002762',   'label' => __('Ionut Burlacu')],
            ['value' => '201003906', 'label' => __('Robert Chirculescu')],
            ['value' => '201156779', 'label' => __('Felco')],
            ['value' => '201157222', 'label' => __('Keiron Al-Ko')],
            ['value' => '201162606', 'label' => __('Keiron Iasi Husqvarna')],
            ['value' => '201173065', 'label' => __('Depozit Honda')],
            ['value' => '201189622', 'label' => __('Nicoro Romania')],
            ['value' => '201194417', 'label' => __('Depozit Marolex')],
            ['value' => '201195321', 'label' => __('Depozit EMT')],
        ];

        return $pickupLocation;
    }

    public function toOptionArray()
    {
        $getAvailable = $this->getAvailable();

        return $getAvailable;
    }
}
