<?php 
include_once "db.php";

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <title>Home</title>
</head>
<body>
  <br>


  <div class="container">

    <h2 class="text-center">Soal Tes Koding</h2>
    <hr>
    <div class="row">
     <div class="col-md-4">
       <div class="card ">
         <div class="card-title">
          <br>
          <h5> &nbsp;&nbsp;&nbsp;Tambah Data Wali Kelas</h5>
          <hr>
        </div>
        <div class="card-body">
         <form action="" method="post">
           <div class="form-group">
             <label>Kode Wali Kelas :</label>
             <input type="text" name="kode" class="form-control" required="" readonly="" value="<?= $kodeguru; ?>">
           </div>
           <div class="form-group">
             <label>Nama Guru:</label>
             <select class="form-control" name="nama" required="">
              <option selected="">--Pilih--</option>
              <?php while ( $data = mysqli_fetch_assoc($query_guru)) { ?>
                <option value="<?= $data['id_guru']; ?>"><?= $data['nama_guru']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
           <label> Kelas :</label>
           <select class="form-control" name="kelas" required="">
            <option selected="">--Pilih--</option>
            <?php while ( $data2 = mysqli_fetch_assoc($query_kelas)) { ?>
              <option value="<?= $data2['id_kelas']; ?>"><?= $data2['nama_kelas']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
         <label>Tahun Ajaran :</label>
         <input type="text" name="tahun" class="form-control" value="<?= date('Y');  ?>" required="" >
       </div>
       <button class="btn btn-primary" type="submit" name="simpan"><i class="fa fa-home"></i> Simpan</button>
       <button class="btn btn-danger" type="reset" name="reset"><i class="fa fa-close"></i> Batal</button>
     </form>
   </div>
   <div>
   </div>
 </div>
</div>
<div class="col-md-8"> 
 <table class="table table-striped table-bordered table-hovered" id="data">
   <thead>
     <tr>
       <th>No</th>
       <th>Kode Wali kelas</th>
       <th>Nama Guru</th>
       <th>Kelas</th>
       <th>Tahun Ajaran</th>
       <th>Aksi</th>
     </tr>
   </thead>
   <tbody>
    <?php $no = 1; ?>
    <?php 
      while ($tampil = mysqli_fetch_assoc($hasil_akhir)) {      ?>
     <tr>
       <td><?= $no; ?></td>
       <td><?= $tampil['id_wl']; ?></td>
       <td><?= $tampil['nama_guru']; ?></td>
       <td><?= $tampil['nama_kelas']; ?></td>
       <td><?= $tampil['th_ajaran']; ?></td>
     
       <td>
         <a  href="update.php?id=<?=$tampil['id_wl'];?>" class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i> Edit</a>
         <a href="index.php?id=<?=$tampil['id_wl'];?>" class="btn btn-danger btn-sm" ><i i class="fa fa-trash"></i> Hapus</a>
       </td>
     </tr>
     <?php $no++; ?>
   <?php }; ?>
   </tbody>
 </table>
</div>
</div>
</div>


<?php 
if (isset($_POST['simpan'])) {
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $kelas = $_POST['kelas'];
  $tahun = $_POST['tahun'];

  $query = "INSERT INTO walikelas VALUES ('$kode','$nama','$kelas','$tahun') ";

  mysqli_query($koneksi,$query);
  echo "
  <script>
  document.location.href = 'index.php';
  alert('Data berhasil ditambahkan');
  </script>
  ";
  
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $hapus = "DELETE * FROM walikelas where walikelas.id_wl = '$id' ";
  mysqli_query($koneksi,$hapus);
   echo "
  <script>
  document.location.href = 'index.php';
  alert('Data berhasil hapus');
  </script>
  ";
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
 $(document).ready( function () {
  $('#data').DataTable();
} );
</script>
</body>
</html>