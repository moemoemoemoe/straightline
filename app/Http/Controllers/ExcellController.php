<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailing;
use App\Insurance;
use App\Callback;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
class ExcellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export_mailing_excell($type)
    {
        date_default_timezone_set("Asia/Beirut");
        $current_date_time  =  date("Y-m-d")."-".date("h-i-sa");
        $mailings = Mailing::all();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'Full Name');
$sheet->setCellValue('C1', 'Email');
// $sheet->setCellValue('D1', 'Skills');
// $sheet->setCellValue('E1', 'Address');
// $sheet->setCellValue('F1', 'Designation');
$rows = 2;
foreach($mailings as $mailingDetails){
$sheet->setCellValue('A' . $rows, $mailingDetails['id']);
$sheet->setCellValue('B' . $rows, $mailingDetails['full_name']);
$sheet->setCellValue('C' . $rows, $mailingDetails['email']);

$rows++;
}
$fileName = "mailing_list_".$current_date_time.".".$type;
if($type == 'xlsx') {
$writer = new Xlsx($spreadsheet);
} else if($type == 'xls') {
$writer = new Xls($spreadsheet);
}
$writer->save("uploads/excell/mailing/".$fileName);
header("Content-Type: application/vnd.ms-excel");
return redirect(url('/')."/uploads/excell/mailing/".$fileName);
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function export_insurance_excell($type)
    {
        date_default_timezone_set("Asia/Beirut");
        $current_date_time  =  date("Y-m-d")."-".date("h-i-sa");
        $insurances = Insurance::all();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'Full Name');
$sheet->setCellValue('C1', 'Father Name');
$sheet->setCellValue('D1', 'Phone');
$sheet->setCellValue('E1', 'Email');
$sheet->setCellValue('F1', 'Dob');
$sheet->setCellValue('G1', 'Passport Id');
$sheet->setCellValue('H1', 'Depart Date');
$sheet->setCellValue('I1', 'Return Date');
$sheet->setCellValue('J1', '# Adult');
$sheet->setCellValue('K1', '# Child');

$rows = 2;
foreach($insurances as $insurance){
$sheet->setCellValue('A' . $rows, $insurance['id']);
$sheet->setCellValue('B' . $rows, $insurance['full_name']);
$sheet->setCellValue('C' . $rows, $insurance['father_name']);
$sheet->setCellValue('D' . $rows, $insurance['phone']);
$sheet->setCellValue('E' . $rows, $insurance['email']);
$sheet->setCellValue('F' . $rows, $insurance['dob']);
$sheet->setCellValue('G' . $rows, $insurance['pass_id']);
$sheet->setCellValue('H' . $rows, $insurance['depart_date']);
$sheet->setCellValue('I' . $rows, $insurance['return_date']);
$sheet->setCellValue('J' . $rows, $insurance['adult']);
$sheet->setCellValue('K' . $rows, $insurance['child']);



$rows++;
}
$fileName = "insurance_list_".$current_date_time.".".$type;
if($type == 'xlsx') {
$writer = new Xlsx($spreadsheet);
} else if($type == 'xls') {
$writer = new Xls($spreadsheet);
}
$writer->save("uploads/excell/insurance/".$fileName);
header("Content-Type: application/vnd.ms-excel");
return redirect(url('/')."/uploads/excell/insurance/".$fileName);
}
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function export_callback_excell($type)
    {
        date_default_timezone_set("Asia/Beirut");
        $current_date_time  =  date("Y-m-d")."-".date("h-i-sa");
        $callbacks = Callback::all();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'Full Name');
$sheet->setCellValue('C1', 'Phone');
$sheet->setCellValue('D1', 'Email');
$sheet->setCellValue('E1', 'Target');
$sheet->setCellValue('F1', 'Designation');
$sheet->setCellValue('G1', 'Season');

$rows = 2;
foreach($callbacks as $callback){
$sheet->setCellValue('A' . $rows, $callback['id']);
$sheet->setCellValue('B' . $rows, $callback['full_name']);
$sheet->setCellValue('C' . $rows, $callback['phone']);
$sheet->setCellValue('D' . $rows, $callback['email']);
$sheet->setCellValue('E' . $rows, $callback['your_mind']);
$sheet->setCellValue('F' . $rows, $callback['your_go']);
$sheet->setCellValue('G' . $rows, $callback['your_whene']);


$rows++;
}
$fileName = "callback_list_".$current_date_time.".".$type;
if($type == 'xlsx') {
$writer = new Xlsx($spreadsheet);
} else if($type == 'xls') {
$writer = new Xls($spreadsheet);
}
$writer->save("uploads/excell/callback/".$fileName);
header("Content-Type: application/vnd.ms-excel");
return redirect(url('/')."/uploads/excell/callback/".$fileName);
}
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
