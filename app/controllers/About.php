<?php
class About
{
    public function index($nama = 'Adha Noer', $pekerjaan = 'Pelajar')
    {
        echo "Halo, Nama Saya $nama saya adalah seorang $pekerjaan";
    }
    public function page()
    {
        echo 'About/page';
    }
}
