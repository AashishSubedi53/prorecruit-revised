<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class serviceController extends Controller
{
    public function index($category)
{
    // Fetch services based on the category
    $services = Service::where('service_category_id', $category)->get();

    

    $ServiceCategory = ServiceCategory::find($category);
    $ServiceCategoryName = $ServiceCategory['category_name'];        

    return view('customer.services.index', compact('services', 'category', 'ServiceCategoryName'));
}
}
