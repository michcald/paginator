<?php

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class PaginatorTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $pag = new Michcald\Paginator();
        
        $pag->setCurrentPageNumber(3)
            ->setItemsPerPage(20)
            ->setTotalItems(100);
        
        $this->assertEquals($pag->getCurrentPageNumber(), 3);
        $this->assertEquals($pag->getPrevPageNumber(), 2);
        $this->assertEquals($pag->getNextPageNumber(), 4);
        $this->assertEquals($pag->getNumberOfPages(), 5);
        $this->assertEquals($pag->getTotalItems(), 100);
        $this->assertEquals($pag->getLimit(), 20);
        $this->assertEquals($pag->getOffset(), 40);
    }
    
    public function test2Validator()
    {
        $pag = new Michcald\Paginator();
        
        $pag->setCurrentPageNumber(-2)
            ->setItemsPerPage(20)
            ->setTotalItems(100);
        
        $this->assertEquals($pag->getCurrentPageNumber(), 1);
        $this->assertEquals($pag->getPrevPageNumber(), 1);
        $this->assertEquals($pag->getNextPageNumber(), 4);
        $this->assertEquals($pag->getNumberOfPages(), 5);
        $this->assertEquals($pag->getTotalItems(), 100);
        $this->assertEquals($pag->getLimit(), 20);
        $this->assertEquals($pag->getOffset(), 40);
    }
}
