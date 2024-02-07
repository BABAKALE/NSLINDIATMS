<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;

class Lredit extends CI_Controller {  
    public function __construct(){
        parent::__construct();
        $this->load->model('DataModel');
    }
    public function Editselectlr()
    {

        $this->load->model('Auth_model');

        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));

        $this->load->view('frontend/Editselectlr', $data);
    }
        public function SelectReturnlr()
    {

        $this->load->model('Auth_model');

        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));

        $this->load->view('frontend/SelectReturnlr', $data);
    }
    public function Editlr()
    {
        $this->load->model('Auth_model');

      $data3['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $Lrno = $this->input->get('Lrno');
        $data['lrdata'] = $this->DataModel->lrdataedit($Lrno);
        $data1['lrdata1'] = $this->DataModel->lrdataedit1($Lrno);
        $data2['lrdata2'] =$this->DataModel->Ewbill($Lrno);
        $view_data = array(
        'lrdata' => $data['lrdata'],
        'lrdata1' => $data1['lrdata1'],
        'lrdata2' =>$data2['lrdata2'],
        'user'=>$data3['user']
        );  
        $this->load->view('frontend/Editlr',$view_data);
    }   
   
    public function fetch_data1()
    {
        $conID = $this->input->post('ConID');
        $lrDate = $this->input->post('LRDate');
        $payType = $this->input->post('PayType');       
         $data = $this->DataModel->fetch_data12($conID, $payType, $lrDate);
        // $this->output
        //     ->set_content_type('application/json')
        //     ->set_output(json_encode($data));
        echo json_encode($data);
    }
    public function fetch_dataEdit()
    {
        $ContractID=$this->input->post('ContractID');
        $Qty=$this->input->post('Qty');
        $ToPlace=$this->input->post('ToPlace');
        $MA=$this->input->post('MA');
        $data=$this->DataModel->fetch_dataEdit1($ContractID,$Qty,$ToPlace,$MA);
        echo json_encode($data);
    }

	public function checkcityEdit()
	{
	    $term = $this->input->get('term');
	    $cityExists = $this->DataModel->checkcityEdit1($term);

	    if ($cityExists) {
	        echo "Success";
	    } else {
	        echo "Failed";
	    }
	}
    public function update()
    {
        $InvoiceNo=$this->input->post('invoiceno');
         if ($this->input->post('Consigneefrom') == "From Master") {
            $Consignee = $this->input->post('FMConsigneeName');
            $ConsigneeAdd = "";
            $ConsigneeMob = "";
            $ConsigneeId = $this->input->post('FMConsignee');
            $ConsigneeMar = "";
            $ConsigneeAddMar = "";
        } else {
            $Consignee =$this->input->post('WIConsignee');
            $ConsigneeAdd = $this->input->post('WIConsigneeadd');
            $ConsigneeMar = $this->input->post('WIConsigneeMar');
            $ConsigneeAddMar = $this->input->post('WIConsigneeaddMar');
            $ConsigneeMob =$this->input->post('WIConsigneemob');
            $ConsigneeId = "8888";
        }
        if ($this->input->post('Consignorfrom') == "From Master") {
            $Consignor = $this->input->post('FMConsignorName');
            $ConsignorAdd = "";
            $ConsignorMob = "";
            $ConsignorId = $this->input->post('FMConsignor');
        } else {
            $Consignor = $this->input->post('WIConsignor');
            $ConsignorAdd = $this->input->post('WIConsignoradd');
            $ConsignorMob = $this->input->post('WIConsignormob');
            $ConsignorId = "8888";
        }

        $Updatedata = array(
            'Lrno' => $this->input->post('LRNO'),
            'lrdate' => $this->input->post('lrdate'),
            'paytype' => $this->input->post('paytype'),
            'partyid' => $this->input->post('partyid'),
            'partyname' => $this->input->post('partyname'),
            'Origin' => $this->input->post('Origin'),
            'Destination' => $this->input->post('Destination'),
            'mot' => $this->input->post('mot'),
            'BookingType'=>$this->input->post('servicetype'),
            'servicetype' => $this->input->post('servicetype'),         
            'tomove' => $this->input->post('tomove'),
            'pickdeli' => $this->input->post('pickdeli'),
            'fromcity' => $this->input->post('fromcity'),
            'tocity' => $this->input->post('tocity'),
            'FMConsignor' =>$ConsignorId ,
            'FMConsignorName' => $Consignor,
            'WIConsignor' => $Consignor,
            'WIConsignoradd' =>$ConsignorAdd,
            'WIConsignormob'=>$ConsignorMob,
            'FMConsignee' => $ConsigneeId,
            'FMConsigneeName' =>$Consignee,
             'Consignee'=>$Consignee,
            'WIConsigneeMar' => $ConsigneeMar,
            'WIConsigneeadd' => $ConsigneeAdd,
            'WIConsigneeaddMar' => $ConsigneeAddMar,
            'WIConsigneemob' =>$ConsigneeMob,
            'InvoiceNos' => implode(",", $InvoiceNo),
            'NumberOfInvoices' => count($InvoiceNo),
            'invoicedate'=>$this->input->post('invoicedate'),
            'pkgtype'=>$this->input->post('pkgtype'),
            'ProductType'=>$this->input->post('prodtype'),
            'Invoicevalue'=>$this->input->post('declval'),
            'pkgno'=>$this->input->post('pkgno'),
            'tpkgno'=>$this->input->post('tpkgno'),
            'actwtperpkg'=>$this->input->post('actwtperpkg'),
            'actwt'=>$this->input->post('actwt'),
            'Exwtchrgs'=>$this->input->post('Exwtchrgs'),
            'tactwt'=>$this->input->post('tactwt'),
            'Exwtchrgs'=>$this->input->post('Exwtchrgs'),
            'freightotal'=>$this->input->post('freightotal'),
            'freightrate'=>$this->input->post('freightrate'),
            'freighttype'=>$this->input->post('freighttype'),
             'doccharge'=>$this->input->post('doccharge'),
            'hamalicharge'=>$this->input->post('hamalicharge'),
            'othercharge'=>$this->input->post('othercharge'),
            'doordelcharge'=>$this->input->post('doordelcharge'),
            'excesscharge'=>$this->input->post('excesscharge'),
            'csgstrate'=>$this->input->post('csgstrate'),
            'csgst'=>$this->input->post('csgst'),
            'grandtotal'=>$this->input->post('grandtotal'),
            'eddate'=>$this->input->post('eddate'),
            'EwbNos' => explode(",", $this->input->post('EWBNOS'))
        );

        $data=$this->DataModel->updatelrdata($Updatedata,$InvoiceNo);
        print_r($Updatedata);

    }
    public function SearchcustCode()
    {
        $term = $this->input->get('term');
        $customers=$this->DataModel->fetchcustCode($term);
        $data = [];
        foreach ($customers as $customer) {
            $data[] = [
                'CustCode' => $customer->CustCode,
                'CustName' => $customer->CustName,
            ];
        }
        echo json_encode($data);
    }
    public function FMConsignees1(){
        $term=$this->input->get('term');
        $partyid=$this->input->get('partyid');
        $city=$this->input->get('city');
        $fmconsignee=$this->DataModel->fmconsignee($term,$partyid,$city);
        $data = [];

              foreach ($fmconsignee as $consi) {
            $data[] = [
                'CustCode' => $consi->CustCode,
                'CustName' => $consi->CustName,
            ];
        }
        echo json_encode($data);
    }
    public function CityName()
    {
        $term=$this->input->get('term');
        $CityNamet=$this->DataModel->CityNameEng($term);
        $data = [];
              foreach ($CityNamet as $Name) {
            $data[] = [
                'CityNameEng' => $Name->CityNameEng,
                'District' => $Name->District,
            ];
        }
        echo json_encode($data);
    }
        public function RetrunLr()
    {
        $this->load->model('Auth_model');

      $data3['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $Lrno = $this->input->get('Lrno');
        $data['lrdata'] = $this->DataModel->lrdataedit($Lrno);
        $data1['lrdata1'] = $this->DataModel->lrdataedit1($Lrno);
        $data2['lrdata2'] =$this->DataModel->Ewbill($Lrno);
        $view_data = array(
        'lrdata' => $data['lrdata'],
        'lrdata1' => $data1['lrdata1'],
        'lrdata2' =>$data2['lrdata2'],
        'user'=>$data3['user']
        );  
        $this->load->view('frontend/RetrunLr',$view_data);
    }
        public function RetrunLrInsert()
    {       
        $userdepo='PNA';
        $InvoiceNo=$this->input->post('invoiceno');
         if ($this->input->post('Consigneefrom') == "From Master") {
            $Consignee = $this->input->post('FMConsigneeName');
            $ConsigneeAdd = "";
            $ConsigneeMob = "";
            $ConsigneeId = $this->input->post('FMConsignee');
            $ConsigneeMar = "";
            $ConsigneeAddMar = "";
        } else {
            $Consignee =$this->input->post('WIConsignee');
            $ConsigneeAdd = $this->input->post('WIConsigneeadd');
            $ConsigneeMar = $this->input->post('WIConsigneeMar');
            $ConsigneeAddMar = $this->input->post('WIConsigneeaddMar');
            $ConsigneeMob =$this->input->post('WIConsigneemob');
            $ConsigneeId = "8888";
        }
        if ($this->input->post('Consignorfrom') == "From Master") {
            $Consignor = $this->input->post('FMConsignorName');
            $ConsignorAdd = "";
            $ConsignorMob = "";
            $ConsignorId = $this->input->post('FMConsignor');
        } else {
            $Consignor = $this->input->post('WIConsignor');
            $ConsignorAdd = $this->input->post('WIConsignoradd');
            $ConsignorMob = $this->input->post('WIConsignormob');
            $ConsignorId = "8888";
        }

        $Updatedata = array(
            'Lrno' => $this->input->post('LRNO'),
            'lrdate' => $this->input->post('lrdate'),
            'CoastCenter'=>$this->input->post('CoastCenter'),
            'paytype' => $this->input->post('paytype'),
            'partyid' => $this->input->post('partyid'),
            'CurrentLocation'=>'PNA',
            'partyname' => $this->input->post('partyname'),
            'Origin' => $this->input->post('Origin'),
            'Destination' => $this->input->post('Destination'),
            'mot' => $this->input->post('mot'),
            'BookingType'=>$this->input->post('servicetype'),
            'servicetype' => $this->input->post('servicetype'),         
            'tomove' => $this->input->post('tomove'),
            'pickdeli' => $this->input->post('pickdeli'),
            'fromcity' => $this->input->post('fromcity'),
            'tocity' => $this->input->post('tocity'),
            'FMConsignor' =>$ConsignorId ,
            'FMConsignorName' => $Consignor,
            'WIConsignor' => $Consignor,
            'WIConsignoradd' =>$ConsignorAdd,
            'WIConsignormob'=>$ConsignorMob,
            'FMConsignee' => $ConsigneeId,
            'FMConsigneeName' =>$Consignee,
             'Consignee'=>$Consignee,
            'WIConsigneeMar' => $ConsigneeMar,
            'WIConsigneeadd' => $ConsigneeAdd,
            'WIConsigneeaddMar' => $ConsigneeAddMar,
            'WIConsigneemob' =>$ConsigneeMob,
            'InvoiceNos' => implode(",", $InvoiceNo),
            'NumberOfInvoices' => count($InvoiceNo),
            'invoicedate'=>$this->input->post('invoicedate'),
            'pkgtype'=>$this->input->post('pkgtype'),
            'ProductType'=>$this->input->post('prodtype'),
            'Invoicevalue'=>$this->input->post('declval'),
            'pkgno'=>$this->input->post('pkgno'),
            'tpkgno'=>$this->input->post('tpkgno'),
            'actwtperpkg'=>$this->input->post('actwtperpkg'),
            'actwt'=>$this->input->post('actwt'),
            'Exwtchrgs'=>$this->input->post('Exwtchrgs'),
            'tactwt'=>$this->input->post('tactwt'),
            'Exwtchrgs'=>$this->input->post('Exwtchrgs'),
            'freightotal'=>$this->input->post('freightotal'),
            'freightrate'=>$this->input->post('freightrate'),
            'freighttype'=>$this->input->post('freighttype'),
             'doccharge'=>$this->input->post('doccharge'),
            'hamalicharge'=>$this->input->post('hamalicharge'),
            'othercharge'=>$this->input->post('othercharge'),
            'doordelcharge'=>$this->input->post('doordelcharge'),
            'excesscharge'=>$this->input->post('excesscharge'),
            'csgstrate'=>$this->input->post('csgstrate'),
            'csgst'=>$this->input->post('csgst'),
            'grandtotal'=>$this->input->post('grandtotal'),
            'eddate'=>$this->input->post('eddate'),
            'EwbNos' => explode(",", $this->input->post('EWBNOS'))
        );

        $data=$this->DataModel->insertreturn($Updatedata,$InvoiceNo,$userdepo);
        print_r($data);

    }
    public function SearchlrnoReturn()
    {
        $this->load->model('Auth_model');
        $data = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $userdepo=$data->Depot;
        $term=$this->input->get('query');
        $data=$this->DataModel->lrdataselect($term,$userdepo);
        echo json_encode($data);

    }
    public function Loadingsheet()
    {
        $this->load->model('Auth_model');

        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));

        $this->load->view('frontend/Loadingsheet', $data);
    }
    public function depotse()
    {
        $data=$this->DataModel->selectdepo();
        echo json_encode($data);

    }
    public function getlrdataJUNE()
    {
        $lrno=$this->input->post('LRNO');
        $data=$this->DataModel->fetchgetlrdataJUNE($lrno);
        if (!empty($data)) {
        foreach ($data as $row) {
            echo "<td><input type='hidden' name='LRNO[]' value='" . $row->LRNO . "'>" . $row->LRNO . "</td>";
            echo "<td>" . $row->LRDate . "</td>";
            echo "<td>" . $row->PayBasis . "</td>";
            echo "<td>" . $row->FromPlace . "</td>";
            echo "<td>" . $row->ToPlace . "</td>";
            echo "<td>" . $row->ArriveDate . "</td>";
            echo "<td>" . ($row->PkgsNo - $row->DeliveredQty) . "</td>";
            echo "<td>" . $row->ActualWeight . "</td>";
            echo "<td>" . $row->DocketTotal . "</td>";
          }
        }
         else {
            echo "No Data."; // Handle if no data is found
        }
    }
    public function InsertLsThc()
    {
        if ($this->input->is_ajax_request()) 
       {
        $this->load->model('Auth_model');
        $data = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $userdepot=$data->Depot;
            $Gp = $this->input->post('Gp');
           $lrlist = "'" . implode("','", $_POST['LRNO']) . "'";
           $totaltopay = $this->input->post('totaltopay');
           $Contract = $this->input->post('Contract');
           $data=$this->DataModel->InsertThcloading($userdepot,$lrlist,$totaltopay,$Contract,$Gp);
           echo $data;
        }
    }
    public function InsertLsDrs()
    {
        if ($this->input->is_ajax_request()) 
       {

            $this->load->model('Auth_model');
            $data = $this->Auth_model->user_data($this->session->userdata('user_id'));
            $userdepot=$data->Depot;
            $Gp = $this->input->post('Gp');
           $lrlist = "'" . implode("','", $_POST['LRNO']) . "'";
           $totaltopay = $this->input->post('totaltopay');
           $Contract = $this->input->post('Contract');
           $data=$this->DataModel->InsertDrsloading($userdepot,$lrlist,$totaltopay,$Contract,$Gp);
           echo $data;
        }
    }
    public function Viewloadingsheet()
    {
        $this->load->model('Auth_model');
        $data3['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $LSNO = trim($this->input->get('Lsno'));
        $data['lrdata'] = $this->DataModel->viewlssearch($LSNO);
        $view_data = array(
            'lrdata' => $data['lrdata'],
            'user' => $data3['user']
        );

        $this->load->view('frontend/Viewloadingsheet',$view_data);

    }


    public function MultiLr()
    {
        $this->load->model('Auth_model');
        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $this->load->view('frontend/Multiplelrprint', $data);
    }
    public function fetchconsignor()
    {
        $this->load->model('Auth_model');
        $userData = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $userDepot = $userData->Depot;
        $startDate = $this->input->get('startdate');
        $endDate = $this->input->get('enddate');
        $consignorData = $this->DataModel->fetchconsignor($userDepot, $startDate, $endDate);
        echo json_encode($consignorData);
    }
    public function SelectConsidata()
    {
        $this->load->model('Auth_model');
        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $depo = $data['user']->Depot;
        $dt1 = $this->input->post('startdate');
        $dt2 = $this->input->post('enddate');
        $Consigner = $this->input->post('Consigner');
        $data['Considata']=$this->DataModel->SelectConsidatafetch($dt1,$dt2,$Consigner,$depo);
        $this->load->view('frontend/Multiplelrprint', $data);
    }
    public function lrlazer()
    {
        $LRNO = $_GET['LRNO'];
        $barcode = generate_barcode($LRNO);
        $imagePath = FCPATH . 'barcode.png';
        file_put_contents($imagePath, $barcode);

        $this->load->helper('url');
        $imageURL = base_url('barcode.png');
        $data['lrlaz']=$this->DataModel->lrlazerprtint($LRNO);
        $data['lrlaz1']=$this->DataModel->lrlazerprtint1($LRNO);
        $array=[
            'lrlaz'=>$data['lrlaz'],
            'lrlaz1'=>$data['lrlaz1'],
            'imageURL'=>$imageURL
        ];
        $this->load->view('frontend/lrvolazer', $array);
        
    }
    public function Multiplelr()
    {

        if (!$this->input->post('Copies')) {
            exit("No LR Copies Selected.</body></html>");
        }

        if (!$this->input->post('LRNO')) {
            exit("No LRNOs Selected.</body></html>");
        }

        $copies = $this->input->post('Copies');
        $LRNO = $this->input->post('LRNO');
        
        $data['alldata'] = $this->DataModel->multiplelrdata($LRNO);
        $array = [
            'data' => $data['alldata'],
            'copies' => $copies
        ];

        $this->load->view('frontend/multilrlazer', $array);
    } 
   public function fetchconsignor1()
    {
        $startDate = $this->input->get('startdate');
        $endDate = $this->input->get('enddate');
        $Depot=$this->input->get('Depot');
        $consignorData = $this->DataModel->fetchConsignor1($Depot, $startDate, $endDate);        
        echo json_encode($consignorData);
    }
    public function SelectSatetment()
    {
        $this->load->model('Auth_model');
        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $d1 = $this->input->post('startdate');
        $d2 = $this->input->post('enddate');
        $Depot=$this->input->post('Depot');
        $Consigner=$this->input->post('Consigner');
        $data['Data']=$this->DataModel->datastatement($d1,$d2,$Depot,$Consigner);
        $this->load->view('frontend/StatementBarcode', $data);
    }
    public function Createstatement()
    {
        $this->load->model('Auth_model');
        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $userdepo = $data['user']->Depot;
        $user=$data['user']->UserName;
        $LRNO = $this->input->post('LRNO');
        $data=$this->DataModel->Insertstatement($LRNO,$userdepo,$user);
        $barcode = generate_barcode($data);
        $imagePath = FCPATH . 'barcode.png';
        file_put_contents($imagePath, $barcode);
        $this->load->helper('url');
        $imageURL = base_url('barcode.png');
        $datastat['Stat']=$this->DataModel->fetch_statement($data);
        $array=[
            'imageURL'=>$imageURL,
            'Stat'=>$datastat['Stat']
        ];
        $this->load->view('frontend/printstatement', $array);
 
       
    }
    public function StatementBarcode()
    {
        $this->load->model('Auth_model');
        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $this->load->view('frontend/StatementBarcode', $data);
    }
    public function selectlrconsigner()
    {
        $this->load->model('Auth_model');
        $data = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $userdepo=$data->Depot;
        $term=$this->input->get('query');
        $Consigner=$this->input->get('consigner');
        $d1=$this->input->get('d1');
        $d2=$this->input->get('d2');
        $Depot=$this->input->get('Depot');
        $data=$this->DataModel->selectlrconsigner1($term,$userdepo,$Consigner,$d1,$d2,$Depot);
        echo json_encode($data);

    }
    public function getdatastatement()
    {
       $LRNO=$this->input->post('LRNO');
       $Depot=$this->input->post('Depot');
       $Consigner=$this->input->post('Consigner');
       $this->load->model('Auth_model');
       $data = $this->Auth_model->user_data($this->session->userdata('user_id'));
       $userdepo=$data->Depot;
       $d1=$this->input->post('d1');
       $d2=$this->input->post('d2');
       $data=$this->DataModel->getdatastatement($LRNO,$Depot,$Consigner,$d1,$d2,$userdepo);
       if(!empty($data))
       {
        foreach ($data as $row) {
            echo "<td><input type='hidden' name='LRNO[]' value='" . $row->LRNO . "'>" . $row->LRNO . "</td>";
            echo "<td>" . $row->BookingDate . "</td>";
          }
       }
        else {
            echo "No Data."; // Handle if no data is found
        }
       

    }
    public function PrepareJob()
    {
        $this->load->model('Auth_model');
        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $this->load->view('frontend/PrepareJob', $data);
    }
    public function vehnum()
    {
        $term = $this->input->get('query');
        $data=$this->DataModel->fetch_vehnum($term);
        echo json_encode($data);

    }
    public function createprejob()
    {
        try{
            $query = $this->db->query("
            SELECT MAX(CAST(SUBSTRING(JobId, 6, 6) AS UNSIGNED)) StatMax FROM PrepareJob");
        if ($query->num_rows() == 0) {
            $id = 1;
        } else {
            $row = $query->row();
            $maxValue = $row->StatMax;
            $id = is_null($maxValue) ? 1 : $maxValue + 1;
        } 
        $joid = "JB" . str_pad($id, 6, 0, STR_PAD_LEFT);
        $vno=$this->input->post('vno');
        $jdt=$this->input->post('jdt');
        $stype=$this->input->post('stype');
        $vendor=$this->input->post('vendor');
        $jtype=$this->input->post('jtype');
        $km=$this->input->post('km');
        $send=$this->input->post('send');
        $return=$this->input->post('return');
        $pnames=$this->input->post('pname');
        $qtys=$this->input->post('Qty');
        $rates=$this->input->post('rate');
        $amounts=$this->input->post('amount');
        $labour=$this->input->post('labour');
        $maintenance=$this->input->post('maintenance');
        $extra=$this->input->post('extra');
        $success=true;
        for ($i = 0; $i < count($pnames); $i++) {
            $pname = $pnames[$i];
            $qty = $qtys[$i];
            $rate = $rates[$i];
            $amount = $amounts[$i];
            $s = "SELECT * FROM SparePart WHERE pname='$pname'";
            $q = $this->db->query($s);
            $row = $q->row();
            $existingQty = $row->UpdatedQty;
            $newUpdatedQty = $existingQty - $qty;
            $this->db->trans_start();
            $this->db->query("INSERT INTO PrepareJob (JobId, Vehicle, JobDate, ServiceType, VendorName, JobType, CurrentKM, SendDate, ReturnDate, pname, qty, rate, amount, LabourCost, MaintenanceCost, ExtraCost) VALUES 
            ('$joid', '$vno', STR_TO_DATE('$jdt','%d-%m-%Y'), '$stype', '$vendor', '$jtype', '$km', STR_TO_DATE('$send','%d-%m-%Y'), STR_TO_DATE('$return','%d-%m-%Y'), '$pname', '$qty', '$rate', '$amount', '$labour', '$maintenance', '$extra')");
            $this->db->query("UPDATE SparePart SET UpdatedQty = '$newUpdatedQty' WHERE pname='$pname'");
            $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $success = false; 
                    throw new \Exception('Error inserting data into sapthcmaster');
                } else {
                    $this->db->trans_commit();
                }
                if ($success) {
                    echo "Success! All data inserted successfully.";
                } else {
                    echo "Error! Some data failed to insert.";
                }
            }
        }
        catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', $e->getMessage());
            throw new \Exception('Error inserting data into loadingthc and updating LSNO in Lr');
        }
        $this->load->model('Auth_model');
        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $data['data'] = $this->DataModel->fetch_vehichpre();
        $this->load->view('frontend/PrepareJobReport', $data);
        
    }
    public function PrepareJobReport()
    {
        $this->load->model('Auth_model');
        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $data['data'] = $this->DataModel->fetch_vehichpre();
        $this->load->view('frontend/PrepareJobReport', $data);
    }

    public function cpcommision()
    {
        $this->load->model('Auth_model');
        $data['user'] = $this->Auth_model->user_data($this->session->userdata('user_id'));
        $d1=$this->input->post('startdate');
        $d2=$this->input->post('enddate');
        $data['Data'] = $this->DataModel->fetch_commission($d1,$d2);
        $this->load->view('frontend/cpcommision', $data);
    }


}