<?php


namespace Rentit\Controllers;


use Rentit\Controller;

final class UserController extends Controller {

    public function __construct($request) {
        parent::__construct($request);
    }

    public function index() {
        $data = ['title'=>'El meu perfil'];
        $this->getDB();
        $this->render($data);
    }

    function error() { throw new \Exception("[ERROR::]:Non existent method"); }

    public function getSingleResult($sql, $params = null) {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extract_one($sentencia);
        return $resultados;
    }

    public function getResults($sql, $params = null) {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extracts($sentencia);
        return $resultados;
    }

}