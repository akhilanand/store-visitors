<?php
declare(strict_types=1);

namespace AK\StoreVisitor\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface VisitorsRepositoryInterface
{

    /**
     * Save visitors
     * @param \AK\StoreVisitor\Api\Data\VisitorsInterface $visitors
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \AK\StoreVisitor\Api\Data\VisitorsInterface $visitors
    );

    /**
     * Retrieve visitors
     * @param string $visitorsId
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($visitorsId);

    /**
     * Retrieve visitors matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AK\StoreVisitor\Api\Data\VisitorsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete visitors
     * @param \AK\StoreVisitor\Api\Data\VisitorsInterface $visitors
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \AK\StoreVisitor\Api\Data\VisitorsInterface $visitors
    );

    /**
     * Delete visitors by ID
     * @param string $visitorsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($visitorsId);
}

