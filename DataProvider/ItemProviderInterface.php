<?php
declare(strict_types=1);
namespace Yireo\AdminSimpleSearchFields\DataProvider;


use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;

interface ItemProviderInterface extends ArgumentInterface
{
    /**
     * @return DataObject[]
     */
    public function getItems(): array;
    
    public function getSearch(): string;
    
    public function getLimit(): int;
    
    public function getPage(): int;
}