<?php
declare(strict_types=1);

namespace AK\StoreVisitor\Model\ResourceModel;

class Visitors extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ak_storevisitor_visitors', 'visitors_id');
    }
}

