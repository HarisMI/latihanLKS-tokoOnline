<?php 

$koneksi = mysqli_connect("localhost","root","","lks_latihan_tokoOnline");

if(!$koneksi){
    die(mysqli_connect_error($koneksi));
}