<?php
declare(strict_types=1);

namespace AK\StoreVisitor\Model;

use AK\StoreVisitor\Api\Data\VisitorsInterfaceFactory;
use AK\StoreVisitor\Api\Data\VisitorsSearchResultsInterfaceFactory;
use AK\StoreVisitor\Api\VisitorsRepositoryInterface;
use AK\StoreVisitor\Model\ResourceModel\Visitors as ResourceVisitors;
use AK\StoreVisitor\Model\ResourceModel\Visitors\CollectionFactory as VisitorsCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class VisitorsRepository implements VisitorsRepositoryInterface
{

    protected $visitorsCollectionFactory;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    protected $extensionAttributesJoinProcessor;

    protected $visitorsFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataVisitorsFactory;

    private $collectionProcessor;


    /**
     * @param ResourceVisitors $resource
     * @param VisitorsFactory $visitorsFactory
     * @param VisitorsInterfaceFactory $dataVisitorsFactory
     * @param VisitorsCollectionFactory $visitorsCollectionFactory
     * @param VisitorsSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceVisitors $resource,
        VisitorsFactory $visitorsFactory,
        VisitorsInterfaceFactory $dataVisitorsFactory,
        VisitorsCollectionFactory $visitorsCollectionFactory,
        VisitorsSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->visitorsFactory = $visitorsFactory;
        $this->visitorsCollectionFactory = $visitorsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataVisitorsFactory = $dataVisitorsFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \AK\StoreVisitor\Api\Data\VisitorsInterface $visitors
    ) {
        /* if (empty($visitors->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $visitors->setStoreId($storeId);
        } */
        
        $visitorsData = $this->extensibleDataObjectConverter->toNestedArray(
            $visitors,
            [],
            \AK\StoreVisitor\Api\Data\VisitorsInterface::class
        );
        
        $visitorsModel = $this->visitorsFactory->create()->setData($visitorsData);
        
        try {
            $this->resource->save($visitorsModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the visitors: %1',
                $exception->getMessage()
            ));
        }
        return $visitorsModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($visitorsId)
    {
        $visitors = $this->visitorsFactory->create();
        $this->resource->load($visitors, $visitorsId);
        if (!$visitors->getId()) {
            throw new NoSuchEntityException(__('visitors with id "%1" does not exist.', $visitorsId));
        }
        return $visitors->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->visitorsCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \AK\StoreVisitor\Api\Data\VisitorsInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \AK\StoreVisitor\Api\Data\VisitorsInterface $visitors
    ) {
        try {
            $visitorsModel = $this->visitorsFactory->create();
            $this->resource->load($visitorsModel, $visitors->getVisitorsId());
            $this->resource->delete($visitorsModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the visitors: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($visitorsId)
    {
        return $this->delete($this->get($visitorsId));
    }
}

