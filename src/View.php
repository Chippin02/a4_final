<?php


namespace Rentit;


interface View {
    public function render(Array $dataview, string $template);
}