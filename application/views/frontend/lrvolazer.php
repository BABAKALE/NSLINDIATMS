<!DOCTYPE html>
<html lang="en">
<head>
	<title>VTC INVOICE</title>
	<meta charset="utf-8">
</head>
<style>

    @media print {
        body {
            margin: 0px;

        }

        @page {

            size: A5 landscape;

            margin: 5.588mm 4.572mm 5.334mm 4.572mm;


        }
    }

    /* @media print{
    body{
        margin:0px;

    }
    @page {

        size:A4;

       margin: 4mm 6.3mm 0mm 4mm;


    }
    } */
    .verticaltext {
        transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        font-size: 1.3em;
        font-weight: bold;
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083); /* IE6,IE7 */
        -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
        margin-left: -10em;
        margin-right: -10em;
    }

    tr.tab td, th {
        border: 1px solid;
    }

    tr.noBorder td {
        border: 0;
    }

    th, td {
        text-align: center;
    }
    
 .watermark{
    position:relative;
}
.watermark{
    position:absolute;
    bottom:80;
    right:10;
    content:"COPYRIGHT";
    font-size:100px;
    font-weight:500px;
    display:grid;
    transform:rotate(-45deg);
    
}
</style>
<body onload="window.print()" >
	<?php if (isset($lrlaz) && !empty($lrlaz)): ?>
	<?php 
		    $rowgc = $lrlaz['GroupCode'];
		    ?>
		    <?php 
		    	$copies = array('Consignee Copy','Acknowledgement Copy','Consigner Copy');
		       foreach ($copies as $lrcopy):  ?>
<table style='width:100%;border-collapse: collapse;' border=1><tr><td>
	<table style='border-collapse: collapse;width:100%;font-size:0.73em;' border=1>
	<tr>
	<td rowspan="4"><b>NORTHERN STAR LOGISTICS</b><br><img src="assets_old/images/logo192.png" height='50'></td>		 <td rowspan="4" width="40%"><b>CONSIGNMENT NOTE</b><br>H.O.: Vishal House,
		 Sr.No.166, Gajanan Nagar,<br> A/P:Fursungi, Tal: Haveli, Dist: Pune-412308. <br><?php if($rowgc =='0586') echo"CIN No: U60200PN2012PTC142997 <br> GST Code: 996511 PAN: BEIPA7237J"; else echo " CIN No: U60200PN2012PTC142997 <br> GST Code: 996511 PAN: AAECV0781E"; ?>
		 <!-- CIN No: U60200PN2012PTC142997 <br> GST Code: 27BEIPA7237J3ZC PAN: BEIPA7237J -->
		 </td>
		 <th>CN/LR No.</th>
		 <th><?php echo $lrlaz["LRNO"]; ?></th>
	 </tr>
	 <tr>
		  <th>CN/LR Date</th>
		  <th><?php echo $lrlaz["LRDate"]; ?></th>
	 </tr>
	 <tr>
		  <th>Destination</th>
		  <th><?php echo $lrlaz["ToPlace"]; ?></th>
	 </tr>
	 <tr>
		  <th>Delivery Depot</th>
		  <th><?php echo $lrlaz["Deliverydepot"]; ?></th>
	 </tr>
	 </table>
	         <table style='border-collapse: collapse;width:100%;' border=1>
             <tr id="color">
                            <th>Origin</th>
                            <th><?php echo $lrlaz["Origin"]; ?></th>
                            <th>EDD</th>
                            <th><?php echo $lrlaz["EDD"]; ?></th>
                            <th>Payment Type</th>
                            <th><?php echo $lrlaz["PayBasis"] ?></th>
                            <td>
                                <img class="barcode-img" src="<?php echo $imageURL; ?>" alt="Barcode">
                            </td>
                        </tr>
                    </table>
	 <table style='border-collapse: collapse;width:100%;' border=1>
	 <tr style="height:100px;font-size: 0.73em">
		 <th style="text-align:left;vertical-align:top;" width="50%"><b>Consignor :- <br><?php echo str_replace("\n","<br>", $lrlaz["Consignor"]); ?></b>
		  </th> <th style="text-align:left;vertical-align:top;">
		      <b>Consignee :- <br><?php echo str_replace("\n","<br>", $lrlaz["Consignee"]); ?><br><?php echo str_replace("\n","<br>", $lrlaz["ConsigneeAdd"]); ?></b>
		      <br><?php echo str_replace("\n","<br>", $lrlaz["ConsigneeMob"]); ?></b>
		  </th>
	 </tr>
	 </table>
	 <table style='border-collapse: collapse;width:75%;font-size:0.74em;float:left;border: 1px solid;'><tr class='tab'>
         <tr>
             <th colspan="7" style="font-size: 1.10em"><b>INVOICE DETAILS</b></th>
         </tr>
		<th>Qty</th>
		<th>Pkg Type</th>
		<th>Said To</th>
		<th>Weight/Pkg</th>
		<th>Total Weight</th>
		<th>Invoice No</th>
		<th>Invoice Date</th></tr>
		      <?php if (isset($lrlaz1) && !empty($lrlaz1)): ?>           
                <?php $i = 1; ?>
                   <?php foreach ($lrlaz1 as $row1):                   	
                   ?>
                    
			<tr class='tab'><td><?= $row1['PkgsNo']?></td><td><?=$row1['PkgType']?></td><td><?=$row1['ProductType']?></td><td><?=$row1['ActwtperPkg'] ?></td>
			<td><?= $row1['ActualWeight']?></td><td><?= $row1['InvoiceNo']?></td><td><?= $row1['InvDate']?></td></tr>";
			    <?php $i++; ?>
                   <?php endforeach; ?>
                        <?php endif; ?>

			<tr class='tab'><td><b><?=$lrlaz['PkgsNo']?></b></td><td colspan=3 style='text-align:left;'><b>Total Qty</b></td><td><b><?=$lrlaz['ActualWeight']?></b></td>
			<td colspan=2 style='text-align:left;'><b>Total Weight</b></td></tr>
			<tr><td colspan=7 rowspan= ".( 7 - $i)." >&nbsp;</td></tr>

	</table>

	 <table style='border-collapse: collapse;width:25%;float:left' border=1><tr>
		 <th >Cost Head</th>
		 <th >Amount</th></tr>
		 <tr><td>Freight Charge</td><td><?php if($lrlaz["PayBasis"] == "TO PAY" || ( $lrlaz["PayBasis"] == "PAID" && $lrcopy == "Consigner Copy") ) echo $lrlaz["FreightCharge"]; ?></td></tr>
		 <tr><td>Extra Weight</td><td><?php if($lrlaz["PayBasis"] == "TO PAY" || ( $lrlaz["PayBasis"] == "PAID" && $lrcopy == "Consigner Copy")) echo $lrlaz["ExcesswtCharge"]; ?></td></tr>
		 <tr><td>Doc.Charges</td><td><?php if($lrlaz["PayBasis"] == "TO PAY" || ( $lrlaz["PayBasis"] == "PAID" && $lrcopy == "Consigner Copy")) echo $lrlaz["DocCharge"]; ?></td></tr>
		 <tr><td>Door Delivery</td><td><?php if($lrlaz["PayBasis"] == "TO PAY" || ( $lrlaz["PayBasis"] == "PAID" && $lrcopy == "Consigner Copy")) echo $lrlaz["DoordelCharge"]; ?></td></tr>
         <tr><td>Other Charge</td><td><?php if($lrlaz["PayBasis"] == "TO PAY" || ( $lrlaz["PayBasis"] == "PAID" && $lrcopy == "Consigner Copy")) echo $lrlaz["OtherCharge"]; ?></td></tr>
		 <tr><td>GST</td><td><?php if($lrlaz["PayBasis"] == "TO PAY" || ( $lrlaz["PayBasis"] == "PAID" && $lrcopy == "Consigner Copy")) echo $lrlaz["CSGSTAmount"]; ?></td></tr>
		 <tr><td><b>Total Charges</b></td><td><b><?php if($lrlaz["PayBasis"] == "TO PAY" || ( $lrlaz["PayBasis"] == "PAID" && $lrcopy == "Consigner Copy")) echo $lrlaz["DocketTotal"]; ?></b></td></tr>
		 
	</table>
	
	<table style='border-collapse: collapse;font-size:0.73em;width:75%;border: 1px solid;'>
	<tr class="noBorder">
		<td colspan="2" style="text-align:left;"><b>Note - </b></td>
	</tr>
	<tr class="noBorder">
		<td colspan="2" style="text-align:left;"><b><?php if($lrlaz["PayBasis"] == "TO PAY" || ( $lrlaz["PayBasis"] == "PAID" && $lrcopy == "Consigner Copy")) echo "Amount in Words - ".($lrlaz["DocketTotal"]); ?>&nbsp;</b></td>
	</tr>
	<tr class="tab">
		<th colspan="2" style="text-align:left;"><b>*Special Instruction*</b></th>
		<!-- <th><img src="VTCLOGO/recommended stamp.png" alt="VTC Stamp" height="100" style="opacity: 0.2;filter: alpha(opacity=60);"></th> -->
	</tr>
	<tr class="tab">
		<th colspan="2" style="text-align:left;">Cheque/DD should be drawn in favour of  <?php if($rowgc =='0586') echo"NORTHEN STAR LOGISTICS"; else echo "VTC 3PL Services Pvt. Ltd"; ?>.</th>
	</tr>
	<tr class="noBorder">
		<th>GSTIN: <?php if($rowgc =='0586') echo"27BEIPA7237J3ZC"; else echo "27AAECV0781E1ZD"; ?></th>
		<th>PAN: <?php if($rowgc =='0586') echo"BEIPA7237J"; else echo "AAECV0781E"; ?> </th>
	</tr>
	<!--	<tr style="margin-left:10px"><img src="images1/barcode2.jpg" style="width:132px;    float: right;-->
 <!--"</tr>-->
	<tr class="tab">
		<th colspan="2" id="color" style="text-align:left;">Booking Done as per Terms & Condition Accepted By Consignor, Subject to Pune Jurisdiction</th>
	</tr>
	<tr class="tab">
		<th style="text-align:left;">Entered By - <?php echo $lrlaz["CreatedBy"]; ?></th>
		<th><?php echo $lrcopy; ?></th>
	</tr>
		<?php  if($lrlaz["Status"]==2)
	echo  "<div class='watermark'>CANCELLED</div>"; ?>
	
	</table><td style='text-align: center;white-space: nowrap;vertical-align: middle;width: 1.5em;'>
                    <div class="verticaltext"><?php if($rowgc =='0586') echo"www.nslindia.co.in"; else echo "www.vtc3pl.com"; ?> &nbsp;&nbsp; Help Line No. 8282824545</div>
                </td></tr>
	
</table>
<?php endforeach; ?>
              <?php endif; ?>
</body>
</html>
