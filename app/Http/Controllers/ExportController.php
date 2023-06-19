<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
  

class ExportController extends Controller
{
    public function importExportView()
    {
       return view('import');
    }
   
    public function exportUsers() 
    {
        return Excel::download(new UsersExport, 'Users.xlsx');
    }

    public function exportOrders() 
    {
        return Excel::download(new OrdersExport, 'Orders.xlsx');
    }
    
    public function exportProducts() 
    {
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }

   
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return redirect()->back();
    }
}
