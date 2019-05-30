<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailing;
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
$fileName = "mailing_list.".$type;
if($type == 'xlsx') {
$writer = new Xlsx($spreadsheet);
} else if($type == 'xls') {
$writer = new Xls($spreadsheet);
}
$writer->save("uploads/".$fileName);
header("Content-Type: application/vnd.ms-excel");
return redirect(url('/')."/uploads/".$fileName);
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
