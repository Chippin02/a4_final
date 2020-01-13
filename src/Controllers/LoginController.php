<?php


namespace Rentit\Controllers;

use Rentit\Controller;

final class LoginController extends Controller {

    protected $mensaje = "";

    public function __construct($request) {
        parent::__construct($request);

    }
    public function index() {
        $data = ['title'=>'Connectar-me'];
        $this->render($data);
    }

    function error() { throw new \Exception("[ERROR::]:Non existent method"); }


    public function getSingleResult($sql, $params = null)
    {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extract_one($sentencia);
        return $resultados;
    }

    public function getResults($sql, $params = null)
    {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extracts($sentencia);
        return $resultados;
    }

    public function connectarme() {
        if (isset($_POST)) {
            $params = [':usuari' => $_POST['usuari'],
                ':contrasenya' => $_POST['contrasenya']];
            $sentencia = "SELECT * FROM usuaris WHERE usuari = :usuari AND contrasenya = :contrasenya;";
            $existe = $this->getSingleResult($sentencia, $params);
            if (is_array($existe)) {
                session_start();
                $_SESSION['usuari'] = $_POST['usuari'];
                header('location:/');
                return true;
            }
            else {
                echo '<script>
                        alert("No existeixen aquestes dades");
                        window.location.href="/login";
                      </script>';
                return false;
            }
        }
        else {
            return false;
        }

    }
}