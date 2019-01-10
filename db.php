<?php 
$koneksi = mysqli_connect("localhost","root","","tes");
$query = "SELECT max(id_wl) as id_wl FROM walikelas";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodeguru = $data['id_wl'];
$noUrut = (int) substr($kodeguru, 3, 3);
$noUrut++;
$char = "GRU";
$kodeguru = $char . sprintf("%03s", $noUrut);
$query_guru = mysqli_query($koneksi, "SELECT * FROM guru ");
$query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas "); 
$wali_kelas = mysqli_query($koneksi, "SELECT * FROM wali_kelas join guru on id.guru");
$hasil_akhir= mysqli_query($koneksi,"SELECT * FROM walikelas join guru on walikelas.id_guru = guru.id_guru join kelas on walikelas.id_kelas = kelas.id_kelas");






 ?>