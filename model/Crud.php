<?php
    interface Crud{
        public function create();
        public function read();
        public function update($valores);
        public function delete();
    }