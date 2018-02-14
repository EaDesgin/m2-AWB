<?php

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
                'customer-email',
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
                'livrare_sambata',
                Table::TYPE_BOOLEAN,
                null,
                ['unsigned' => true,
                    'nullable' => false,
                    'default' => '0'],
                'Open package'
            )->addColumn(
                'deschidere_colet',
                Table::TYPE_BOOLEAN,
                null,
                ['unsigned' => true,
                    'nullable' => false,
                    'default' => '0'],
                'Store id'
            )->addColumn(
                'plan_tarifar',
                Table::TYPE_TEXT,
                255,
                [],
                'Tariff plan'
            )->addColumn(
                'valoare_comanda',
                Table::TYPE_DECIMAL,
                '12,2',
                [],
                'Order value'
            )->addColumn(
                'company',
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
