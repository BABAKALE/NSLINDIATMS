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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>

<!-- jQuery UI JS -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

   <style type="text/css">
    .table-container {
      width: 90%;
      overflow-x: auto;
  }
  #invtab {
      border-collapse: collapse;
      width: 90%;
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
      width: 90%;
      padding: 5px;
      box-sizing: border-box;
  }kground-color: #e4e3e3


  body{

background-color: #eee; 
}

table th , table td{
text-align: center;
}

table tr:nth-child(even){
background-color: #e4e3e3
}

th {
background: #333;
color: #fff;
}

.pagination {
margin: 0;
}

.pagination li:hover{
cursor: pointer;
}

.header_wrap {
padding:30px 0;
}
.num_rows {
width: 20%;
float:left;
}
.tb_search{
width: 20%;
float:right;
}
.pagination-container {
width: 70%;
float:left;
}

.rows_count {
width: 20%;
float:right;
text-align:right;
color: #999;
}
</style>

<div class="container" >
    <div class="header_wrap">
		<div class="row">
			<div class="num_rows">
				<div class="form-group" >
					<select class  ="form-control" name="state" id="maxRows">
						<option value="10">10</option>
						<option value="15">15</option>
						<option value="20">20</option>
						<option value="50">50</option>
						<option value="70">70</option>
						<option value="100">100</option>
						<option value="5000">Show ALL Rows</option>
					</select>
				</div>
			</div>
            <div class="tb_search">
				<input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search.." class="form-control">
			</div>
			<div class="col-sm">
			<button class="btn btn-primary" onclick="ExportToExcel('xlsx')"><i class="fa fa-file-excel"> Excel </i></button>
		</div>

		</div>	
		<br>
			<div class="table-container">
				<table id="invtab" class="table table-striped table-class table-responsive" align='center' >
					<?php if (isset($data) && !empty($data)):?>
					<thead>
						<tr style="background-color: #b0d3e8;">
						<th>Job Id</th>
						<th>Vehicle</th>
						<th>Job Date</th>
						<th>Service Type</th>
						<th>Vendor Name</th>
						<th>Job Type</th>
						<th>Current Km</th>                        
						<th>Send Date</th>
						<th>Return Date</th>         
						<th>Pname</th>
						<th>Quantity</th>
						<th>Rate</th>
						<th>Amount</th>
						<th>Labour Cost</th>          
						<th>Maintainanace Cost</th>
						<th>Extra Cost</th>
						</tr>
					</thead>
					<?PHP foreach ($data as $row):  ?>
					<tbody>
						<tr class='tab'>
							<td><?= $row->JobId ?></td>
							<td><?=$row->Vehicle ?></td>
							<td><?=$row->JobDate?></td>
							<td><?=$row->ServiceType?></td>
							<td><?= $row->VendorName?></td>
							<td><?=$row->JobType?></td>
							<td><?=$row->CurrentKM?></td>
							<td><?=$row->SendDate ?></td>
							<td><?=$row->ReturnDate?></td>
							<td><?=$row->pname?></td>
							<td><?=$row->qty ?></td>
							<td><?=$row->rate?></td>
							<td><?=$row->amount ?></td>
							<td><?=$row->LabourCost?></td>
							<td><?=$row->MaintenanceCost?></td>
							<td><?=$row->ExtraCost ?></td>
						</tr>
					<tbody>
					<?php endforeach; ?>
				</table>
			</div>
	<?php endif; ?>
<!--		Start Pagination -->
			<div class='pagination-container'>
				<nav>
				  <ul class="pagination">
				   <!--	Here the JS Function Will Add the Rows -->
				  </ul>
				</nav>
			</div>
      <div class="rows_count">Showing 11 to 20 of 91 entries</div>

</div> 
<script>
  function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('invtab');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet" });
    return dl ?
      XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
      XLSX.writeFile(wb, fn || ('PrepareJobReport.' + (type || 'xlsx')));
  }
</script>
<script>
  getPagination('#invtab');
	$('#maxRows').trigger('change');
	function getPagination (table){

		  $('#maxRows').on('change',function(){
		  	$('.pagination').html('');						// reset pagination div
		  	var trnum = 0 ;									// reset tr counter 
		  	var maxRows = parseInt($(this).val());			// get Max Rows from select option
        
		  	var totalRows = $(table+' tbody tr').length;		// numbers of rows 
			 $(table+' tr:gt(0)').each(function(){			// each TR in  table and not the header
			 	trnum++;									// Start Counter 
			 	if (trnum > maxRows ){						// if tr number gt maxRows
			 		
			 		$(this).hide();							// fade it out 
			 	}if (trnum <= maxRows ){$(this).show();}// else fade in Important in case if it ..
			 });											//  was fade out to fade it in 
			 if (totalRows > maxRows){						// if tr total rows gt max rows option
			 	var pagenum = Math.ceil(totalRows/maxRows);	// ceil total(rows/maxrows) to get ..  
			 												//	numbers of pages 
			 	for (var i = 1; i <= pagenum ;){			// for each page append pagination li 
			 	$('.pagination').append('<li data-page="'+i+'">\
								      <span>'+ i++ +'<span class="sr-only">(current)</span></span>\
								    </li>').show();
			 	}											// end for i 
     
         
			} 												// end if row count > max rows
			$('.pagination li:first-child').addClass('active'); // add active class to the first li 
        
        
        //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
       showig_rows_count(maxRows, 1, totalRows);
        //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT

        $('.pagination li').on('click',function(e){		// on click each page
        e.preventDefault();
				var pageNum = $(this).attr('data-page');	// get it's number
				var trIndex = 0 ;							// reset tr counter
				$('.pagination li').removeClass('active');	// remove active class from all li 
				$(this).addClass('active');					// add active class to the clicked 
        
        
        //SHOWING ROWS NUMBER OUT OF TOTAL
       showig_rows_count(maxRows, pageNum, totalRows);
        //SHOWING ROWS NUMBER OUT OF TOTAL
        
        
        
				 $(table+' tr:gt(0)').each(function(){		// each tr in table not the header
				 	trIndex++;								// tr index counter 
				 	// if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
				 	if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
				 		$(this).hide();		
				 	}else {$(this).show();} 				//else fade in 
				 }); 										// end of for each tr in table
					});										// end of on click pagination list
		});
											// end of on select change 
		 
								// END OF PAGINATION 
    
	}	


			

// SI SETTING
$(function(){
	// Just to append id number for each row  
default_index();
					
});

//ROWS SHOWING FUNCTION
function showig_rows_count(maxRows, pageNum, totalRows) {
   //Default rows showing
        var end_index = maxRows*pageNum;
        var start_index = ((maxRows*pageNum)- maxRows) + parseFloat(1);
        var string = 'Showing '+ start_index + ' to ' + end_index +' of ' + totalRows + ' entries';               
        $('.rows_count').html(string);
}

// CREATING INDEX
function default_index() {
  $('table tr:eq(0)').prepend('<th> ID </th>')

					var id = 0;

					$('table tr:gt(0)').each(function(){	
						id++
						$(this).prepend('<td>'+id+'</td>');
					});
}

// All Table search script
function FilterkeyWord_all_table() {
  
// Count td if you want to search on all table instead of specific column

  var count = $('.table').children('tbody').children('tr:first-child').children('td').length; 

        // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("search_input_all");
  var input_value =     document.getElementById("search_input_all").value;
        filter = input.value.toLowerCase();
  if(input_value !=''){
        table = document.getElementById("invtab");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
          
          var flag = 0;
           
          for(j = 0; j < count; j++){
            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
             
                var td_text = td.innerHTML;  
                if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
                //var td_text = td.innerHTML;  
                //td.innerHTML = 'shaban';
                  flag = 1;
                } else {
                  //DO NOTHING
                }
              }
            }
          if(flag==1){
                     tr[i].style.display = "";
          }else {
             tr[i].style.display = "none";
          }
        }
    }else {
      //RESET TABLE
      $('#maxRows').trigger('change');
    }
}
</script>






