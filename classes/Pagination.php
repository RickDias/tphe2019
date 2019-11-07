<?php
class Pagination {

    public function __construct($pageNum=1, $totalItens=null, $tableBase=null, $itensPerPage=null){
        if(!$pageNum){
            $this->pageNum = 1;
        }else{
            $this->pageNum = $pageNum;
        }
        $this->table = $tableBase;
        $this->itensPerPage = $itensPerPage;
        if((int)$totalItens > 0){
            $this->totalItens = (int)$totalItens;
        }else{
            $this->totalItens = (int)$this->countResults();
        }
        $this->sizePaginator = 3;
        $this->getPagePrev();
        $this->getPageNext();
        $this->getPageNum();
        $this->getPageShow();
        $this->getLimit();
        $this->getOffset();
        $this->getMaxPagination();
        $this->getPaginationLength();
        // return $this->getPagination();
    }

    public function getPageNum(){
        if((!isset($this->pageNum)) or (is_null($this->pageNum))){
            $this->pageNum = 1;
        }else{
            $this->pageNum = $this->pageNum;
        }
        return $this->pageNum;
    }

    public function getTotalItens(){
        return $this->totalItens;
    }

    public function getNumItensPerPage(){
        if(!isset($this->itensPerPage)){
            $this->itensPerPage = 100;
        }
        return $this->itensPerPage;
    }

    public function getPaginationLength(){
        if (!isset($this->PaginationLength)){
            $this->paginationLength = 6;
        }
        return $this->paginationLength;
    }

    public function getMaxPagination(){
        $this->maxPagination = ceil($this->getTotalItens()/$this->getNumItensPerPage());
        return $this->maxPagination;
    }

    public function getLimit(){
        $this->limitSql = $this->itensPerPage;//ceil($this->getPageNum()*$this->getNumItensPerPage());
        return $this->limitSql;
    }

    public function getOffset(){
        // $this->offsetSql = (($this->getPageNum()*$this->getNumItensPerPage())-$this->getPageNum());
        $this->offsetSql = ($this->itensPerPage*$this->pageNum)-$this->limitSql;

        return $this->offsetSql;
    }

    public function getPagePrev(){
        $this->pagePrev = $this->pageNum-($this->sizePaginator);
        if ($this->pagePrev <= 1){
            $this->pagePrev = 1;
        }
        return $this->pagePrev;
    }

    public function getPageNext(){
        $this->pageNext = $this->pageNum+($this->sizePaginator);
        if ($this->pageNext >= $this->getMaxPagination()){
            $this->pageNext = $this->getMaxPagination();
        }
        return $this->pageNext;
    }

    public function getPageShow(){
        $this->pageShow = $this->pageNum+$this->sizePaginator;
        if ($this->pageShow >= $this->maxPagination){
            $this->pageShow = $this->maxPagination;
        }
        return $this->pageShow;
    }

    public function getPagination(){
        $params = [ "pagePrev" => (int)$this->getPagePrev(),
                    "pageNext" => (int)$this->getPageNext(),
                    "pageNum"  => (int)$this->getPageNum(),
                    "pageShow" => (int)$this->getPageShow(),
                    "startLimit" => (int)$this->getStartLimit(),
                    "maxLimit" => (int)$this->getPaginationLength(),
                    ];
        return (object)$params;
    }

    public function countResults()
    {
        $database = new \Connector();
        $db = $database->getDatabaseConnection();
        $count = $db->from($this->table)
                        ->count('*');
        return $count;
    }
}
