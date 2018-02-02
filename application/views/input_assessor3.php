
<!DOCTYPE html>
<html>
<head>
	<title> Input Data </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
	 <link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">

	<style type="text/css">
	   .a{
      padding-left: 1050px;
     }
	</style>
</head>
<body>


 <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class="panel panel-default">

            <div class="panel-body">
              <div class="" style="font-size: 20px; text-align: center  ">
                  Add Data Assesor
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="show-product">
        <!-- data akan di tampilkan di sini -->
        <form method="post" action="">
              <div class="box-body">
                <div class="">
                <a href="<?php echo base_url() ?>penyembelih/input"><button type="button" class="btn btn-primary pull-left">Add Data </button></a>

                <div class="a">

                <a href="<?php echo base_url()?>penyembelih	"><button type="button"  class="btn btn-primary pull-left">See Data</button></a>

                </div>
                <br><br><br>
                <div class="panel panel-default">
                  <div class="panel-body">
                   <div class="form-group">
              <br>
              <br>

              <div class="form-group">
                <label for="asesor" class="col-sm-2 control-label">Name Assessor</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="asesor" id="assesor" placeholder="Masukan Nama assesor" value="<?php echo set_value('asesor') ?>">
                  <?php echo form_error('asesor', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>

                <br>
                <br>


              </div>
              <div class="form-group">
                <label for="no_sk" class="col-sm-2 control-label">No SK</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_sk" id="no_sk" placeholder="Masukan No SK" value="<?php echo set_value('no_sk') ?>">
                  <?php echo form_error('no_sk', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>

                <br><br>

              </div>
              <div class="form-group">
                <label for="no_met" class="col-sm-2 control-label">No MET </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_met" id="no_met"  placeholder="Masukan No MET" value="<?php echo set_value('no_met') ?>">
                  <?php echo form_error('no_met', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>
              </div>
<br><br>
<br>

              <div class="form-group">
              <label for="kompetensi" class="col-sm-2 control-label">Kompetensi Keahlian </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="kompetensi" id="no_met"  placeholder="Masukan kompetensi" value="<?php echo set_value('kompetensi') ?>">
                  <?php echo form_error('kompetensi', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>
              </div>
              <br>
              <br>
              <br>

        <div class="box-footer">
                  <button type="submit" style="" name="simpan" class="btn btn-primary btn-lg  btn-block"  style="">
                  Save</button>  </div>
      </div>
     </div>
          </form>
       </div>
</div>

<table class="table table-bordered table-hover table-striped " id="data">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Assessor</th>
                          <th>Nomor SK </th>
                          <th>Nomor MET</th>
                          <th>Kompetensi Keahlian</th>
                          <th colspan="4" style="text-align: center;"> Menu </th>
                        </tr>
                      </thead>

                      <tbody>
                              <?php
                              $no = 0;
                                  foreach ($a->result() as $r) {
                                    $no++;
                              ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $r->asesor ?></td>
                                  <td><?php echo $r->no_sk ?></td>
                                  <td><?php echo $r->no_met ?></td>
                                  <td><?php echo $r->kompetensi ?></td>
                                  <td>
                                      <a href="<?php echo base_url().'penyembelih/deleteasesor/'.$r->id_asesor ?>"
                                      onClick="return confirm('Hapus Inputan')"/><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>

                                      <a href="<?php echo base_url().'penyembelih/editasesor/'.$r->id_asesor ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>

                                      <a href=""><button type="button" class="btn btn-primary btn-sm">Print</button></a>
                                  </td>
                                </tr>
                              <?php } ?>
                      </tbody>
                    </table>
<script src="<?php echo base_url() ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
