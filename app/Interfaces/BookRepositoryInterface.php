<?php

interface BookRepositoryInterface {
    public function all(): array;
    public function save (Book $book) :void;
}