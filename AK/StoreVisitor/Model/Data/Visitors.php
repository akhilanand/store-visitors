<?php
declare(strict_types=1);

namespace AK\StoreVisitor\Model\Data;

use AK\StoreVisitor\Api\Data\VisitorsInterface;

class Visitors extends \Magento\Framework\Api\AbstractExtensibleObject implements VisitorsInterface
{

    /**
     * Get visitors_id
     * @return string|null
     */
    public function getVisitorsId()
    {
        return $this->_get(self::VISITORS_ID);
    }

    /**
     * Set visitors_id
     * @param string $visitorsId
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setVisitorsId($visitorsId)
    {
        return $this->setData(self::VISITORS_ID, $visitorsId);
    }

    /**
     * Get visitor_id
     * @return string|null
     */
    public function getVisitorId()
    {
        return $this->_get(self::VISITOR_ID);
    }

    /**
     * Set visitor_id
     * @param string $visitorId
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setVisitorId($visitorId)
    {
        return $this->setData(self::VISITOR_ID, $visitorId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \AK\StoreVisitor\Api\Data\VisitorsExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \AK\StoreVisitor\Api\Data\VisitorsExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \AK\StoreVisitor\Api\Data\VisitorsExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get store_id
     * @return string|null
     */
    public function getStoreId()
    {
        return $this->_get(self::STORE_ID);
    }

    /**
     * Set store_id
     * @param string $storeId
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * Get store_code
     * @return string|null
     */
    public function getStoreCode()
    {
        return $this->_get(self::STORE_CODE);
    }

    /**
     * Set store_code
     * @param string $storeCode
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setStoreCode($storeCode)
    {
        return $this->setData(self::STORE_CODE, $storeCode);
    }

    /**
     * Get store_name
     * @return string|null
     */
    public function getStoreName()
    {
        return $this->_get(self::STORE_NAME);
    }

    /**
     * Set store_name
     * @param string $storeName
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setStoreName($storeName)
    {
        return $this->setData(self::STORE_NAME, $storeName);
    }

    /**
     * Get visitors_count
     * @return string|null
     */
    public function getVisitorsCount()
    {
        return $this->_get(self::VISITORS_COUNT);
    }

    /**
     * Set visitors_count
     * @param string $visitorsCount
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setVisitorsCount($visitorsCount)
    {
        return $this->setData(self::VISITORS_COUNT, $visitorsCount);
    }

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->_get(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \AK\StoreVisitor\Api\Data\VisitorsInterface
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}

