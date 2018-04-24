<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\AWB\Controller\Adminhtml\Index;

use Eadesigndev\Awb\Api\AwbRepositoryInterface;
use Eadesigndev\Awb\Model\Awb;
use Eadesigndev\Awb\Model\AwbFactory;
use Eadesigndev\Awb\Helper\Data as DataHelper;
use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\View\Result\PageFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Eadesigndev_Awb::awb';

    protected $resultPageFactory;

    private $awbRepository;

    private $awbFactory;

    private $registry;

    private $session;

    private $dataHelper;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        AwbRepositoryInterface $awbRepository,
        AwbFactory $awbFactory,
        Registry $registry,
        DataHelper $dataHelper
    ) {

        $this->resultPageFactory = $resultPageFactory;
        $this->awbRepository     = $awbRepository;
        $this->awbFactory        = $awbFactory;
        $this->registry          = $registry;
        $this->session           = $context->getSession();
        $this->dataHelper        = $dataHelper;
        parent::__construct($context);
    }

    /**
     * Edit action new awb.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        if ($id) {
            $model = $this->awbRepository->getById($id);
            if (!$model->getEntityId()) {
                $this->messageManager->addErrorMessage(__('This field no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        } else {
            $model = $this->awbFactory->create();
        }
        
        /** @var Session $data */
        $data = $this->session->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->registry->register('awb_data', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->addBreadcrumb(__('Edit new Awb'), __('Edit new Awb'));
        $resultPage->getConfig()->getTitle()->prepend(__('Edit new Awb'));

        return $resultPage;
    }

    /**
     * @return bool
     */
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}