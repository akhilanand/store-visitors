<?php
declare(strict_types=1);

namespace AK\StoreVisitor\Api\Data;

interface VisitorsInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const VISITORS_COUNT = 'visitors_count';
    const STORE_ID = 'store_id';
    const VISITORS_ID = 'visitors_id';
    const VISITOR_ID = 'visitor_id';
    const STORE_NAME = 'store_name';
    const UPDATED_AT = 'updated_at';
    const STORE_CODE = 'store_code';

    /**
     * Get visitors_id
     * @return string|null
     */
    public function getVisitorsId();

    /**
     * Set visitors_id
     * @param string $visitorsId
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setVisitorsId($visitorsId);

    /**
     * Get visitor_id
     * @return string|null
     */
    public function getVisitorId();

    /**
     * Set visitor_id
     * @param string $visitorId
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setVisitorId($visitorId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \AK\StoreVisitor\Api\Data\VisitorsExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \AK\StoreVisitor\Api\Data\VisitorsExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \AK\StoreVisitor\Api\Data\VisitorsExtensionInterface $extensionAttributes
    );

    /**
     * Get store_id
     * @return string|null
     */
    public function getStoreId();

    /**
     * Set store_id
     * @param string $storeId
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setStoreId($storeId);

    /**
     * Get store_code
     * @return string|null
     */
    public function getStoreCode();

    /**
     * Set store_code
     * @param string $storeCode
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setStoreCode($storeCode);

    /**
     * Get store_name
     * @return string|null
     */
    public function getStoreName();

    /**
     * Set store_name
     * @param string $storeName
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setStoreName($storeName);

    /**
     * Get visitors_count
     * @return string|null
     */
    public function getVisitorsCount();

    /**
     * Set visitors_count
     * @param string $visitorsCount
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setVisitorsCount($visitorsCount);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setUpdatedAt($updatedAt);
}

