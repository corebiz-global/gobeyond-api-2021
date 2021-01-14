<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $dashboardVars = cache()->remember('dashboard-data', 3600, function () {
            $bannersAvailable = Banner::available()->count();
            $productsNotInCollections = Product::has('collections', '=', 0)->count();
            $contactsToday = Contact::where('created_at', '>=', today())->count();
            $productsInPromotion = Product::whereNotNull('promotional_price')->count();

            return compact('bannersAvailable', 'productsNotInCollections', 'contactsToday', 'productsInPromotion');
        });

        return view('dashboard', $dashboardVars);
    }
}
