<?php
interface BookTypeRepositoryInterface{
    public function all():array;
    public function save(BookType $bookType):void;
}