<?php


namespace Rentit\Controllers;

use Rentit\Controller;


final class SignupController extends Controller
{

    public function __construct($request)
    {
        parent::__construct($request);

    }

    public function index()
    {
        $data = ['title' => 'Registrar-me'];
        $this->render($data);
    }

    function error()
    {
        throw new \Exception("[ERROR::]:Non existent method");
    }

    public function getSingleResult($sql, $params = null)
    {
        $db = $this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extract_one($sentencia);
        return $resultados;
    }

    public function getResults($sql, $params = null)
    {
        $db = $this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extracts($sentencia);
        return $resultados;
    }

    public function existsAccount($variables)
    {
        $field = "";
        $params = [':usuari' => $variables['usuari'],
            ':mail' => $variables['mail']];
        if ($variables['telefon'] != "") {
            $field = "OR telefon = :telefon";
            $params += [':telefon' => $variables['telefon']];
        }
        $sentencia = "SELECT * FROM usuaris WHERE usuari = :usuari OR mail = :mail " . $field . ";";
        return $this->getSingleResult($sentencia, $params);
    }

    public function signUp($variables) {
        $field = "";
        $params = [':usuari' => $variables['usuari'],
            ':contrasenya' => $variables['contrasenya'],
            ':mail' => $variables['mail'],
            ':nom' => $variables['nom'],
            ':cognoms' => $variables['cognoms'],
            ':compte' => $variables['compte']];
        if ($variables['telefon'] != "") {
            $field = "telefon, ";
            $value = ":telefon, ";
            $params += [':telefon' => $variables['telefon']];
        }
        $sentencia = "INSERT INTO usuaris (usuari, contrasenya, mail, ".$field."nom, cognoms, idTipusCompte) VALUES (:usuari, :contrasenya, :mail, ".$value.":nom, :cognoms, :compte);";
        return $this->getSingleResult($sentencia, $params);
    }
}