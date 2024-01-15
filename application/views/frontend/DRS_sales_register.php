<?php include('backend_template.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/misc.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
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
.content-wrapper {
    background: #ffffff;
  /*  padding: 2.75rem 2.25rem;
    width: 100%;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;*/
}
  </style>
    <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">DRS SALES REGISTER</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">DRS Sales Register</li>
          </ol>
        </nav>
      </div>

<div class="bs-example">
       
        <center>
        <form method="post" action="<?= base_url('searchdata1') ?>" target="_blank"  name="form"><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Company</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control form-control-sm" id="select" name="" >
                                <option value="C003 : Transport Management System" selected>C003 : Transport Management System</option>
                            </select>     
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Report Type</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="select" name="" >
                                <option value="">Select</option>
                                <option value="LR Details" selected>LR Details</option>
                                <option value="Bill/MR Details">Bill/MR Details</option>
                                <option value="LS/MF/THS Details">LS/MF/THS Details</option>
                                <option value="PRS/DRS Details">PRS/DRS Details</option>
                                <option value="POD/PFM Details">POD/PFM Details</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Flow Type</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="select" name="" >
                                <option value="">Select</option>
                                <option value="Outgoing">Outgoing</option>
                                <option value="Incoming">Incoming</option>
                                <option value="Both">Both</option>
                            </select>     
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                              <label class="label label-primary">From</label>
                        </div>
                        <div class="col-sm-6">
                            <label class="label label-primary">To</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <table class="table-bordered">
                                <tbody>
                                    <tr>
                                        <td><label>Regional Office</label></td>
                                        <td>
                                            <select class="form-control form-control-sm" id="regional" name="" >
                                                <option value="">Select</option>
                                                <option value="WMRO:WM Regional Office" id="roffice">WMRO:WM Regional Office</option>
                                                <option value="WRO:West Regional Office" id="woffice">WRO:West Regional Office</option>
                                            </select> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Branch/Hub Office</label></td>
                                        <td>
                                            <select class="form-control form-control-sm" id="select" name="" >
                                                <option value="All">All</option>
                                                <option value="All" id="mum">MUMB:MUMBAI</option>
                                                <option value="All" id="nar">NRG:NARAYANGAON</option>
                                                <option value="All" id="pna">PNA:PUNE</option>
                                                <option value="All" id="sang">SGN:SANGAMNER</option>
                                            </select> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Extension Counter</label></td>
                                        <td>
                                            <select class="form-control form-control-sm" id="select" name="" >
                                                <option value="">Select</option>
                                                <option value="All">All</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm">
                            <table class="table-bordered">
                                <tbody>
                                    <tr>
                                        <td><label>Regional Office</label></td>
                                        <td>
                                            <select class="form-control form-control-sm" id="select" name="" >
                                                <option value="">Select</option>
                                                <option value="WMRO:WM Regional Office">WMRO:WM Regional Office</option>
                                                <option value="WRO:West Regional Office">WRO:West Regional Office</option>
                                            </select> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Branch/Hub Office</label></td>
                                        <td>
                                            <select class="form-control form-control-sm" id="select" name="" >
                                                <option value="">Select</option>
                                                <option value="All">All</option>
                                            </select> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Extension Counter</label></td>
                                        <td>
                                            <select class="form-control form-control-sm" id="select" name="" >
                                                <option value="">Select</option>
                                                <option value="All">All</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <div class="col-sm-4">
                            <label>Select Date Range</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="checkdate" type="radio" id="Range" name="range" value="Date Range">Date Range<br>
                            <input class="checkdate" type="radio" id="Week" name="range" value="Last Week" checked>Last Week (Including Today)<br>
                            <input class="checkdate" type="radio" id="Today" name="range" value="Today">Today<br>
                            <input class="checkdate" type="radio" id="Till" name="range" value="Till Date">Till Date
                        </div>
                            <div class="col-sm-1">
                                
                            </div>
                        </div>
                        <div class="col-sm">
                      <div class="col-sm-1">
                            <label>From</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="from" name="from">
                        </div>
                        <div class="col-sm-1">
                            <label>To</label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="to" name="to">
                        </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="heading">
                        <label class="label label-primary">Filters</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Payment Basis</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="payment" name="payment">
                                <option value="">--ALL--</option>
                                <option value="PAID">PAID</option>
                                <option value="TBB">TBB</option>
                                <option value="TO PAY">TO PAY</option>
                                <option value="FOC">FOC</option>
                            </select>    
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Transit Mode</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="transit" name="transit" >
                                <option value="ROAD" selected>ROAD</option>
                            </select>    
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Service Type</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="service" name="service" >
                                <option value="">--ALL--</option>
                                <option value="LTL">LTL</option>
                                <option value="FTL">FTL</option>
                            </select>    
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Business Type</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="business" name="business" >
                                <option value="">--ALL--</option>
                                <option value="Carrier Management-3PL">Carrier Management-3PL</option>
                                <option value="Standard-FTL and Break Bulk">Standard-FTL and Break Bulk</option>
                                <option value="Parcel-Lose Cargo">Parcel-Lose Cargo</option>
                                <option value="Container Cargo">Container Cargo</option>
                            </select>    
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Load Type</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="load" name="load" >
                                <option value="">--ALL--</option>
                                <option value="Return Load">Return Load</option>
                                <option value="Forward Load">Forward Load</option>
                            </select>    
                        </div>
                    </div>
                </div>       

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Status</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="status" name="status" >
                                <option value="">--ALL--</option>
                                <option value="1">Stock And Available</option>
                                <option value="2">Undelivered due to reason</option>
                                <option value="3">Gone for delivery</option>
                                <option value="4">In transit Between</option>
                                <option value="5">Delivered</option>
                                <option value="6">DRS Not Delivered</option>
                                <option value="7">Stock and Available and Undelivered</option>
                                <option value="8">Bill Finalized</option>
                                <option value="9">Bill Not Finalized</option>
                                <option value="10">Cancelled LR</option>
                            </select>    
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Booking Type</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="booking" name="booking" >
                                <option value="">--ALL--</option>
                                <option value="GodownPickupGodownDelivery">Godown Pickup:Godown Delivery</option>
                                <option value="GodownPickupDoorDelivery">Godown Pickup:Door Delivery</option>
                                <option value="DoorPickupGodownDelivery">Door Pickup:Godown Delivery</option>
                                <option value="DoorPickupDoorDelivery">Door Pickup:Door Delivery</option>
                            </select>    
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>From Place</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="SalesReturn" name="SalesReturn" >
                                <option value="">--ALL--</option>
                                <option value="1">Sales Return</option>
                                <option value="2">Without Sales Return</option>
                            </select>    
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Select Customer</label>             
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="CustName" id="CustName" >    
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="heading">
                        <label class="label label-primary">OR</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-1">
                            <label>Select Field</label>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" id="field" name="field" >
                                <option value="">Select</option>
                                <option value="LR NO" selected>LR NO</option>
                                <option value="LR Date">LR Date</option>
                            </select>    
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="checkbox" name="check" id="selectall"><b>DRS Details</b>    
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="LRNO" id="LRNO" checked disabled>LR No
                            <input type="checkbox" name="check[]" value="LRNO" id="LRNO" checked hidden>
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="LRDate" checked>LR Date
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="DRSNO" checked>DRSNO
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="DRSdate" class="check">DRSdate
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="Place" class="check">To Place
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="Consignee" class="check">Consignee
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="VendorName" class="check">VendorName
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="Status" class="check">Status
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="FreightCharge" class="check">FreightCharge
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="Advance" class="check">Advance
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="Hamali" class="check">Hamali
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="FinalHamali" class="check">FinalHamali
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="LaodingHamali" class="check">LaodingHamali
                        </div>
                       
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" value="DriverName" class="check">DriverName
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                         <div class="col-sm">
                            <input type="checkbox" name="check[]" class="check" value="Cosigner">Cosigner
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" class="check" value="DriverMobile">DriverMobile
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" class="check" value="Verified">Verified
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" class="check" value="Penalty">Penalty
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" class="check" value="DeliveryDate">DeliveryDate
                        </div>
                        <!--<div class="col-sm">-->
                        <!--    <input type="checkbox" name="check[]" class="check" value="BookingType">Booking Type-->
                        <!--</div>-->
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" class="check" value="DRSKM">DRSKM
                        </div>
                        <div class="col-sm">
                            <input type="checkbox" name="check[]" class="check" value="EWBNo">EWBNo
                        </div>
                       
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                         <div class="col-sm">
                            <input type="checkbox" name="check[]" class="check" value="EWBDate ">EWBDate 
                        </div>
                        
                </div>

             
    
    <br>
                <div class="button">
        <input type="submit" name="save" id="XLS" value="Download XLS" class="btn btn-outline-dark btn-fw" formaction="<?= base_url('Sales_Register_Controller/xlsxdata2') ?>">
</div><br><br>
        </form>   
                </center>

</div>
</div>
</div>
</div>
</div>
</div>

 <script>
  $("#selectall").click(function () {
            $(".check").prop('checked', $(this).prop('checked'));
        });
    // =====================================
    $(document).ready(function () {
      // Initialize datepicker for From and To inputs
      $("#from, #to").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true });

      // Set default values for Last Week
      setLastWeek();

      // Handle radio button change
      $('input[name=range]').on('change', function () {
        var x = $(this).val();
        if (x == "Last Week") {
          setLastWeek();
        } else if (x == "Today") {
          setToday();
        }
        // Handle other cases as needed
      });

      function setLastWeek() {
        var today = new Date();
        var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
        var lastWeekDisplay = $.datepicker.formatDate('yy-mm-dd', lastWeek);
        var todayDisplay = $.datepicker.formatDate('yy-mm-dd', today);
        $('#from').val(lastWeekDisplay);
        $('#to').val(todayDisplay);
      }

      function setToday() {
        var todayDisplay = $.datepicker.formatDate('yy-mm-dd', new Date());
        $('#from').val(todayDisplay);
        $('#to').val(todayDisplay);
      }
    });
// ==============================================================

     $(function () {
        $("#CustName").autocomplete({
            minLength: 1,
            source: '<?= base_url('Sales_Register_Controller/search') ?>',
            select: function (event, ui) {
                $("#CustName").val(ui.item.CustName);
                $("#CustCode").val(ui.item.CustCode);
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    event.currentTarget.value = '';
                    event.currentTarget.focus();
                }
            },
            open: function () {
                $('.ui-autocomplete').css('width', '400px');
            }
        });

        $("#CustName").autocomplete().data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li>")
                .append("<div>" + item.CustCode + " : " + item.CustName + "</div>")
                .appendTo(ul);
        };
    });

  </script>
