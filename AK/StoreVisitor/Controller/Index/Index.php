<?php
declare(strict_types=1);

namespace AK\StoreVisitor\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magento\Framework\Json\Helper\Data
     */
    protected $jsonHelper;

    /**
     * @var \AK\StoreVisitor\Model\VisitorsFactory
     */
    protected $visitorsFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Json\Helper\Data $jsonHelper
     * @param \Psr\Log\LoggerInterface $logger
     * @param \AK\StoreVisitor\Model\VisitorsFactory $visitors
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \Psr\Log\LoggerInterface $logger,
        \AK\StoreVisitor\Model\VisitorsFactory $visitorsFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->jsonHelper = $jsonHelper;
        $this->logger = $logger;
        $this->context = $context;
        $this->visitorsFactory = $visitorsFactory;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $data = $this->getRequest()->getParams();
            $visitors = $this->visitorsFactory->create();
            $visitors->load($data['code'], 'store_code');
            if ($visitors->getId()) {
                $count = $visitors->getVisitorsCount();
                $count = $count+1;
                $visitors->setVisitorsCount($count);
            } else {
                $datas = [
                    'store_code' => $data['code'],
                    'visitors_count' => 1,
                    'store_name' => $data['name']
                ];
                $visitors->setData($datas);
            }
            $visitors->save();
            return $this->jsonResponse($data);
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            return $this->jsonResponse($e->getMessage());
        } catch (\Exception $e) {
            $this->logger->critical($e);
            return $this->jsonResponse($e->getMessage());
        }
    }

    /**
     * Create json response
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function jsonResponse($response = '')
    {
        return $this->getResponse()->representJson(
            $this->jsonHelper->jsonEncode($response)
        );
    }

    public function getCollection()
    {
        return $this->visitorsFactory->create()->getCollection();
    }
}
