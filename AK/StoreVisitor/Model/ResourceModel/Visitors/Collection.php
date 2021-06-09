<?php
declare(strict_types=1);

namespace AK\StoreVisitor\Model\ResourceModel\Visitors;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'visitors_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \AK\StoreVisitor\Model\Visitors::class,
            \AK\StoreVisitor\Model\ResourceModel\Visitors::class
        );
    }
}

