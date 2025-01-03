<br>
<h1 class="text-center">DATA ANGGOTA</h1>
<?php
    if (isset($_POST['save'])) {
        $nis            = $_POST['nis'];
        $nama           = $_POST['nama'];
        $kelas          = $_POST['kelas'];
        $jurusan        = $_POST['jurusan'];
        $tgl_lahir      = $_POST['tanggal_lahir'];
        $telp           = $_POST['no_telpon'];
        $alamat         = $_POST['alamat'];
        $jk             = $_POST['jenis_kelamin'];
        $query_insert = mysqli_query($koneksi,"INSERT INTO anggota VALUES('','$nis','$nama','$kelas','$jurusan','$tgl_lahir','$telp','$alamat','$jk')");
        if ($query_insert) {
            header('refresh:2');
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <?php 

        }else{
            echo "Data Gagal Disimpan";
        }
    }elseif (isset($_GET['hapus'])) {
        $id = $_GET['id'];
        $query_delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota = '$id' ");
        if ($query_delete) {
            header('refresh:2');
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Berhasil Dihapus!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
    }
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  TAMBAH  DATA
</button>
<br>
<br>
<table class="table table-striped">

    <tr>
        <th>NO</th>
        <th>NIS</th>
        <th>NAMA</th>
        <th>KELAS</th>
        <th>JURUSAN</th>
        <th>TANGGAL LAHIR</th>
        <th> NO TELEPON</th>
        <th>ALAMAT</th>
        <th>JK </th>
        <th>Action</th>
    </tr>
    <?PHP
    $no =1;
    $query = mysqli_query($koneksi,"SELECT * FROM anggota");
    foreach ($query as $row ) {
        # code...
    
    ?>
    <tr>
        <td valign= middle><?php echo $no?></td>
        <td valign= middle><?php echo $row['nis']?></td>
        <td valign= middle><?php echo $row['nama']?></td>
        <td valign= middle><?php echo $row['kelas']?></td>
        <td valign= middle><?php echo $row['jurusan']?></td>
        <td valign= middle><?php echo $row['tanggal_lahir']?></td>
        <td valign= middle><?php echo $row['no_telpon']?></td>
        <td valign= middle><?php echo $row['alamat']?></td>
        <td valign= middle><?php echo $row['jenis_kelamin']?></td>   
        <td valign= middle>
        <a href="?page=anggota&hapus&id=<?php echo $row['id_anggota'];?>">
        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
        </a>
        <button class="btn btn-success"><i class="far fa-edit"></i></button>
        </td>     

    </tr>
    <?php
    $no++;
    }
    ?>

</table>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Input Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <div class="form-group mb-2">
      <input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa">
      </div>
      <div class="form-group mb-2">
      <input class="form-control" type="text" name="nama" placeholder="Nama Siswa">
      </div>
      <div class="input-group mb-2">
      <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
      <select class="form-control" name="kelas" id="inputGroupSelect01">\
      <option value="">Pilih Kelas</option>
      <option value="xiirpl1">XIIRPL1</option>
      <option value="xiirpl2">XIIRPL2</option>
      <option value="xiirpl2">XIIRPL3</option>
      </select>
      </div>
      <div class="input-group mb-2">
      <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
      <select class="form-control" name="jurusan" id="inputGroupSelect01">\
      <option value="">Pilih Jurusan</option>
      <option value="rpl">Rekayasa Perangkat Lunak</option>
      <option value="tkr">Teknik Kendaraan Ringan</option>
      <option value="tav">Teknik Audio Video</option>
      <option value="titl">Teknik Instalasi Tenaga Listrikk</option>
      </select>
      </div>
      <div class="input-group mb-2">
      <span class="input-group-text"> Tanggal Lahir</span>
      <input class="form-control" type="date" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
      </div>
      <div class="form-group mb-2"> 
        <input class="form-control" type="text" name="no_telpon" placeholder="Masukan No Telepon">
      </div>
      <div class="form-floating mb-2">
  <textarea  name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Alamat</label>
  </div>
      <div class="form-group">
      <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
        <select class="form-control" name="jenis_kelamin">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="p">Perempuan</option>
            <option value="l">Laki-Laki</option>
        </select>
      </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>