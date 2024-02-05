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
<script>
    $(document).ready(function () {
        $("#Statementst").hide();
        $("#Barcodest").hide();

        $('input[name="collectionType"]').change(function () {
            var option = $(this).val();

            if (option === "Statement") {
                $("#Statementst").show();
                $("#Barcodest").hide();
            } else if (option === "Barcode") {
                $("#Barcodest").show();
                $("#Statementst").hide();
            }
        });
    });
</script>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">BARCODE STATEMENT</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">BARCODE STATEMENT</li>
        </ol>
    </nav>
</div>
<br>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row" id="jay">
                        <div class="col-sm">
                            <label>Statement Create</label>
                            <input type="radio" id="Paid" name="collectionType" value="Statement" readonly="">
                        </div>
                        <div class="col-sm">
                            <label>Barcode Statement</label>
                            <input type="radio" id="Drs" name="collectionType" value="Barcode" readonly="" required>
                        </div>
                    </div>
                    <div class="row" id="Statementst">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form  class="form-sample" method="post" id="form1" name='form1' enctype='multipart/form-data' action="<?php echo base_url();?>SelectSatetment">
                                        <div class="row">
                                            <div class="col-sm">
                                                <label for="startdate">From Date</label>
                                                <input class="form-control" type="date" name="startdate" id="startdate" size="10" onchange="fetchConsignerOptions();">
                                            </div>
                                            <div class="col-sm">
                                                <label for="enddate">To Date</label>
                                                <input class="form-control" type="date" onchange="fetchConsignerOptions();" name="enddate" id="enddate" size="10">
                                            </div>
                                            <div class="col-sm">
                                                <label for="Consigner">Depot</label>
                                                <select id="Depot" name="Depot" onchange="fetchConsignerOptions();" class="form-control">
                                                    <option value='All'>All</option>
                                                </select>
                                            </div>
                                            <div class="col-sm">
                                                <label for="Consigner">Consigner</label>
                                                <select id="Consigner" name="Consigner" class="form-control">
                                                    <option value='All'>All</option>
                                                </select>
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
                                            <table id="invtab" text-align='center'>
                                                <thead> 
                                                    <th>Id</th>
                                                    <th>Cosigner Name</th>
                                                    <th>LR No.</th>
                                                    <th>Drs NO</th>
                                                    <th>Image</th>
                                                    <th><input type="checkbox" id="selectall">Select All</th>
                                                </thead>
                                                <?php if (isset($Data) && !empty($Data)): ?>
                                                    <?php $i = 1; ?>
                                                        <?php foreach ($Data as $Row): ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?= $Row->Cosigner ?></td>
                                                                <td><?= $Row->LRNO ?></td>
                                                                <td><?= $Row->DRSNO ?></td>
                                                                <td><img src="<?= base_url('images/' . $Row->Path) ?>" alt="Image"></td>
                                                                <td><input type="checkbox" name="LRNO[]" value="<?= $Row->LRNO ?>">
                                                                </td>
                                                            </tr>
                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>

                                            </table>
                                        <input type="submit" class="submit-row" value="Submit">
                                        </div>
                            </form>
                            <?php endif; ?>
                    <div class="row" id="Barcodest">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form  class="form-sample" method="post" id="form1" name='form1' enctype='multipart/form-data' action="<?php echo base_url();?>Createstatement">
                                        <div class="row" id="step0">
                                            <div class="col-sm">
                                                <label for="startdate">From Date</label>
                                                <input class="form-control" type="date" name="startdate" id="startdate1" size="10" onchange="fetchConsignerOptions1();">
                                            </div>
                                            <div class="col-sm">
                                                <label for="enddate">To Date</label>
                                                <input class="form-control" type="date" onchange="fetchConsignerOptions1();" name="enddate" id="enddate1" size="10">
                                            </div>
                                            <div class="col-sm">
                                                <label for="Depot">Depot</label>
                                                <select id="Depot1" name="Depot1" onchange="fetchConsignerOptions1();" class="form-control">
                                                    <option value='All'>All</option>
                                                </select>
                                            </div>
                                            <div class="col-sm">
                                                <label for="Consigner">Consigner</label>
                                                <select id="Consigner1" name="Consigner" class="form-control">
                                                    <option value='All'>All</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <input type="button" id="btnstep1" onclick="step1click()" class="btn btn-outline-dark btn-fw" value="Step 1"><br><br>                       
                                        <div class="row" id="step1" style="display: none;">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                            <center>
                                                                <p>
                                                                    <b>Enter LR Number</b>
                                                                </p>
                                                                <input class="form-control " type="text" id="txtlrno" maxlength=15 placeholder="Search LR Number" list="json-datalist" name="txtlrno"  style="width: 120px";>
                                                                <datalist id="json-datalist" name="json-datalist" style="width: 200px;">
                                                                </datalist>
                                                                <br>
                                                                <center>
                                                                    <input  type="button" id="btnaddrow" class="btn btn-outline-dark btn-fw" value="Add Row" onclick="add_row()" required>
                                                                    <span id="warntext" style="margin-left: 5px; color: red;"></span>
                                                                </center>
                                                                <br>
                                                                <div class="table-container">
                                                                    <table id="invtab" align='center' >
                                                                        <thead>
                                                                            <th>LR NO</th>
                                                                            <th>LR Date</th>
                                                                            <th>DELETE</th>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                    <br>
                                                                <center>
                                                                        <br>
                                                                    <input type='submit'  id='Submit' name='Submit' class="btn btn-outline-dark btn-fw" value='Create Statement'
                                                                        >
                                                                        
                                                    </div>
                                                                </center>
                                                            </center>
                                                        
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
    $('#selectall').click(function() {
        $(this.form.elements).filter(':checkbox').prop('checked', this.checked);
    });
  </script>
    <script type="text/javascript">
        var dialog;
        var drsobj;

        $(function () {
            dialog = $("#dialog-message").dialog({
                autoOpen: false,
                position: { my: "center", at: "top+100", of: "#step1" },
                modal: true,
                buttons: {
                    OK: function () {
                        $(this).dialog("close");
                        if (drsobj != undefined ) {
                            window.location.href = "Viewloadingsheet?Lsno=" + drsobj;
                        }
                    }
                },
                close: function () {
                    if (drsobj != undefined ) {
                        window.location.href = "Loadingsheet";
                    }
                }
            });
        });  
        
    </script>
<script type="text/javascript">
         var lastrowid = 0;
         function add_row() {
            
            var lrnolist = document.getElementsByName('LRNO[]');
            var iLen = lrnolist.length;
            var val = document.getElementById('txtlrno').value.trim();
            for (var i = 0; i < iLen; i++) {
                if (lrnolist[i].value == val.toUpperCase()) {
                    document.getElementById('warntext').innerText = "LR No. already Present.";
                    document.getElementById('txtlrno').value = "";
                
                    document.getElementById('btnaddrow').disabled = false;
                    return;
                }
            }

            $.ajax({
                type: 'post',
                url: 'Lredit/getdatastatement',
                data: {
                    LRNO: document.getElementById('txtlrno').value,
                    Depot: document.getElementById('Depot1').value,
                    d1:document.getElementById('startdate1').value,
                    d2:document.getElementById('enddate1').value,
                    Consigner: document.getElementById('Consigner1').value
                },
                success: function(response) {
                 
                    if (response == "No Data.") {
                        document.getElementById('warntext').innerText =
                        "LR No. Not Found"; //alert("LR No. Not Found");
                        document.getElementById('txtlrno').value = "";
                        document.getElementById('btnaddrow').disabled = false;
                    } else {
                        lastrowid = lastrowid + 1;
                        $("#invtab tr:last").after("<tr id='row" + lastrowid + "'>" + response +
                            "<td><input type='button' value='DELETE' onclick=delete_row('row" +
                            lastrowid + "')></td></tr>");
                        var tabrow = document.getElementById('row' + lastrowid);
                        var tabcells = tabrow.getElementsByTagName("td");
                        
                        document.getElementById('txtlrno').value = "";
                        document.getElementById('warntext').innerText = "";
                        document.getElementById('btnaddrow').disabled = false;
                    }
                },
                error: function(response) {
                    alert(response);
                    document.getElementById('btnaddrow').disabled = false;
                }
            });

        }

        function delete_row(rowno) {
            var tabrow = document.getElementById(rowno);
            $('#' + rowno).remove();
        }
</script>
<script type="text/javascript">
            $(document).on("keypress", 'form', function(e) {
            var code = e.keyCode || e.which;
            var btnid = e.target.id;
            if (code == 13 && btnid != "submit") {
                e.preventDefault();
                return false;
            }
        });
    function step1click() {
            if ($("#form1")[0].checkValidity()) {
                document.getElementById('btnstep1').style.display = 'none';
                document.getElementById('step1').style.display = 'block';
                $("#step0").find("input,select").attr("disabled", "disabled");
                $("#txtlrno").focus();
            } else
                $("#form1")[0].reportValidity();
        }
    const currentDate = new Date();
    const currentFormattedDate = formatDate(currentDate);
    
    document.getElementById('startdate1').value = currentFormattedDate;
    document.getElementById('enddate1').value = currentFormattedDate;
    document.getElementById('startdate').value = currentFormattedDate;
    document.getElementById('enddate').value = currentFormattedDate;
    
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
</script>

<script>
    $(document).ready(function () {
        fetchDepotOptions();
    });

    function fetchDepotOptions() {
        $.ajax({
            type: 'get',
            url: 'Lredit/depotse',
            dataType: 'json',
            success: function (response) {
                if (response.length > 0) {
                    var depotSelect = $('#Depot1');

                    $.each(response, function (index, item) {
                        depotSelect.append('<option value="' + item.CPCODE + '">' + item.CPCODE + '-' + item.DEPO_NAME + '</option>');
                    });
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        fetchDepotOptions1();
    });

    function fetchDepotOptions1() {
        $.ajax({
            type: 'get',
            url: 'Lredit/depotse',
            dataType: 'json',
            success: function (response) {
                if (response.length > 0) {
                    var depotSelect = $('#Depot');

                    $.each(response, function (index, item) {
                        depotSelect.append('<option value="' + item.CPCODE + '">' + item.CPCODE + '-' + item.DEPO_NAME + '</option>');
                    });
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }
</script>
<script>


    function fetchConsignerOptions() {
        $.ajax({
            type: 'get',
            url: 'Lredit/fetchconsignor1',
            dataType: 'json',
            data: {
                startdate: document.getElementById('startdate').value,
                enddate: document.getElementById('enddate').value,
                Depot:document.getElementById('Depot').value
                },
                success: function (response) {
                    var depotSelect = $('#Consigner').empty();

                    if (response && response.length > 0) {
                        $.each(response, function (index, item) {
                            depotSelect.append('<option value="' + item.Cosigner + '">' + item.Cosigner + '</option>');
                        });
                    } else {
                        depotSelect.append('<option value="">Consigner is null</option>');
                    }
                },
            error: function (response) {
                console.log(response);
            }
        });
    }
</script>
<script>


    function fetchConsignerOptions1() {
        $.ajax({
            type: 'get',
            url: 'Lredit/fetchconsignor1',
            dataType: 'json',
            data: {
                startdate: document.getElementById('startdate1').value,
                enddate: document.getElementById('enddate1').value,
                Depot:document.getElementById('Depot1').value
                },
                success: function (response) {
                    var depotSelect = $('#Consigner1').empty();

                    if (response && response.length > 0) {
                        $.each(response, function (index, item) {
                            depotSelect.append('<option value="' + item.Cosigner + '">' + item.Cosigner + '</option>');
                        });
                    } else {
                        depotSelect.append('<option value="">Consigner is null</option>');
                    }
                },
            error: function (response) {
                console.log(response);
            }
        });
    }
</script>
<script type="text/javascript">
$(document).ready(function () {
    var dataList = document.getElementById('json-datalist');
    var input = document.getElementById('txtlrno');
    var consigner1 = document.getElementById('Consigner1'); // Replace with the actual consigner value
    var Date = document.getElementById('startdate1');
    var Date1 = document.getElementById('enddate1');
    var Depot2=document.getElementById('Depot1');
    input.addEventListener('input', function () {
        var query = input.value;
        var consigner=consigner1.value;
        var d1=Date.value;
        var d2=Date1.value;
        var Depot=Depot2.value;
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                var jsonOptions = JSON.parse(request.responseText);

                // Clear previous options
                dataList.innerHTML = '';

                jsonOptions.forEach(function (item) {
                    var option = document.createElement('option');
                    option.value = item.LRNO; // Assuming 'LRNO' is the field from your database
                    dataList.appendChild(option);
                });
            }
        };

        // Concatenate consigner parameter to the URL
        var url = '<?php echo base_url(); ?>Lredit/selectlrconsigner?query=' + encodeURIComponent(query) + '&consigner=' + encodeURIComponent(consigner)+'&d1=' 
        + encodeURIComponent(d1)+'&d2=' + encodeURIComponent(d2) +'&depot=' + encodeURIComponent(Depot);

        request.open('GET', url, true);
        request.send();
    });
});
</script>
