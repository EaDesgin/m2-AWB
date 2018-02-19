<?php

namespace Eadesigndev\Awb\Model\ResourceModel;

use Eadesigndev\Awb\Api\Data\AwbInterface;
use Eadesigndev\Awb\Setup\InstallSchema;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Stdlib\DateTime;
use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Framework\Model\ResourceModel\Db\Context;

/**
 * Class Awb
 * @package Eadesigndev\Awb\Model\ResourceModel
 */
class Awb extends AbstractDb
{
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var DateTime
     */
    private $dateTime;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var MetadataPool
     */
    private $metadataPool;

    /**
     * Awb constructor.
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param DateTime $dateTime
     * @param EntityManager $entityManager
     * @param MetadataPool $metadataPool
     * @param string|null $connectionName
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        DateTime $dateTime,
        EntityManager $entityManager,
        MetadataPool $metadataPool,
        string $connectionName = null
    ) {
        $this->storeManager   = $storeManager;
        $this->dateTime       = $dateTime;
        $this->entityManager  = $entityManager;
        $this->metadataPool   = $metadataPool;

        parent::__construct(
            $context,
            $connectionName
        );
    }

    public function _construct()
    {
        $this->_init(InstallSchema::TABLE, AwbInterface::ENTITY_ID);
    }
}