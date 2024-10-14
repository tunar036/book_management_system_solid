<?php

abstract class AbstractBookTypeRepository implements BookTypeRepositoryInterface{
    abstract public function all():array;
    abstract public function save(BookType $bookType):void;
}


