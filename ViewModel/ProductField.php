<?php
declare(strict_types=1);

namespace Yireo\AdminSimpleSearchFields\ViewModel;

use Yireo\AdminSimpleSearchFields\DataProvider\ItemProviderInterface;
use Yireo\AdminSimpleSearchFields\DataProvider\ProductProvider;

class ProductField implements FieldInterface
{
    public function __construct(
        private readonly ProductProvider $itemProvider,
        private readonly string $fieldName = 'product_id',
        private readonly string $gridLabel = 'Select a product',
        private readonly string $labelAjaxUrl = 'simple_search/preview/product',
        private readonly string $searchAjaxUrl = 'simple_search/grid/product',
    ) {
    }
    
    public function getFieldName(): string
    {
        return $this->fieldName;
    }
    
    public function getGridLabel(): string
    {
        return $this->gridLabel;
    }
    
    public function getLabelAjaxUrl(): string
    {
        return $this->labelAjaxUrl;
    }
    
    public function getSearchAjaxUrl(): string
    {
        return $this->searchAjaxUrl;
    }
    
    public function getItemProvider(): ItemProviderInterface
    {
        return $this->itemProvider;
    }
}