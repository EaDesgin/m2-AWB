<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Controller\Adminhtml\Index;

use Eadesigndev\Urgent\Model\GenerateAwb;
use Eadesigndev\Nemo\Model\GenerateAwbNemo;
use Eadesigndev\Awb\Model\Awb;
use Eadesigndev\Awb\Model\AwbRepository;
use Eadesigndev\Awb\Model\AwbFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Api\Data\OrderInterface;

class Save extends Action
{
    private $dataPersistor;

    private $awbRepository;

    private $awbFactory;

    public $generateAwb;

    public $generateAwbNemo;

    private $order;

    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        AwbRepository $awbRepository,
        AwbFactory $awbFactory,
        GenerateAwb $generateAwb,
        GenerateAwbNemo $generateAwbNemo,
        OrderInterface $order
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->awbRepository = $awbRepository;
        $this->awbFactory    = $awbFactory;
        $this->generateAwb   = $generateAwb;
        $this->generateAwbNemo   = $generateAwbNemo;
        $this->order = $order;

        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $carrierId = $data['carrier_id'];
        $orderId = $this->order->loadByIncrementId($data['order_id'])->getId();

        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $id = $this->getRequest()->getParam('entity_id');
            if ($id) {
                /** @var Awb $model */
                $model = $this->awbRepository->getById($id);
            } else {
                unset($data['entity_id']);
                /** @var Awb $model */
                $model = $this->awbFactory->create();
            }

            $model->setData($data);
            $model->setData('update_time', time());

            try {
                $this->awbRepository->save($model);
                $this->dataPersistor->clear('awb_data');

                if ($this->getRequest()->getParam('back')) {
                    if ($carrierId == 2) {
                        $this->generateAwbNemo->setGenerateAwb($id);
                        $pickupId = $this->getRequest()->getParam('awb_pickup_id');
                        $awbNumber = $this->generateAwbNemo->generateAwb($id, $orderId, $pickupId);
                        $model->setData('awb_number', $awbNumber);

                        $this->messageManager->addSuccessMessage(__('You NEMO COURIER awb '. $awbNumber .  ' number is generated.'));

                        $model->setData('status', 1);
                        $this->awbRepository->save($model);
                        return $resultRedirect
                                                ->setPath('*/*/index', ['entity_id' => $model->getId(), '_current' => true]);
                    } else {
                        $this->generateAwb->setGenerateAwb($id);
                        $awbNumber = $this->generateAwb->generateAwb($id);
                        $model->setData('awb_number', $awbNumber);

                        $this->messageManager->addSuccessMessage(__('You awb '. $awbNumber .  ' number is generated.'));

                        $model->setData('status', 1);
                        $this->awbRepository->save($model);
                        return $resultRedirect
                                                ->setPath('*/*/index', ['entity_id' => $model->getId(), '_current' => true]);
                    }
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage(
                    $e,
                    __('Something went wrong while aprove the awb.')
                );
            }

            $this->dataPersistor->set('awb_data', $data);
            return $resultRedirect
                ->setPath('*/*/edit', ['entity_id' => $this->getRequest()->getParam('entity_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * Check the permission to run it
     *
     * @return boolean
     */
    //@codingStandardsIgnoreLine
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(Index::ADMIN_RESOURCE);
    }
}
