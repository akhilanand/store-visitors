<?php
declare(strict_types=1);

namespace AK\StoreVisitor\Model;

use AK\StoreVisitor\Api\Data\VisitorsInterface;
use AK\StoreVisitor\Api\Data\VisitorsInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Visitors extends \Magento\Framework\Model\AbstractModel
{

    protected $visitorsDataFactory;

    protected $_eventPrefix = 'ak_storevisitor_visitors';
    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param VisitorsInterfaceFactory $visitorsDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \AK\StoreVisitor\Model\ResourceModel\Visitors $resource
     * @param \AK\StoreVisitor\Model\ResourceModel\Visitors\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        VisitorsInterfaceFactory $visitorsDataFactory,
        DataObjectHelper $dataObjectHelper,
        \AK\StoreVisitor\Model\ResourceModel\Visitors $resource,
        \AK\StoreVisitor\Model\ResourceModel\Visitors\Collection $resourceCollection,
        array $data = []
    ) {
        $this->visitorsDataFactory = $visitorsDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve visitors model with visitors data
     * @return VisitorsInterface
     */
    public function getDataModel()
    {
        $visitorsData = $this->getData();
        
        $visitorsDataObject = $this->visitorsDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $visitorsDataObject,
            $visitorsData,
            VisitorsInterface::class
        );
        
        return $visitorsDataObject;
    }
}

