<?php

namespace Eadesigndev\Awb\Model;

use Eadesigndev\Awb\Api\Data\AwbInterface;
use Eadesigndev\Awb\Api\AwbRepositoryInterface;
use Eadesigndev\Awb\Model\ResourceModel\Awb as AwbResourceModel;
use Magento\Framework\Exception\LocalizedException as Exception;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class AwbRepository
 * @package Eadesigndev\Awb\Model
 */
class AwbRepository implements AwbRepositoryInterface
{
    /**
     * @var array
     */
    private $instances = [];

    /**
     * @var AwbResourceModel
     */
    private $resource;

    /**
     * @var AwbInterface
     */
    private $awb;

    /**
     * @var AwbFactory
     */
    private $AwbFactory;

    /**
     * @var ManagerInterface
     */
    private $messageManager;

    /**
     * AwbRepository constructor.
     * @param AwbResourceModel $resource
     * @param AwbInterface $awb
     * @param AwbFactory $AwbFactory
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        AwbResourceModel $resource,
        AwbInterface $awb,
        AwbFactory $AwbFactory,
        ManagerInterface $messageManager
    ) {
        $this->resource       = $resource;
        $this->awb         = $awb;
        $this->AwbFactory  = $AwbFactory;
        $this->messageManager = $messageManager;
    }

    /**
     * @param AwbInterface $awb
     * @return AwbInterface
     * @throws \Exception
     */
    public function save(AwbInterface $awb)
    {
        try {
            $this->resource->save($awb);
        } catch (Exception $e) {
            $this->messageManager
                ->addExceptionMessage(
                    $e,
                    'There was a error while saving the awb '. $e->getMessage()
                );
        }

        return $awb;
    }

    /**
     * @param $awbId
     * @return array
     */
    public function getById($awbId)
    {
        if (!isset($this->instances[$awbId])) {
            $awb = $this->AwbFactory->create();
            $this->resource->load($awb, $awbId);
            $this->instances[$awbId] = $awb;
        }
        return $this->instances[$awbId];
    }

    /**
     * @param AwbInterface $awb
     * @return bool
     * @throws \Exception
     */
    public function delete(AwbInterface $awb)
    {
        $id = $awb->getId();
        try {
            unset($this->instances[$id]);
            $this->resource->delete($awb);
        } catch (Exception $e) {
            $this->messageManager
                ->addExceptionMessage($e, 'There was a error while deleting the awb');
        }
        unset($this->instances[$id]);
        return true;
    }

    /**
     * @param $awbId
     * @return bool
     * @throws \Exception
     */
    public function deleteById($awbId)
    {
        $awb = $this->getById($awbId);
        return $this->delete($awb);
    }

    /**
     * @param AwbInterface $awb
     * @return bool
     * @throws \Exception
     */
    public function saveAndDelete(AwbInterface $awb)
    {
        $awb->setData(Data::ACTION, Data::DELETE);
        $this->save($awb);
        return true;
    }

    /**
     * @param $awbId
     * @return bool
     * @throws \Exception
     */
    public function saveAndDeleteById($awbId)
    {
        $awb = $this->getById($awbId);
        return $this->saveAndDelete($awb);
    }
}