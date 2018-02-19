<?php

namespace Eadesigndev\Awb\Model\Sources;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class AbstractSource
 * @package Eadesigndev\Awb\Model\Source
 */
abstract class AbstractSource implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->getAvailable();
        foreach ($availableOptions as $key => $value) {
            $options[$key] = [
                'label' => $value,
                'value' => $key,
            ];
        }

        return $options;
    }
}
