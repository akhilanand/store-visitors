<?php
declare(strict_types=1);

namespace AK\StoreVisitor\Api\Data;

interface VisitorsSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get visitors list.
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface[]
     */
    public function getItems();

    /**
     * Set visitor_id list.
     * @param \AK\StoreVisitor\Api\Data\VisitorsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

