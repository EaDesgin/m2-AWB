<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Api;

use Eadesigndev\Awb\Api\Data\AwbInterface;

interface AwbRepositoryInterface
{
    /**
     * @param AwbInterface $templates
     * @return mixed
     */
    public function save(AwbInterface $templates);

    /**
     * @param $value
     * @return mixed
     */
    public function getById($value);

    /**
     * @param AwbInterface $templates
     * @return mixed
     */
    public function delete(AwbInterface $templates);

    /**
     * @param $value
     * @return mixed
     */
    public function deleteById($value);
}
