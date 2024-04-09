<?php
declare(strict_types=1);

namespace Yireo\AdminSimpleSearchFields\DataProvider;

use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

class OrderProvider extends AbstractItemProvider
{
    public function __construct(
        private OrderRepositoryInterface $orderRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        RequestInterface $request,
    ) {
        parent::__construct($searchCriteriaBuilder, $filterBuilder, $request);
    }
    
    public function getItems(): array
    {
        return $this->orderRepository->getList($this->getSearchCriteria())->getItems();
    }
    
    public function getSearchableFields(): array
    {
        return [
            'increment_id',
        ];
    }
}
