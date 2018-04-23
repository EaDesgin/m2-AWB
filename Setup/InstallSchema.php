<?php
/**
 * Copyright © 2018 EaDesign by Eco Active S.R.L. All rights reserved.
 * See LICENSE for license details.
 */

namespace Eadesigndev\Awb\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

//@codingStandardsIgnoreFile

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    const TABLE = 'eadesign_awb';

    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $awbTable = $setup->getTable(self::TABLE);

        if (!$setup->tableExists($awbTable)) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable(self::TABLE)
            )->addColumn(
                'entity_id',
                Table::TYPE_SMALLINT,
                null,
                ['identity' => true,
                    'nullable' => false,
                    'primary' => true],
                'Entity Id'
            )->addColumn(
                'is_active',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true,
                    'nullable' => false,
                    'default' => '1'],
                'Is Active'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'Created At'
            )->addColumn(
                'order_id',
                Table::TYPE_INTEGER,
                19,
                ['nullable' => false,
                    'default' => '0'],
                'Order id'
            )->addColumn(
                'shipping_id',
                Table::TYPE_INTEGER,
                19,
                ['nullable' => false,
                    'default' => '0'],
                'Shipping id'
            )->addColumn(
                'recipient',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Name of recipient'
            )->addColumn(
                'country_id',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Country name'
            )->addColumn(
                'region_id',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Region'
            )->addColumn(
                'city',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'City'
            )->addColumn(
                'street',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Street'
            )->addColumn(
                'telephone',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Telephone number'
            )->addColumn(
                'customer_email',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Customer email'
            )->addColumn(
                'postcode',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Postcode'
            )->addColumn(
                'carrier_id',
                Table::TYPE_INTEGER,
                19,
                ['nullable' => false,
                    'default' => '0'],
                'Carrier id'
            )->addColumn(
                'payment_method',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Payment method'
            )->addColumn(
                'tariff_plan',
                Table::TYPE_TEXT,
                255,
                [],
                'Tariff plan'
            )->addColumn(
                'awb_pickup_id',
                Table::TYPE_INTEGER,
                19,
                ['nullable' => false],
                'Pickup'
            )->addColumn(
                'delivery_payment',
                Table::TYPE_INTEGER,
                19,
                ['nullable' => false],
                'Delivery payment'
            )->addColumn(
                'weight',
                Table::TYPE_DECIMAL,
                '10,2',
                ['nullable' => false],
                'Weight'
            )->addColumn(
                'packages',
                Table::TYPE_INTEGER,
                19,
                ['nullable' => false],
                'Packages'
            )->addColumn(
                'envelopes',
                Table::TYPE_INTEGER,
                19,
                ['nullable' => false],
                'Envelopes'
            )->addColumn(
                'order_value',
                Table::TYPE_DECIMAL,
                '12,2',
                [],
                'Order value'
            )->addColumn(
                'repayment_value',
                Table::TYPE_DECIMAL,
                '10,2',
                ['nullable' => false],
                'Collector account repayment'
            )->addColumn(
                'content',
                Table::TYPE_TEXT,
                500,
                ['nullable' => false],
                'Content'
            )->addColumn(
                'delivery_saturday',
                Table::TYPE_BOOLEAN,
                null,
                ['unsigned' => true,
                    'nullable' => false,
                    'default' => '0'],
                'Delivery saturday'
            )->addColumn(
                'status',
                Table::TYPE_INTEGER,
                19,
                [
                    'nullable' => false,
                    'default' => '0'],
                'Delivery saturday'
            )->addColumn(
                'open_package',
                Table::TYPE_BOOLEAN,
                null,
                ['unsigned' => true,
                    'nullable' => false,
                    'default' => '0'],
                'Open package'
            )->addColumn(
                'comments',
                Table::TYPE_TEXT,
                500,
                [],
                'Comments'
            )->addColumn(
                'delivery_company',
                Table::TYPE_TEXT,
                500,
                [],
                'Delivery company'
            );
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }

}
