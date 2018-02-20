<?php
namespace Eadesigndev\Awb\Controller\Adminhtml\Index;

use Eadesigndev\Awb\Api\AwbRepositoryInterface;
use Eadesigndev\Awb\Model\Awb;
use Eadesigndev\Awb\Model\AwbFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Delete extends Action
{
    const ADMIN_RESOURCE = 'Eadesigndev_Awb::awb';

    public $resultFactory;

    private $awbRepository;

    private $awbFactory;

    public function __construct(
        Context $context,
        PageFactory $resultFactory,
        AwbRepositoryInterface $awbRepository,
        AwbFactory $awbFactory
    ) {
        $this->resultFactory = $resultFactory;
        $this->awbRepository = $awbRepository;
        $this->awbFactory = $awbFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
//        $resultRedirect = $this->resultFactory->create();

        if ($id) {
            try {
                /** @var Awb $field */
                $this->awbRepository->saveAndDeleteById($id);
                $this->messageManager->addSuccessMessage(__('The field has been deleted.'));

//                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $ee=  $e->getMessage();
                    $ehhe = '';
//                return $resultRedirect->setPath('*/*/edit', ['entity_id' => $id]);
            }
        }

        exit('we should have deleted');



//        $this->coreRegistry->register('pdfgenerator_template', $model);
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Template') : __('New Template'),
            $id ? __('Edit Template') : __('New Template')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Template'));
        $resultPage->getConfig()->getTitle()
            ->prepend(
                $model->getData('template_id') ? __('Template ') . $model->getTemplateName() : __('New Template')
            );
        return $resultPage;

        $resultPage = $this->resultFactory->create();
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE);
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Fields'));


        return $resultPage;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}