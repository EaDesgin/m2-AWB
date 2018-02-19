<?php

namespace Eadesigndev\Awb\Model;

use Eadesigndev\Awb\Api\Data\AwbInterface;
use Magento\Framework\ObjectManagerInterface;

class AwbFactory implements AwbFactoryInterface
{
    /**
     * Object Manager instance
     *
     * @var ObjectManagerInterface
     */
    private $objectManager = null;

    /**
     * Instance name to create
     *
     * @var string
     */
    private $instanceName = null;

    /**
     * AwbFactory constructor.
     * @param ObjectManagerInterface $objectManager
     * @param $instanceName
     */
    public function __construct(ObjectManagerInterface $objectManager, $instanceName = AwbInterface::class)
    {
        $this->objectManager = $objectManager;
        $this->instanceName = $instanceName;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data = [])
    {
        return $this->objectManager->create($this->instanceName, $data);
    }
}