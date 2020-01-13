<?php


namespace Rentit;


abstract class Controller implements View, Model {
    protected $request;

    function __construct($request) { $this->request = $request; }

    function error(){ throw new \Exception("[ERROR::]:Non existent method"); }

    public function render(array $dataview = null, string $template = null)
    {
        //var_dump($dataview);
        if ($dataview) {
            extract($dataview);
            include 'Templates/' . $this->request->getController() . '.tpl.php';
            if ($template != "") { include 'Templates/' . $template . '.tpl.php'; }
        }
    }
    function getDB() {
        $db = DB::singleton();
        return $db;
    }

    /*
     * $db      =   BASE DE DATOS
     * $sql     =   SENTENCIA SQL
     * $params  =   PARÁMETROS (VALORES QUE TOMAN NUESTRAS VARIABLES EN LA SENTENCIA SQL)
     */
    protected function query($db, $sql, $params = null) {
        try {
            $stmt = $db->prepare($sql);
            if ($params) { $res = $stmt->execute($params); }
            else { $res = $stmt->execute(); }
            //AQUÍ DEBERÍAMOS USAR $RES PARA HACER UN RETURN DE LA SENTENCIA O BIEN UN ERROR;
            return $stmt;
        }catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    //GENERA EL ARRAY CON LOS RESULTADOS;
    /*
     * Pasamos $stmt que se obtiene de "private function query($db, $sql, $params = null)"
     */
    protected function row_extract_one($stmt) {
        $rows = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $rows;
    }
    protected function row_extracts($stmt) {
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }

}