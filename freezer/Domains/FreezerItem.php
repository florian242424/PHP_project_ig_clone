<?php
class Domains_FreezerItem extends Domains_Base {
    public function __construct($data) {
        $this->data = [
            "id" => null,
            "name" => null,
            "entry" => null,
            "description" => null,
            "exp" => null
        ];
        parent::__construct($data);
    }
}