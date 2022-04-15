<?php


class Bootstrap
{
    public function __construct()
    {
        // 1. Router:
        //   [1] => Controller name prefix.
        //   [2] => Action name prefix.
        //   [3] => parameter.
        $pathTokens = explode('/', rtrim($_SERVER['REQUEST_URI']));

        // 2. Dispatcher:
        $controllerName = ucfirst($pathTokens[1]) . 'Controller';
        $controllerPath = 'controllers/' . $controllerName . '.php';
        if (is_file($controllerPath)) {
            require_once($controllerPath);
            $controller = new $controllerName();

            // Check the if there is the Action portion from the URI.
            $parameter = '';
            if (isset($pathTokens[2]) && !empty($pathTokens[2])) {
                $actionName = $pathTokens[2] . 'Action';
                if (isset($pathTokens[3]) && !empty($pathTokens[3])) {
                    $parameter = $pathTokens[3];
                    $controller->{$actionName}($parameter);
                }
                $controller->{$actionName}();
            } else {
                // Default indexAction
                $controller->indexAction($parameter);
            }
        } else {
            require_once('controllers/ErrorController.php');
            $controllerName = 'ErrorController';
            $controller = new $controllerName();
            $controller->indexAction(Validation::ERROR_WRONG_CONTROLLER, $controllerPath);
        }
    }
}


