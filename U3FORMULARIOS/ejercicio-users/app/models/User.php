<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Region.php";
class User
{
    public function __construct(
        private String $name,
        private String $email,
        private String $pass,
        private Region $region,
        private int $id = -1,
    ) {}

    public function __toString(): string
    {
        return $this->name . " | " .
            $this->email . " | " .
            $this->region->value . " | " . 
            $this->id;
    }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Get the value of pass
         */ 
        public function getPass()
        {
                return $this->pass;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
}
