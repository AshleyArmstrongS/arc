<?php namespace Rapid; ?>
<?php

  /**
   * This is the Rapid MVC framework created for GD2/CO2a
   * Web Development (2018/19) CA3. This version has no
   * in-built support or helpers for Models, so it is really
   * just a VC framework (we'll add models later).
   *
   * Implementation details are described in comments in
   * this file. Usage details will be documented in a
   * README.md file in the root of this project.
   *
   * To limit the number of requires needed per request,
   * all of this library in included in this one file.
   *
   * The current implementation only supports GET and POST
   * request methods. Would it be difficult to add support
   * for the remaining request methods (PUT, DELETE, etc)?
   *
   * This library makes use of a namespace. To access the
   * classes in this library, you must reference their
   * namespace:
   *    Wont' work: new Request();
   *    Will work : new \Rapid\Request();
   * Lear more about namespaces at:
   *    https://php.net/manual/en/language.namespaces.php
   */

  ##########################################################
  #### !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! #####
  #### !!! YOU SHOULD NEVER NEED TO EDIT THIS FILE !!! #####
  #### !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! #####
  ##########################################################


  ##########################################################
  # Exceptions
  ##########################################################

  // A \Rapid\Exception which extends the global \Exception
  class Exception extends \Exception {

    private $req = NULL;
    private $res = NULL;

    public function appendRequestObject($req) {
      if ($req instanceof Request) {
        $this->req = $req;
      }
    }

    public function appendResponseObject($res) {
      if ($res instanceof Response) {
        $this->res = $res;
      }
    }

    public function getRequestObject() {
      return $this->req;
    }

    public function getResponseObject() {
      return $this->res;
    }

  };

  // Situation-specific Exception types
  class RequestAlreadyFinishedException extends Exception {};
  class LayoutNotFoundException         extends Exception {};
  class ViewNotFoundException           extends Exception {};
  class RouteRedeclarationException     extends Exception {};
  class ControllerNotFoundException     extends Exception {};
  class RouteNotFoundException          extends Exception {};
  class ConfigFileNotFoundException     extends Exception {};
  class ConfigPDOKeysMissingException   extends Exception {};


  ##########################################################
  # Request
  ##########################################################

  class Request {

    private $basePath;
    private $params;
    private $headers;
    private $url;

    public function __construct() {
      $this->basePath  = dirname($_SERVER['PHP_SELF']);
      $this->params    = NULL;
      $this->headers   = NULL;
      $this->url       = $this->getLocalPath();
    }

    /**`
     * Utility method to get the requested path, minus the base
     * path of the current script (relative to the document root).
     */
    private function getLocalPath() {

      // Get requested path, minus a query string if there is one
      $localPath = explode('?', $_SERVER['REQUEST_URI'])[0];

      // Remove basePath from localPath
      // Snippet taken from https://stackoverflow.com/questions/4517067
      // ^^^ That's a reference
      if (substr($localPath, 0, strlen($this->basePath)) === $this->basePath) {
        $localPath = substr($localPath, strlen($this->basePath));
      }

      return '/' . ltrim($localPath, '/');
    }

    /**
     * Params will have to be set later than instantiation.
     * However, once set, we don't want the param array to be
     * mutable, so we will make sure they can only be set once
     */
    public function setParamsOnce($params) {
      if ($this->params === NULL && is_array($params)) {
        $this->params = $params;
      }
    }

    /**
     * Get a single named parameter from the request URL
     */
    public function param($name) {
      return $this->params !== NULL
        ? $this->params[$name] ?? NULL
        : NULL;
    }

    /**
     * Get a single named query string value from the request
     * URL. (->query('foo') is an alias of $_GET['foo'])
     */
    public function query($name) {
      return $_GET[$name] ?? NULL;
    }

    /**
     * Get a single named posted value from the request
     * (->body('foo') is an alias of $_POST['foo'])
     */
    public function body($name) {
      return $_POST[$name] ?? NULL;
    }

    /**
     * Get a single, named request header
     */
    public function header($name) {
      // 'Lazy' load headers on first call
      if ($this->headers === NULL) {
        $this->headers = getallheaders();
      }
      return $this->headers[$name] ?? NULL;
    }

    /**
     * Get the requesting user's IP address
     */
    public function remoteIp() {
      return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Get the calculated request path (minus base path)
     */
    public function url() {
      return $this->url;
    }

    /**
     * Get the request method (GET/POST/PUT, etc.)
     */
    public function method() {
      return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get the app's base path (relation to doc root)
     */
    public function basePath() {
      return $this->basePath;
    }

    /**
     * Ensure sessions for the current request --
     * restore an existing session, or create new
     */
    public function sessionStart() {
      if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
    }

    /**
     * Get a single named session value
     * (->session('foo') is an alias of $_SESSION['foo'])
     * But ensures session has been started before
     * retrieval
     */
    public function session($name) {
      $this->sessionStart();
      return $_SESSION[$name] ?? NULL;
    }

    /**
     * Set a named session value
     * (->sessionSet('foo', 'bar') is an alias of
     * $_SESSION['foo'] = 'bar')
     * But ensures session has been started before
     * setting
     */
    public function sessionSet($name, $value) {
      $this->sessionStart();
      $_SESSION[$name] = $value;
    }

    /**
     * Destroy all data associated with the current
     * session (immediately invalidates all data)
     */
    public function sessionDestroy() {
      $this->sessionStart();
      session_destroy();
      $_SESSION = [];
    }

  }


  ##########################################################
  # Response
  ##########################################################

  class Response {

    const DEFAULT_STATUS  = 200;
    const DEFAULT_HEADERS = [];

    private $req;
    private $status;
    private $headers;
    private $finished;

    public function __construct($req) {
      $this->status(Response::DEFAULT_STATUS);
      $this->headers  = Response::DEFAULT_HEADERS;
      $this->finished = FALSE;
      $this->req     = $req;
    }

    /**
     * Returns the current internal state of the response
     * object (status, headers, finished) for inspection
     */
    public function currentState() {
      return [
        'status'   => $this->status,
        'headers'  => $this->headers,
        'finished' => $this->finished
      ];
    }

    /**
     * Set the response HTTP status code (defaults to 200)
     */
    public function status($status) {
      if ($this->finished) {
        throw new RequestAlreadyFinishedException();
      }
      $this->status = $status;
    }

    /**
     * Set a response header in the format (name, value).
     * Pass a value of NULL to unset a named header.
     */
    public function header($name, $value) {

      if ($this->finished) {
        throw new RequestAlreadyFinishedException();
      }

      if($value === NULL) {
        unset($this->headers[$name]);
      } else {
        $this->headers[$name] = $value;
      }
    }

    /**
     * Set the response as finished. This will prevent most
     * response actions from doing anything.
     */
    public function end() {
      $this->finished = TRUE;
    }

    /**
     * Send a response to the user. This method takes care
     * of setting the current response code, any defined
     * response headers, and the block of provided content
     */
    public function send($content = '') {

      if ($this->finished) {
        throw new RequestAlreadyFinishedException();
      }

      http_response_code($this->status);

      foreach($this->headers as $header=>$value) {
        header("$header: $value");
      }

      echo $content;

      $this->end();
    }

    /**
     * Utility wrapper for sending JSON content to the
     * user. Wraps ->send(), but sets proper headers for
     * JSON, and encodes the passed content as JSON
     */
    public function json($content) {
      $this->header('Content-Type', 'application/json');
      $this->send(json_encode($content));
    }

    /**
     * Compile the specified template, and send the content
     * to the user. Wraps the view compile stage, and a send
     */
    public function render($layout, $view, $locals) {
      if ($this->finished) {
        throw new RequestAlreadyFinishedException();
      }
      $html = Renderer::compile($layout, $view, $locals);
      $this->send($html);
    }

    /**
     * Redirect the user to a specific URL. NB is aware
     * of the base URL, so you do not have to include it.
     */
    public function redirect($uri) {
      if ($this->finished) {
        throw new RequestAlreadyFinishedException();
      }
      $uri = rtrim($this->req->basePath(), '/') . '/' . ltrim($uri, '/');
      header("Location: $uri");
      exit();
    }

  }


  ##########################################################
  # Renderer
  ##########################################################

  class Renderer {

    const VIEW_PLACEHOLDER = '{{--VIEW--}}';

    /**
     * Compile the parts of a template (layout and view) to their
     * final form (e.g. HTML) and return the result. Will throw if
     * any template part could not be found.
     * @param $layoutName The name of the layout file to use (excl. .php)
     * @param $viewName   The name of the view file to use (excl. .php)
     * @param $locals     Associative array of values to make available to
     *                    the template.
     */
    public static function compile($layoutName, $viewName, $locals = []) {

      $view   = NULL;
      $layout = NULL;

      // Use object buffering to load the contents into a variable
      ob_start();
        $layoutIncluded = @include_once("templates/layouts/$layoutName.php");
        $layout         = ob_get_clean();

      // Use object buffering to load the contents into a variable
      ob_start();
        $viewIncluded = @include_once("templates/views/$viewName.php");
        $view         = ob_get_clean();

      // Layout could not be found, or opened, or is empty
      if (!$layoutIncluded) {
        throw new LayoutNotFoundException();
      }

      // View could not be found, or opened, or is empty
      if (!$viewIncluded) {
        throw new ViewNotFoundException;
      }

      // Combine layout and view
      $compiled = str_replace(Renderer::VIEW_PLACEHOLDER, $view, $layout);

      return $compiled;
    }

  }


  ##########################################################
  # Router
  ##########################################################

  class Router {

    private $routes;

    public function __construct() {
      $this->routes = [
        'GET'  => [],
        'POST' => []
      ];
    }

    /**
     * Register a new GET-based route
     */
    public function GET($route, $controllerName) {

      if (isset($this->routes['GET'][$route])) {
        throw new RouteRedeclarationException();
      }

      $this->routes['GET'][$route] = $controllerName;
    }

    /**
     * Register a new POST-based route
     */
    public function POST($route, $controllerName) {

      if (isset($this->routes['POST'][$route])) {
        throw new RouteRedeclarationException();
      }

      $this->routes['POST'][$route] = $controllerName;
    }

    /**
     * Processes a request by:
     *   1) Creating a new request object
     *   1) Creating a new response object
     *   2) Checks if the requested route has a controller
     *   3) Loads and calls the controller (or throws)
     */
    public function dispatch() {

      $req        = new Request();
      $res        = new Response($req);
      $routes     = $this->routes[$req->method()] ?? [];
      $controller = NULL;
      $routeFound = FALSE;

      try {

        // Is there a matching route declaration?
        foreach($routes as $route=>$controllerName) {

          $normal_pattern = '@^' . rtrim($route, '/') . '/?$@';
          $matches        = NULL;
          $matched        = preg_match($normal_pattern, $req->url(), $matches);

          // If found, rry to include the controller
          if ($matched) {
            $routeFound = TRUE;
            $controller = @include_once("controllers/$controllerName.php");
            $req->setParamsOnce($matches);
            break;
          }
        }

        // No matching route found
        if (!$routeFound) {
          throw new RouteNotFoundException();
        }

        // No valid controller was found
        if (!is_callable($controller)) {
          throw new ControllerNotFoundException();
        }

        // Otherwise, we're all good to go.
        // The controller will handle the request
        return $controller($req, $res);

      } catch(Exception $e) {

        // For Rapid Exceptions, make the $req and $res object available
        $e->appendRequestObject($req);
        $e->appendResponseObject($res);

        // Then throw the exception onward
        throw $e;
      }
    }

  }


  ##########################################################
  # Configuration file Loader
  ##########################################################

  class ConfigFile {

    // Holds the cached config file contents
    private static $content = NULL;

    /**
     * If the config file has already been loaded, this will
     * return the cached content. If not, it will first load
     * the file, and then return the content. Throws if the
     * config file could not be loaded
     */
    public static function getContent() {

      // Load the config file, if not already done
      if (ConfigFile::$content === NULL) {

        $content = @include_once('config.php');

        // File could not be loaded
        if ($content === FALSE) {
          throw new ConfigFileNotFoundException();
        }

        // Cache the content to prevent repeated loads
        ConfigFile::$content = $content;
      }

      // Return a copy of content
      return ConfigFile::$content;
    }

  }


  ##########################################################
  # Database Helper
  ##########################################################

  class Database {

    // Holds the cached PDO object
    private static $pdo = NULL;

    /**
     * If a PDO object has already been created, this will
     * return the cached object. Otherwise, it will create
     * a new PDO object from the following values in the
     * standard location config file:
     *   - DATABASE_HOST
     *   - DATABASE_NAME
     *   - DATABASE_USER
     *   - DATABASE_PASS
     */
    public static function getPDO() {

      // Create PDO object, if not already created
      if (Database::$pdo === NULL) {

        // Load config file contents
        $config = ConfigFile::getContent();

        // Check all required config file values exist
        $host = isset($config['DATABASE_HOST']) ? $config['DATABASE_HOST']: NULL;
        $name = isset($config['DATABASE_NAME']) ? $config['DATABASE_NAME']: NULL;
        $user = isset($config['DATABASE_USER']) ? $config['DATABASE_USER']: NULL;
        $pass = isset($config['DATABASE_PASS']) ? $config['DATABASE_PASS']: NULL;

        if ($host === NULL || $name === NULL || $user === NULL || $pass === NULL) {
          throw new ConfigPDOKeysMissingException();
        }

        // Attempt connection (note: exceptions are allowed to throw onward)
        Database::$pdo = new \PDO("pgsql:host=$host;port=5432;dbname=$name;user=$user;password=$pass");
      }

      // Return the PDO object
      return Database::$pdo;
    }

    public static function openSocket() {
      $address = 'localhost';
      $service_port = 8080;
      $timeout = 30;  
   //create
       $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
       if(!socket_set_block($socket))
        {
           echo("socket is not blocked");
        }
   //more settings
       $error = NULL;
       $attempts = 0;
       $timeout *= 1000;
       $connected = FALSE;
   //connection and check
       $connected = @socket_connect($socket, $address, $service_port);
       if (!$connected)
       {
           $error = socket_last_error();
           if ($error != 10035 && $error != SOCKET_EINPROGRESS && $error != SOCKET_EALREADY) {
               echo "Error Connecting Socket: ".socket_strerror($error) . "\n";
               socket_close($socket);
               exit();
           }
       }
    }
  }
?>