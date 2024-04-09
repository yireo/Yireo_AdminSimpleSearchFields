<?php
declare(strict_types=1);

namespace Yireo\AdminSimpleSearchFields\DataProvider;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;

class CustomerProvider extends AbstractItemProvider
{
    public function __construct(
        private CustomerRepositoryInterface $customerRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        RequestInterface $request,
    ) {
        parent::__construct($searchCriteriaBuilder, $filterBuilder, $request);
    }
    
    public function getItems(): array
    {
        return $this->customerRepository->getList($this->getSearchCriteria())->getItems();
    }
    
    public function getSearchableFields(): array
    {
        return [
            'first_name',
            'middle_name',
            'last_name',
            'email',
        ];
    }
}
