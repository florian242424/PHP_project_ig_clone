<?php
    abstract class Domains_Base implements JsonSerializable {
        protected $data;

        public function __construct($data) {
            $this->data = array_merge($this->data, $data);
        }

        public function jsonSerialize() {
            return $this->data;
        }

        public function __get($name){
            return $this->data[$name];
        }

        public function property_names(){
            return array_keys($this->data);
        }

    }