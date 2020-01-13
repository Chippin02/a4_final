<?php


namespace Rentit;


class App {

    //public $routes=[];

    static function run()
    {
        //Procesado de las REQUEST
        //Hay que construir las rutas para que sólo admitan aquello que esté presente en Controllers

        //Debe ser un método que recoja la ruta y devuelva un array con todas las rutas disponibles (las que están
        //en la carpeta "Controllers"
        $routes = self::getRoutes();
        //var_dump($routes);

        $request = new Request();
        $controller = $request->getController();
        $action = $request->getAction();

        //-------------------------------------------------------------------------------------------------------

        try {
            if (in_array($controller, $routes)) {
                $nameController = '\\Rentit\Controllers\\' . ucfirst($controller). 'Controller';
                $objCont = new $nameController($request);
                if (is_callable([$objCont, $action])) {
                    call_user_func([$objCont, $action]);
                } else {
                    call_user_func([$objCont, 'error']);
                }
            }
            else {
                throw new \Exception("[ERROR]: Ruta no definida");
            }
        }
        catch (\Exception $e) {
            echo $e->getMessage();

        }

    }
    /*
     *  EXTRACTS controller && method
     *  @return array
     */
    static function getRoutes():Array {
        $dir = __DIR__.'/Controllers';
        $handle = opendir($dir);
        while (false != ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $routes[] = strtolower(substr($entry, 0, -14));
            }
        }
        return $routes;
    }

}