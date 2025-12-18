<?php

class Book{
    function __construct(
        private string $isbn,
        private string $tittle,
        private string $author,
        private int $pages,
        private $type = [],
        ){}
}