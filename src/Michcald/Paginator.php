<?php

namespace Michcald;

class Paginator
{
    private $totalItems = 0;
    
    private $itemsPerPage = 10;
    
    private $currentPageNumber = 1;
    
    public function setTotalItems($totalItems)
    {
        $this->totalItems = $totalItems;
        
        return $this;
    }
    
    public function getTotalItems()
    {
        return $this->totalItems;
    }
    
    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = (int)$itemsPerPage;
        
        return $this;
    }
    
    public function getNumberOfPages()
    {
        if ($this->totalItems == 0) {
            return 1;
        }
        
        return ceil($this->totalItems / $this->itemsPerPage);
    }
    
    public function setCurrentPageNumber($page)
    {
        $page = abs((int)$page);
        
        $this->currentPageNumber = $page;
        
        return $this;
    }
    
    public function getCurrentPageNumber()
    {
        return $this->currentPageNumber;
    }
    
    public function getPrevPageNumber()
    {
        $prev = $this->currentPageNumber-1;
        
        if($prev < 1) {
            return 1;
        }
        
        if($prev > $this->getNumberOfPages()) {
            return $this->getNumberOfPages();
        }
        
        return $prev;
    }
    
    public function getNextPageNumber()
    {
        $next = $this->currentPageNumber+1;
        
        if($next < 1) {
            return 1;
        }
        
        if($next > $this->getNumberOfPages()) {
            return $this->getNumberOfPages();
        }
        
        return $next;
    }
    
    public function getLimit()
    {
        return $this->itemsPerPage;
    }
    
    public function getOffset()
    {
        return ($this->currentPageNumber - 1) * $this->itemsPerPage;
    }
}
