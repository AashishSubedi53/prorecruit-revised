<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Professional;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ReportController extends Controller
{

    public function generateReport(Request $request) {
        $reportType = $request->input('report');

        if ($reportType === 'bookings') {
            return $this->generateBookingsReport($request);
        } elseif ($reportType === 'customers') {
            return $this->generateCustomersReport($request);
        } elseif ($reportType === 'professionals') {
            return $this->generateProfessionalsReport($request);
        } else {
            return redirect()->back()->with('success', 'Invalid report type selected');
        }
    }

    public function generateProfessionalsReport(Request $request) {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if (empty($startDate) && empty($endDate)) {
            $professionals = Professional::all();
        } else {
            $professionals = Professional::whereBetween('created_at', [$startDate, $endDate])->get();
            $count = $professionals->count();

            if ($count === 0) {
                return redirect()->back()->with('success', 'PDF not generated as the data count is zero');
            }
        }

        // Generate HTML content for the report
        $html = view('admin.reports.html.professionals_report', compact('startDate', 'endDate', 'professionals'));

        // Setup dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Instantiate dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // return the generated report in PDF format
        return $dompdf->stream('professionals_report.pdf');
    }

    public function generateCustomersReport(Request $request) {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if (empty($startDate) && empty($endDate)) {
            $customers = Customer::all();
        } else {
            $customers = Customer::whereBetween('created_at', [$startDate, $endDate])->get();
        }

        // Generate HTML content for the report
        $html = view('admin.reports.html.customers_report', compact('startDate', 'endDate', 'customers'));

        // Setup dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Instantiate dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // return the generated report in PDF format
        return $dompdf->stream('customers_report.pdf');
    }

    public function generateBookingsReport(Request $request) {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $bookings = Order::whereBetween('created_at', [$startDate, $endDate])->get();

        if (empty($startDate) && empty($endDate)) {
            $bookings = Order::all();
        } else {
            $bookings = Order::whereBetween('created_at', [$startDate, $endDate])->get();
        }

        // Generate HTML content for the report
        $html = view('admin.reports.html.bookings_report', compact('startDate', 'endDate', 'bookings'));

        // Setup dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Instantiate dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // return the generated report in PDF format
        return $dompdf->stream('bookings_report.pdf');
    }
    
}
