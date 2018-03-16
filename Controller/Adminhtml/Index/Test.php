<?php

namespace Eadesigndev\Awb\Controller\Adminhtml\Index;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * Handles the config and other settings
 *
 * Class Data
 * @package Eadesigndev\Awb\Controller\Adminhtml\Index
 */
class Test extends AbstractHelper
{
    const STORE_CONFIG = 'eadesign_awb/awb_config/update_period';

    /**
     * @var ScopeConfigInterface
     */
    public $config;

    /**
     * Data constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        $this->config = $context->getScopeConfig();
        parent::__construct($context);
    }

    /**
     * @param string $configPath
     * @return bool
     */
    public function getConfig($configPath)
    {
        return $this->config->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE
        );
    }

    public function period($storeConfig = self::STORE_CONFIG){

        return $this->getConfig($storeConfig);
    }
}