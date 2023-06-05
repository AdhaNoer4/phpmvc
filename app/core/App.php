<?php
class App
{
    public function __construct()
    {
        $url = $this->parseURL();
        var_dump($url);
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
