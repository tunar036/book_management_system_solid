<?php

abstract class AbstractBookRepository implements BookRepositoryInterface{
    abstract public function all(): array;
    abstract public function save (Book $book) :void;
}