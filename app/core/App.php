<?php
class App {


    protected $deafultMethod = "index";

    protected $deafultController = "home";

    protected $parameters = [];


    public function __construct() {
        $url = $this->processUrl();
        if(file_exists('../app/controllers/' .$url[0]. '.php')) {
            $this->deafultController = $url[0];
            unset($url[0]);
        }
        require_once('../app/controllers/' .$this->deafultController. '.php');
        $this->deafultController = new $this->deafultController;

        if(isset($url[1])){
            if(method_exists($this->deafultController, $url[1])) {
                $this->deafultMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->parameters = $url ? array_values($url) : [];
        call_user_func_array([$this->deafultController, $this->deafultMethod], $this->parameters);
    }

    public function processUrl() {
        if(isset($_GET['url'])) {
            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
            //return $_GET['url'];
        }
    }


}
