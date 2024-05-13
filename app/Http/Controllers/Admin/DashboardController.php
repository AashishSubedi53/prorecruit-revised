<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Professional;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public static function showMap(){
        // $todayDate = today();
        // $todayBookings = Order::whereDate('created_at', today())->count();
        // $label = ['2023-12-25', '2023-12-26', '2023-12-27', '2023-12-28', '2023-12-29', '2023-12-30', $todayDate];
        // $booking = ['10', '5', '1', '9', '0', '3', $todayBookings];

        $label = [];
        $booking = [];

        // Loop through the last 7 days
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $label[] = $date->toDateString(); // Get only the date part
            $booking[] = Order::whereDate('created_at', $date)->count();
        }
        $users = User::all();
        $orders = Order::all();
        return view('admin.dashboard',['labels' => $label, 'bookings' => $booking, 'users'=>$users, 'orders'=>$orders]);

    }

    public function getStats()
{
        $totalUsers = User::count();
        $totalCustomers = Customer::count();
        $totalProfessionals = Professional::count();
        $totalBookings = Order::count();
        $todayBookings = Order::whereDate('created_at', today())->count();
        $totalServices = Service::count();

        return response()->json([
            'totalUsers' => $totalUsers,
            'totalCustomers' => $totalCustomers,
            'totalProfessionals' => $totalProfessionals,
            'totalBookings' => $totalBookings,
            'todayBookings' => $todayBookings,
            'totalServices' => $totalServices,
        ]);
}

}
