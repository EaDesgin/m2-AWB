<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class PostActionsNemo extends Column
{
    /** Url path */
    const AWB_TEMPLATE_EDIT = 'shipping_awb/index/edit';
    const AWB_NEMO_TEMPLATE_EDIT = 'shipping_awb_nemo/index/edit';
    const AWB_TEMPLATE_DELETE = 'shipping_awb/index/delete';


    /** @var UrlInterface */
    private $urlBuilder;

    /**
     * @var string
     */
    private $editUrl;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     * @param string $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::AWB_TEMPLATE_EDIT,
        $editUrlNemo = self::AWB_NEMO_TEMPLATE_EDIT
    ) {
        $this -> urlBuilder = $urlBuilder;
        $this -> editUrl = $editUrl;
        $this -> editUrlNemo = $editUrlNemo;
        parent ::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this -> getData('name');
                if (isset($item['entity_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this -> urlBuilder -> getUrl(
                            $this -> editUrlNemo,
                            ['entity_id' => $item['entity_id']]
                        ),
                        'label' => __('Edit')
                    ];

                    $item[$name]['print'] = [
                        'target' => '_blank',
                        'href' => 'https://app.nemoexpress.ro/nemo/Main?menu=awbs&id=' . $item['awb_number'] . '&printPDF=true',
                        'label' => __('Print')
                    ];
                }
            }
        }

        return $dataSource;
    }
}
