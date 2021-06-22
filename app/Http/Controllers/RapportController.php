<?php

namespace App\Http\Controllers;

use App\Models\glpi_computers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\config\app;
class PDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('front.Rapport')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = glpi_computers::table('tbl_customer')
         ->limit(10)
         ->get();
     return $customer_data;
    }

    function pdf()
    {
     $pdf = PDF->make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }
     // Generate PDF for Computer
     public function createPDF() {
        // retreive all records from db
        $data = glpi_computers::all();

        // share data to view
        view()->share('employee',$data);
        $pdf = PDF->loadView('pdf_view', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }
    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Address</th>
    <th style="border: 1px solid; padding:12px;" width="15%">City</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Country</th>
   </tr>
     ';
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->CustomerName.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->Address.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->City.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->PostalCode.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->Country.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
