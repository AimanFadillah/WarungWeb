<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
// use Yajra\DataTables\DataTables;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use Dompdf\Dompdf;
use PDF;



class HomeController extends Controller
{
    
    public function index () {
        return view('index',[
            "barang" => Barang::latest()->Cari( request(["keyword"]) )->paginate(20)
        ]);
    }

    public function excel () {
        // ambil data
        $data = Barang::get()->toArray();

        // buat objeck
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // masukkan data ke dalam sheet
        $sheet->fromArray($data);

        // tulis data ke dalam sheet
        $writer = new Xlsx($spreadsheet);
        $writer->save('barang.xlsx');

        return response()->download(public_path('barang.xlsx'));
        // return DataTables::of($data)->make(true);
    }

    public function pdf () {
        // ambil data dari database
        // $data = Barang::get();

        // // buat objeck dompdf
        // $dompdf = new Dompdf();

        // // generate html
        // $html = view("pdf",["data" => $data])->render();

        // // load html ke dalam dompdf
        // $dompdf->loadHtml($html);

        // // set ukuran dan orientasi halaman
        // $dompdf->setPaper("A4","portrait");

        // // render PDF
        // $dompdf->render();

        // //  output pdf
        // $dompdf->steam("barang.pdf");

        // $data = Barang::get();

        $pdf = PDF::loadView("index",["barang" =>  Barang::latest()->Cari( request(["keyword"]) )->paginate(20)]);

        return $pdf->download("barang.pdf");

    }

    public function csv (){
        
        // ambil dari dari database
        $data = Barang::get()->toArray();

        // buat nama file
        $file_name = "barang.csv";

        // bukan file
        $file = fopen($file_name,"w");

        // tulis data ke dalam file
        foreach ($data as $line){
            fputcsv($file,$line);
        }

        // tutup file
        fclose($file);

        return response()->download($file_name);

    }


}
