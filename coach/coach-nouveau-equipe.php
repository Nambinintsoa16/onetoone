<?php include "header.php";?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
        <div class="row">
           <div class="col-md-12" >
             <img src="images/coaching3.jpg" class="bann_accueil" style="height:400px;width:100%;object-fit:cover">
              <div class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2 ">
                      <div class="col-sm-6">
                        
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item content_dt"><?php $dt=new dateTime();
$date=$dt->format("d-M-Y");
echo $date;
                          ?></li>
                        </ol>
                      </div><!-- /.col -->
                    </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>  
      </div>
    </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
   <?php include "footer.php";?>
 