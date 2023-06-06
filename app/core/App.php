<?php
class App
{
    protected $controller = "Home"; //default
    protected $method = "index";
    protected $params = [];
    public function __construct()
    {
        $url = $this->parseURL();

        if (isset($url[0])) {
            // cek apakah Controllernya ada
            //ini controller
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {

                // jika ada, timpa controller default dengan Url yang indexnya 0
                $this->controller = $url[0];
                unset($url[0]); // hilangkan controller
            }
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // ini method
        // cek apakah method nya ada
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                // jika ada, timpa method default dengan url yg indexnya 1
                $this->method = $url[1];
                unset($url[1]); // hilangkan method
            }
        }

        // ini params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan  params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }



    public function parseURL() // method untuk memecah url
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // rtrim untuk menghapus tanda "/" diakhir
            $url = filter_var($url, FILTER_SANITIZE_URL); // untuk membersihkan url dari karakter2 aneh
            $url = explode('/', $url); // untuk memecah string url menjadi array berdasarkan tanda /
            return $url;
        }
    }
}
