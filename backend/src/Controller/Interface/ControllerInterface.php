<?php


interface ControllerInterface
{
    public function read();
    public function create();
    public function save();
    public function delete();
    public function update();
}