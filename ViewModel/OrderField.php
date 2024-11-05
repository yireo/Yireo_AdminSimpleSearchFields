<?php
declare(strict_types=1);

namespace Yireo\AdminSimpleSearchFields\ViewModel;

use Yireo\AdminSimpleSearchFields\DataProvider\ItemProviderInterface;
use Yireo\AdminSimpleSearchFields\DataProvider\OrderProvider;

class OrderField implements FieldInterface
{
    public function __construct(
        private OrderProvider $itemProvider,
        private string $fieldName = 'order_id',
        private string $gridLabel = 'Select a order',
        private string $labelAjaxUrl = 'simple_search/preview/order',
        private string $searchAjaxUrl = 'simple_search/grid/order',
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
