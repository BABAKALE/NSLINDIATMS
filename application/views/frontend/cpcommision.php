<?php include('backend_template.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- jQuery UI JS -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <style type="text/css">
    .table-container {
      width: 100%;
      overflow-x: auto;
  }
  #invtab {
      border-collapse: collapse;
      width: 100%;
  }
  #invtab th, #invtab td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
  }
  #invtab th {
      background-color: #2c2d58a3;
  }
  #invtab input[type="text"], #invtab select {
      width: 100%;
      padding: 5px;
      box-sizing: border-box;
  }
  @media (max-width: 768px) {
      #invtab {
        font-size: 12px;
    }
}

.ui-dialog {
    position: absolute;
    height: auto;
    margin: 10% 40%;
    width: max-content;
}
</style>

<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">CP COMMISSION</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">CP COMMISSION</li>
        </ol>
    </nav>
</div>
<br>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form  class="form-sample" method="post" id="form1" name='form1' enctype='multipart/form-data' action="<?php echo base_url();?>cpcommision">
                                        <div class="row">
                                            <div class="col-sm">
                                                <label for="startdate">From Date</label>
                                                <input class="form-control" type="date" name="startdate" id="startdate" size="10">
                                            </div>
                                            <div class="col-sm">
                                                <label for="enddate">To Date</label>
                                                <input class="form-control" type="date"  name="enddate" id="enddate" size="10">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <input type="submit" class="btn btn-outline-dark btn-fw" id="Submit1" value="Submit" name="Submit">
                                    </form>
                                        <br>
                                        <br>
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php if (isset($_POST["Submit"])): ?>
                            <form class="form-sample" method="post" id="myForm" name='myForm' enctype='multipart/form-data' action="<?php echo base_url();?>Createstatement">
                                        <div class="table-container">
                                        <table id="invtab" style="text-align: center;">
                                            <thead> 
                                                <th>Id</th>
                                                <th>CP CODE</th>
                                                <th>CP PERSON NAME</th>
                                                <th>CP DEPO</th>
                                                <th>TOTAL LR</th>
                                                <th>TOTAL PKGS</th>
                                                <th>TOTAL WEIGHT</th>
                                                <th>TOTAL DOCKET</th>
                                                <th>TOTAL TOPAY LR</th>
                                                <th>TOTAL PAID LR</th>
                                                <th>COMMISSION</th>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $totallr = 0;
                                                    $totaldt = 0;
                                                    $totalallcommision = 0;
                                                    $totalpaid = 0;
                                                    $totalpkg = 0;
                                                    $totalwt = 0;
                                                    $totaltopay = 0;
                                                ?>
                                                <?php if (isset($Data) && !empty($Data)): ?>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($Data as $Row): ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?= $Row['CPCODE'] ?></td>
                                                            <td><?= $Row['NAME'] ?></td>
                                                            <td><?= $Row['cpdeponame'] ?></td>
                                                            <td><?= $Row['lr'] ?></td>
                                                            <td><?= $Row['pkg'] ?></td>
                                                            <td><?= ($Row['wt'] == intval($Row['wt'])) ? intval($Row['wt']) : number_format($Row['wt'], 2) ?></td>
                                                            <td><?= $Row['dt'] ?></td>
                                                            <td><?= $Row['topayCount'] ?></td>
                                                            <td><?= $Row['PAIDCOUNT'] ?></td>
                                                            <td><?= ($Row['toatalcommision'] == intval($Row['toatalcommision'])) ? intval($Row['toatalcommision']) : number_format($Row['toatalcommision'], 2) ?></td>
                                                        </tr>
                                                        <?php 
                                                            $i++; 
                                                            $totallr += $Row['lr'];
                                                            $totalpkg += $Row['pkg'];
                                                            $totalwt += $Row['wt'];
                                                            $totaldt += $Row['dt'];
                                                            $totaltopay += $Row['topayCount'];
                                                            $totalpaid += $Row['PAIDCOUNT'];
                                                            $totalallcommision += $Row['toatalcommision'];
                                                        ?>
                                                    <?php endforeach; ?>
                                                    <tr>
                                                        <td colspan="4"><b>Total</b></td>
                                                        <td><?= $totallr ?></td>
                                                        <td><?= $totalpkg ?></td>
                                                        <td><?= number_format($totalwt,2) ?></td>
                                                        <td><?= $totaldt ?></td>
                                                        <td><?= $totaltopay ?></td>
                                                        <td><?= $totalpaid ?></td>
                                                        <td><?= number_format($totalallcommision,2) ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        </div>
                            </form>
                            <?php endif; ?>
                </div>
            </div>
        </div>
<script>
        const currentDate = new Date();
    const currentFormattedDate = formatDate(currentDate);
    
    document.getElementById('startdate').value = currentFormattedDate;
    document.getElementById('enddate').value = currentFormattedDate;
    
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
</script>

