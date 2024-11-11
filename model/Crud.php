<?php
    interface Crud{
        public function create();
        public function read($valor);
        public function update($valores);
        public function delete();
    }