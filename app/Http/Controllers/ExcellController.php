<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailing;
use App\Insurance;
use App\Callback;
use App\Reservationpack;
use App\Contactmessage;
use App\Loyalitymessage;
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
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getStyle('A1:C1')
->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
$sheet->getStyle("A1:C1")->getFont()->setBold( true ); 
$sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$sheet->getStyle('A:C')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A2:C2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
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
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('F')->setAutoSize(true);
$sheet->getColumnDimension('G')->setAutoSize(true);
$sheet->getColumnDimension('H')->setAutoSize(true);
$sheet->getColumnDimension('I')->setAutoSize(true);
$sheet->getColumnDimension('J')->setAutoSize(true);
$sheet->getColumnDimension('K')->setAutoSize(true);
$sheet->getStyle('A1:K1')
->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
$sheet->getStyle("A1:K1")->getFont()->setBold( true ); 
$sheet->getStyle('A1:K1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


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


$sheet->getStyle('A:K')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A2:K2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

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
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('F')->setAutoSize(true);
$sheet->getColumnDimension('G')->setAutoSize(true);
$sheet->getStyle("A1:G1")->getFont()->setBold( true ); 
$sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:G1')
->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
$rows = 2;
foreach($callbacks as $callback){
$sheet->setCellValue('A' . $rows, $callback['id']);
$sheet->setCellValue('B' . $rows, $callback['full_name']);
$sheet->setCellValue('C' . $rows, $callback['phone']);
$sheet->setCellValue('D' . $rows, $callback['email']);
$sheet->setCellValue('E' . $rows, $callback['your_mind']);
$sheet->setCellValue('F' . $rows, $callback['your_go']);
$sheet->setCellValue('G' . $rows, $callback['your_whene']);

$sheet->getStyle('A:G')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A2:G2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

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
    public function export_packres_excell($type)
    {
        date_default_timezone_set("Asia/Beirut");
        $current_date_time  =  date("Y-m-d")."-".date("h-i-sa");
        $reservations = Reservationpack::all();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Last Name');
$sheet->setCellValue('D1', 'Email');
$sheet->setCellValue('E1', 'Phone');
$sheet->setCellValue('F1', '# Traveller');
$sheet->setCellValue('G1', 'Departure Date');
$sheet->setCellValue('H1', 'Return Date');
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('F')->setAutoSize(true);
$sheet->getColumnDimension('G')->setAutoSize(true);
$sheet->getColumnDimension('H')->setAutoSize(true);

$sheet->getStyle("A1:H1")->getFont()->setBold( true ); 
$sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:H1')
->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
$rows = 2;
foreach($reservations as $reservation){
$sheet->setCellValue('A' . $rows, $reservation['id']);
$sheet->setCellValue('B' . $rows, $reservation['name']);
$sheet->setCellValue('C' . $rows, $reservation['last_name']);
$sheet->setCellValue('D' . $rows, $reservation['email']);
$sheet->setCellValue('E' . $rows, $reservation['phone']);
$sheet->setCellValue('F' . $rows, $reservation['traveller_number']);
$sheet->setCellValue('G' . $rows, $reservation['dep_date']);
$sheet->setCellValue('H' . $rows, $reservation['return_date']);

$sheet->getStyle('A:H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A2:H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


$rows++;
}
$fileName = "reservation_package_list_".$current_date_time.".".$type;
if($type == 'xlsx') {
$writer = new Xlsx($spreadsheet);
} else if($type == 'xls') {
$writer = new Xls($spreadsheet);
}
$writer->save("uploads/excell/package/".$fileName);
header("Content-Type: application/vnd.ms-excel");
return redirect(url('/')."/uploads/excell/package/".$fileName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function export_contact_excell($type)
    {
        
        date_default_timezone_set("Asia/Beirut");
        $current_date_time  =  date("Y-m-d")."-".date("h-i-sa");
        $contacts = Contactmessage::all();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Last Name');
$sheet->setCellValue('D1', 'Email');
$sheet->setCellValue('E1', 'Phone');
$sheet->setCellValue('F1', 'Message');
$sheet->getStyle("A1:F1")->getFont()->setBold( true ); 
$sheet->getStyle('A1:F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:F1')
->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('F')->setAutoSize(true);


$rows = 2;
foreach($contacts as $contact){
$sheet->setCellValue('A' . $rows, $contact['id']);
$sheet->setCellValue('B' . $rows, $contact['name']);
$sheet->setCellValue('C' . $rows, $contact['last_name']);
$sheet->setCellValue('D' . $rows, $contact['email']);
$sheet->setCellValue('E' . $rows, $contact['phone']);
$sheet->setCellValue('F' . $rows, $contact['message']);



$sheet->getStyle('A:F')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A2:F2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$rows++;
}
$fileName = "contact_us_package_list_".$current_date_time.".".$type;
if($type == 'xlsx') {
$writer = new Xlsx($spreadsheet);
} else if($type == 'xls') {
$writer = new Xls($spreadsheet);
}
$writer->save("uploads/excell/contactus/".$fileName);
header("Content-Type: application/vnd.ms-excel");
return redirect(url('/')."/uploads/excell/contactus/".$fileName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function export_contact_oyality_excell($type)
    {
          date_default_timezone_set("Asia/Beirut");
        $current_date_time  =  date("Y-m-d")."-".date("h-i-sa");
        $contacts = Loyalitymessage::all();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Id');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'Last Name');
$sheet->setCellValue('D1', 'Email');
$sheet->setCellValue('E1', 'Phone');
$sheet->setCellValue('F1', 'Message');
$sheet->getStyle("A1:F1")->getFont()->setBold( true ); 
$sheet->getStyle('A1:F1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:F1')
->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('F')->setAutoSize(true);


$rows = 2;
foreach($contacts as $contact){
$sheet->setCellValue('A' . $rows, $contact['id']);
$sheet->setCellValue('B' . $rows, $contact['name']);
$sheet->setCellValue('C' . $rows, $contact['last_name']);
$sheet->setCellValue('D' . $rows, $contact['email']);
$sheet->setCellValue('E' . $rows, $contact['phone']);
$sheet->setCellValue('F' . $rows, $contact['message']);



$sheet->getStyle('A:F')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A2:F2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$rows++;
}
$fileName = "Loyality_message_list_".$current_date_time.".".$type;
if($type == 'xlsx') {
$writer = new Xlsx($spreadsheet);
} else if($type == 'xls') {
$writer = new Xls($spreadsheet);
}
$writer->save("uploads/excell/loyality/".$fileName);
header("Content-Type: application/vnd.ms-excel");
return redirect(url('/')."/uploads/excell/loyality/".$fileName);
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
