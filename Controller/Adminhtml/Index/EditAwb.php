<?php

namespace Eadesigndev\AWB\Controller\Adminhtml\Index;

use Eadesigndev\Awb\Api\AwbRepositoryInterface;
use Eadesigndev\Awb\Model\Awb;
use Eadesigndev\Awb\Model\AwbFactory;
use Eadesigndev\Awb\Helper\Data as DataHelper;
use Eadesigndev\Urgent\Model\ShipmentData;
use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Request\Http;

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

    protected $request;

    private $awbRepository;

    private $awbFactory;

    private $registry;

    private $session;

    private $dataHelper;

    private $shipmentData;


    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        AwbRepositoryInterface $awbRepository,
        AwbFactory $awbFactory,
        ShipmentData $shipmentData,
        Registry $registry,
        DataHelper $dataHelper,
        Http $request
    ) {
        $this->request = $request;
        $this->resultPageFactory = $resultPageFactory;
        $this->awbRepository = $awbRepository;
        $this->awbFactory = $awbFactory;
        $this->shipmentData = $shipmentData;
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
        /** @var Awb $model */
        $model = $this->awbFactory->create();

        $shipmentId = $this->request->getParam('shipment_id');
        $orderId = $this->request->getParam('order_id');
        $carrierType = $this->request->getParam('carrier_id');


        $this->shipmentData->setAwbData($shipmentId, $orderId, $carrierType);
        $data = $this->shipmentData->getAwbData();

        $model->setData($data);


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