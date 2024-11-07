<?php
declare(strict_types=1);

namespace Yireo\AdminSimpleSearchFields\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Yireo\AdminSimpleSearchFields\DataProvider\ItemProviderInterface;

interface FieldInterface extends ArgumentInterface
{
    public function getFieldName(): string;

    public function getGridLabel(): string;

    public function getLabelAjaxUrl(): string;

    public function getSearchAjaxUrl(): string;

    public function getItemProvider(): ItemProviderInterface;
}

