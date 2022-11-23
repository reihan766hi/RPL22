<?php

namespace App\Http\Controllers;

use App\Models\Order;
use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function invoice($id)
    {
        $data = [
            'order' => Order::findOrFail($id)
        ];

        $pdf = PDF::loadView('pdf.invoice', $data);

        return $pdf->download('invoice.pdf');
    }
}
