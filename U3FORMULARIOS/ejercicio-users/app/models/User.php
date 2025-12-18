<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Region.php";
class User
{
    public function __construct(
        private String $name,
        private String $email,
        private String $pass,
        private Region $region,
    ) {}

    public function __toString(): string
    {
        return $this->name . " | " .
            $this->email . " | " .
            $this->region->value;
    }
}
