<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Reservation;
use App\Customer_List;

class CustomerController extends Controller
{
    public function getCustomer(Request $request) {
        $data = new Customer();
        $list = Customer::all();
        return view('customer.create',['list'=>$list, 'data'=>$data]);
    }
    
    
    public function getCustomerId($id) {
        
        $data = new Customer();
        if (isset($id)) {
            $data = Customer::where('id', '=', $id)->first();
        } 
        $list = Customer::all();
        return view('customer.create', ['list' => $list, 'data' => $data]);
    }
    
    
    
    public function postCustomer(Request $request) {
        
        if (isset($request->id)) {
            $customer = Customer::where('id', '=', $request->id)->first();
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->tel = $request->tel;
            $customer->memo = $request->memo;
            
            
            $customer->save();
        } else {
            $customer = new Customer(); 
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->tel = $request->tel;
            $customer->memo = $request->memo;
            
            
            
            $customer->save();
        }
        // 休日データ取得
        $data = new Customer();
        $list = Customer::all();
        return view('customer.create', ['list' => $list, 'data' => $data]);
    }
    
    public function index(Request $request) {
        $data = new Customer();
        $list = Customer::all()->sortBy('name');
        
        
        //$customer_list = new Customer_List();
        //$customer_list->customer_id = $data->id;
        //$customer_list->save();
        
        return view('customer.index', ['list'=>$list, 'data'=>$data]);
    }
    
   
    
    
    
    
    
    public function deleteCustomer(Request $request) {
        if (isset($request->id)) {
            $customer = Customer::where('id', '=', $request->id )->first();
            $customer->delete();
            
            $data = new Customer();
            $list = Customer::all();
            return view('customer.index',['list' => $list, 'data' => $data]);
        }
    }
}
