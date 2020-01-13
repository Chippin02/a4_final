<?php


namespace Rentit;


interface Model
{
    //FUNCIÓN ENCARGADA DE ACCEDER A LA BASE DE DATOS
    public function getDB();
    //FUNCIÓN ENCARGADA DE OBTENER DAO (OBJETO DE ACCESO A DATOS) SINGLE RESULTS
    public function getSingleResult($sql, $params = null);
    //FUNCIÓN ENCARGADA DE OBTENER DAO (OBJETO DE ACCESO A DATOS) VARIOS RESULTADOS
    public function getResults($sql, $params = null);
}