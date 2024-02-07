<?php include('backend_template.php') ?>
<?php 
$date = new DateTime();
$datestr = $date->format('d-m-Y');
?>
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
        $("#Submit1").click(function () {
            // Hide the elements when the submit button is clicked
            $("#jay").hide();
        });
    });
</script>
            <div class="main-panel">
                <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">PREPARE JOB</h3>
                    <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">PREPARE JOB</li>
                    </ol>
                </nav>
            </div>
            <br>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <form  class="form-sample" method="post" id="form1" name='form1' enctype='multipart/form-data' action="<?php echo base_url();?>createprejob">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Job Order No.</label>
                                </div>
                                <div class="col-sm-2">
                                    <span class="badge" style="background-color: #999999;">System Generated</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label>Vehicle No.</label>
                                <input type="text" name="vno" id="vno" class="form-control" autocomplete="off" list="json-datalist" >
                                <datalist id="json-datalist" name="json-datalist" style="width: 200px;">
                                </datalist>
                            </div>
                            <div class="col-sm">
                                <label>Job Order Date</label>
                                <input type="text" name="jdt" id="jdt" value="<?php echo $datestr; ?>" class="form-control"
                                    readonly >
                            </div>
                            <div class="col-sm">
                                <label>Service Center Type</label>
                                <select name="stype" id="stype" class="form-control" >
                                    <option value="">Select</option>
                                    <option value="Workshop">Workshop</option>
                                    <option value="Vendor">Vendor</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <label class="ven">Vendor Name</label>
                                <select name="vendor" class="form-control ven">
                                    <option value="">Select</option>
                                    <option value="EICHER WORKSHOP">EICHER WORKSHOP</option>
                                    <option value="TULSIDAS">TULSIDAS</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                    <label>Job Order Type</label>
                                <select name="jtype" class="form-control" >
                                    <option value="">Select</option>
                                    <option value="Preventive Maintenance">Preventive Maintenance</option>
                                    <option value="Running Repaire">Running Repaire</option>
                                    <option value="Accident">Accident</option>
                                    <option value="Break Down">Break Down</option>
                                    <option value="Fitness Certificate Renewal">Fitness Certificate Renewal</option>
                                    <option value="Schedule Maintenance">Schedule Maintenance</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <label>Current KM Reading</label>

                                <input type="text" name="km" id="km" class="form-control" autocomplete="off" >
                            </div>
                            <div class="col-sm">
                                <label>Send Date</label>
                                <input type="text" name="send" id="send" value="<?php echo $datestr; ?>" 
                                        class="form-control" readonly >
                            </div>
                            <div class="col-sm">
                                <label>Return Date</label>
                                <input type="text" name="return" id="return" value="<?php echo $datestr; ?>" 
                                        class="form-control" readonly >
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive text-nowrap" id="scroll1">
                            <table id='invtab' border="1" class='table'>
                                <tr style="background-color: #b0d3e8;">
                                    <th>Part Name</th>
                                    <th>Qty</th>
                                    <th>Rate</th>
                                    <th>Amount</th>
                                </tr>
                                <tr id='row1'>
                                    <td>
                                    <select name="pname[]" id="pname" class="form-control" >
                                        <option value="">Select</option>
                                        <?php
                                        $sql = $this->db->get("SparePart");
                                        $result = $sql->result_array();
                                        foreach ($result as $row):
                                            $pname = $row['pname'];
                                        ?>
                                            <option value="<?php echo $pname; ?>"><?php echo $pname; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </td>
                                    <td><input type='text' name='Qty[]' onkeyup="calamt(this)" class="form-control"
                                            autocomplete="off" ></td>
                                    <td><input type='text' name='rate[]' onkeyup="calamt(this)" class="form-control"
                                            autocomplete="off" ></td>
                                    <td><input type='text' name='amount[]' class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <td align='right'>Total</td>
                                    <td><input type='text' id='dtltr' name='dtltr' class="form-control" readonly></td>
                                    <td></td>
                                    <td><input type='text' id='dtamount' name='dtamount' class="form-control" readonly></td>
                                    <td><input type='button' onclick="add_row('dexp');" value='Add Row'></td>
                                </tr>
                            </table>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-sm">
                                <label>Labour Cost</label>
                                <input type="text" name="labour" id="labour" class="form-control" autocomplete="off"
                                    >
                            </div>
                            <div class="col-sm">
                                <label>Total Maintenance Cost</label>
                                <input type="text" name="maintenance" id="maintenance" class="form-control"
                                    autocomplete="off" >
                            </div>
                            <div class="col-sm">
                                <label>Extra Cost</label>
                                <input type="text" name="extra" id="extra" class="form-control" autocomplete="off" >
                            </div>

                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-sm" style="text-align: center;">
                                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-outline-dark btn-fw"><br><br>
                                <a href="PrepareJobReport"><b><h4>Show All!</h4></b></a>
                            </div>
                        </div>
                    </form>    
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var dataList = document.getElementById('json-datalist');
        var input = document.getElementById('vno');

        input.addEventListener('input', function () {
            var query = input.value;

            var request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (request.readyState === 4 && request.status === 200) {
                    var jsonOptions = JSON.parse(request.responseText);

                    // Clear previous options
                    dataList.innerHTML = '';

                    jsonOptions.forEach(function (item) {
                        var option = document.createElement('option');
                        option.value = item.Vehicle_No; // Assuming 'LRNO' is the field from your database
                        dataList.appendChild(option);
                    });
                }
            };

            // Replace 'SearchlrnoReturn' with the actual controller/method URL
            request.open('GET', '<?php echo base_url(); ?>Lredit/vehnum?query=' + encodeURIComponent(query), true);
            request.send();
        });
    });
</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#jdt").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true
            });
            $("#send").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true
            });
            $("#return").datepicker({
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true
            });

            $(".ven").hide();

            $("#stype").on("change", function() {
                var service = $(this).val();
                if (service == "Workshop") {
                    $(".ven").hide();
                }
                if (service == "Vendor") {
                    $(".ven").show();
                }
            });

            // $("#vno").autocomplete({
            //         minLength: 1,
            //         source: 'Lredit/vehnum',
            //         select: function(event, ui) {
            //             $("#vno").val(ui.item.Vehicle_No);
            //             return false;
            //         },
            //         change: function(event, ui) {
            //             if (ui.item == null) {
            //                 event.currentTarget.value = '';
            //                 event.currentTarget.focus();
            //             }
            //         }
            //     })
            //     .autocomplete("instance")._renderItem = function(ul, item) {
            //         return $("<li>")
            //             .append("<div>" + item.Vehicle_No + "</div>")
            //             .appendTo(ul);
            //     };
        });
        var lastrowid = 1;

        function add_row() {
            lastrowid = lastrowid + 1;
            var htmltxt = document.getElementById("row1").innerHTML.replace("hasDatepicker", "");
            htmltxt = htmltxt.replace("invdate1", "invdate" + lastrowid);
            $("#invtab tr:last").before("<tr id='row" + lastrowid + "'>" + htmltxt +
                "<td><input type='button' value='DELETE' onclick=delete_row('row" + lastrowid +
                "','enrexp')></td></tr>");

            $(function() {
                $("#invdate" + lastrowid).datepicker({
                    dateFormat: "dd-mm-yy",
                    changeMonth: true,
                    changeYear: true
                });
            });
        }

        function delete_row(rowno) {
            $('#' + rowno).remove();
        }

        function calamt(e) {
            var qty;
            var wtperpkg;
            var wt;
            var twt = 0;
            var tqty = 0;
            var index = 99;
            var i = 0;

            qty = document.getElementsByName('Qty[]');
            wtperpkg = document.getElementsByName('rate[]');
            wt = document.getElementsByName('amount[]');

            for (i = 0; i < qty.length; i++) {
                if (qty[i] == e) {
                    index = i;
                    break;
                }
            }
            if (index == 99)
                for (i = 0; i < wtperpkg.length; i++) {
                    if (wtperpkg[i] == e) {
                        index = i;
                        break;
                    }
                }

            wt[index].value = parseFloat(qty[index].value) * parseFloat(wtperpkg[index].value);

            for (i = 0; i < qty.length; i++) {
                if (qty[i].value != "") {
                    tqty += parseFloat(qty[i].value);
                }
                if (wt[i].value != "") {
                    twt += parseFloat(wt[i].value);
                }
            }
            document.getElementById("dtltr").value = tqty;
            document.getElementById("dtamount").value = twt;
        }
    </script>



