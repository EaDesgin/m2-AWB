<?php

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
     * @param $value the template id
     * @return mixed
     */
    public function getById($value);

    /**
     * @param AwbInterface $templates
     * @return mixed
     */
    public function delete(AwbInterface $templates);

    /**
     * @param $value the template id
     * @return mixed
     */
    public function deleteById($value);
}