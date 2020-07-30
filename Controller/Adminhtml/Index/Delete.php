<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Controller\Adminhtml\Index;

use Eadesigndev\Awb\Api\AwbRepositoryInterface;
use Eadesigndev\Awb\Model\AwbFactory;
use Eadesigndev\Awb\Model\AwbRepository;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Delete extends Action
{
    const ACTION = 'Eadesigndev_Awb::awb';

    public $resultFactory;

    private $awbRepository;

    private $awbFactory;

    public function __construct(
        Context $context,
        PageFactory $resultFactory,
        AwbRepositoryInterface $awbRepository,
        AwbFactory $awbFactory
    ) {
        $this->resultFactory    = $resultFactory;
        $this->awbRepository    = $awbRepository;
        $this->awbFactory       = $awbFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                /** @var AwbRepository $awb */
                $this->awbRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('The awb has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a page to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
        return $this->_authorization->isAllowed(self::ACTION);
    }
}
