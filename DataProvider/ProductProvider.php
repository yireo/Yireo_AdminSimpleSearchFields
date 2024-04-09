<?php
declare(strict_types=1);

namespace Yireo\AdminSimpleSearchFields\DataProvider;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;

class ProductProvider extends AbstractItemProvider
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder,
        RequestInterface $request,
    ) {
        parent::__construct($searchCriteriaBuilder, $filterBuilder, $request);
    }
    
    public function getItems(): array
    {
        return $this->productRepository->getList($this->getSearchCriteria())->getItems();
    }
    
    public function getSearchableFields(): array
    {
        return [
            'name',
            'sku',
        ];
    }
}
