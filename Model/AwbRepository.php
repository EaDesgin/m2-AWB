<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Model;

use Eadesigndev\Awb\Api\Data\AwbInterface;
use Eadesigndev\Awb\Api\AwbRepositoryInterface;
use Eadesigndev\Awb\Helper\Data;
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
    private $awbResourceModel;

    /**
     * @var AwbInterface
     */
    private $awbInterface;

    /**
     * @var AwbFactory
     */
    private $awbFactory;

    /**
     * @var ManagerInterface
     */
    private $messageManager;

    /**
     * AwbRepository constructor.
     * @param AwbResourceModel $awbResourceModel
     * @param AwbInterface $awbInterface
     * @param AwbFactory $awbFactory
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        AwbResourceModel $awbResourceModel,
        AwbInterface $awbInterface,
        AwbFactory $awbFactory,
        ManagerInterface $messageManager
    ) {
        $this->awbResourceModel = $awbResourceModel;
        $this->awbInterface     = $awbInterface;
        $this->awbFactory       = $awbFactory;
        $this->messageManager   = $messageManager;
    }

    /**
     * @param AwbInterface $awbInterface
     * @return AwbInterface
     * @throws \Exception
     */
    public function save(AwbInterface $awbInterface)
    {
        try {
            $this->awbResourceModel->save($awbInterface);
        } catch (Exception $e) {
            $this->messageManager
                ->addExceptionMessage(
                    $e,
                    'There was a error while saving the awb!'. $e->getMessage()
                );
        }

        return $awbInterface;
    }

    /**
     * @param $awbId
     * @return array
     */
    public function getById($awbId)
    {
        if (!isset($this->instances[$awbId])) {
            $awb = $this->awbFactory->create();
            $this->awbResourceModel->load($awb, $awbId);
            $this->instances[$awbId] = $awb;
        }
        return $this->instances[$awbId];
    }

    /**
     * @param AwbInterface $awbInterface
     * @return bool
     * @throws \Exception
     */
    public function delete(AwbInterface $awbInterface)
    {
        $id = $awbInterface->getId();
        try {
            unset($this->instances[$id]);
            $this->awbResourceModel->delete($awbInterface);
        } catch (\Exception $e) {
            $this->messageManager
                ->addExceptionMessage($e, 'There was a error while deleting the awb!');
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
     * @param AwbInterface $awbInterface
     * @return bool
     * @throws \Exception
     */
    public function saveAndDelete(AwbInterface $awbInterface)
    {
        $awbInterface->setData(Data::ACTION, Data::DELETE);
        $this->save($awbInterface);
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