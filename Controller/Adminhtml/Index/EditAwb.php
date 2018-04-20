<?php

namespace Eadesigndev\AWB\Controller\Adminhtml\Index;

use Eadesigndev\Awb\Api\AwbRepositoryInterface;
use Eadesigndev\Awb\Model\AwbFactory;
use Eadesigndev\Awb\Helper\Data as DataHelper;
use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\View\Result\PageFactory;

class EditAwb extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Eadesigndev_Awb::awb';

    /**
     * @var PageFactory
     */
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
        $this->awbRepository = $awbRepository;
        $this->awbFactory = $awbFactory;
        $this->registry = $registry;
        $this->session = $context->getSession();
        $this->dataHelper = $dataHelper;
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
//        $enabledAwb = $this->dataHelper->isEnabled();
//
//        $enabledUrgent = $this->dataHelper->isEnabledUrgent();
//
//        $userAccount = $this->dataHelper->isUserAccount();
//
//        $clientId = $this->dataHelper->isClientId();

        $model = $this->awbFactory->create();

        /** @var Session $data */
        $data = $this->session->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->registry->register('awb_data', $model);


        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->addBreadcrumb(__('Edit Awb'), __('Edit Awb'));
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Awb'));

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