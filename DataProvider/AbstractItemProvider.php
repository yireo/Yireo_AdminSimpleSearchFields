<?php

declare(strict_types=1);

namespace Yireo\AdminSimpleSearchFields\DataProvider;


use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteria;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;

abstract class AbstractItemProvider implements ItemProviderInterface
{
    public function __construct(
        protected SearchCriteriaBuilder $searchCriteriaBuilder,
        protected FilterBuilder $filterBuilder,
        protected RequestInterface $request
    ) {
    }

    abstract public function getItems(): array;

    abstract public function getSearchableFields(): array;

    public function getSearchCriteria(): SearchCriteria
    {
        $this->searchCriteriaBuilder->setPageSize($this->getLimit());
        $this->searchCriteriaBuilder->setCurrentPage($this->getPage());

        if ($this->hasSearch()) {
            $this->searchCriteriaBuilder->addFilters($this->getSearchFilters());
        }

        return $this->searchCriteriaBuilder->create();
    }

    public function getSearch(): string
    {
        return (string)$this->request->getParam('search');
    }

    public function getSearchFilters(): array
    {
        $filters = [];
        foreach ($this->getSearchableFields() as $searchableField) {
            $filters[] = $this->filterBuilder
                ->setField($searchableField)
                ->setConditionType('like')
                ->setValue('%'.$this->getSearch().'%')
                ->create();
            }

        return $filters;
    }

    public function hasSearch(): bool
    {
        $search = $this->getSearch();
        return !empty($search);
    }

    public function getLimit(): int
    {
        $limit = (int)$this->request->getParam('limit');
        if ($limit) {
            return $limit;
        }

        return 10;
    }

    public function getPage(): int
    {
        $page = (int)$this->request->getParam('page');
        if ($page) {
            return $page;
        }

        return 0;
    }
}
