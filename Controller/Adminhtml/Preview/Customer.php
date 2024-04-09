<?php
/**
 * AdminSimpleSearchFields plugin for Magento
 *
 * @author      Yireo (https://www.yireo.com/)
 * @copyright   Copyright 2017 Yireo (https://www.yireo.com/)
 * @license     Open Source License (OSL v3)
 */

declare(strict_types=1);

namespace Yireo\AdminSimpleSearchFields\Controller\Adminhtml\Preview;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class Customer implements HttpPostActionInterface, HttpGetActionInterface
{
    /**
     * @param CustomerRepositoryInterface $customerRepository
     * @param Http $request
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        private CustomerRepositoryInterface $customerRepository,
        private Http $request,
        private JsonFactory $resultJsonFactory
    ) {
    }
    
    public function execute()
    {
        $id = (int) $this->request->getParam('id');
        if (!$id > 0) {
            return $this->json('No data found');
        }
        
        try {
            $customer = $this->customerRepository->getById($id);
        } catch (NoSuchEntityException $e) {
            return $this->json('No data found');
        }
        
        return $this->json($customer->getName() . ' (' . $customer->getEmail() . ')');
    }
    
    private function json($text)
    {
        return $this->resultJsonFactory->create()->setData(['text' => $text]);
    }
}
