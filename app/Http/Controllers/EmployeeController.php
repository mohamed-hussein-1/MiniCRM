<?php

namespace App\Http\Controllers;

use App\User;
use App\Customer;
use Illuminate\Http\Request;
use Atbox\Invi\InviServiceProvider;
use Atbox\Invi\Facades\Invi;
use Illuminate\Support\Facades\Auth;
use App\Mail\InvitationSent;
use Mail;

class EmployeeController extends Controller
{
    public function __construct(){
         $this->middleware('admin')->only(['inviteEmployee','showInvitationPage']);
         $this->middleware('auth')->only(['addCustomer','showCustomerAddition','addActionView','addAction','showCustomers','showCustomer']);
   	}
   	public function inviteEmployee(Request $request){
   		Invi::generate($request->input('name'), "2 day", true); // Generate Invitation
         $content = [
         'title'=> 'MiniCRM Employee Invitation', 
         'code'=> 'T1231142'
         ];

         $receiverAddress = $request->input('name');

         Mail::to($receiverAddress)->send(new InvitationSent($content));

   		\Session::flash('flash_message','Invitation Sent.'); //<--FLASH MESSAGE
   		return redirect()->back();
   	}
   	public function showInvitationPage(){
   		return view('invite-employee');
   	}
      public function addCustomer(Request $request){
         $cust = new Customer;
         $cust->name = $request->input('name');
         $cust->email = $request->input('email');
         $cust->phone = $request->input('phone');
         $cust->user_id = $request->input('employee');
         $cust->save();
      }
      public function showCustomerAddition(){
         $emps = User::where('is_admin',0)->select('name','id')->get();
         return view('add-customer')->with('employees',$emps);
      }
      public function addAction(Request $request){
         $u = Auth::user();
         $c = Customer::find($request->input('customer_id'));
         $desc = $request->input('description');
         $type = $request->input('action');
         $u->customersWithActions()->save($c,['type'=>$type,'description'=>$desc]);
         return redirect()->back();
      }

      public function showCustomers(){
         return view('customers')->with('customers',Customer::with('employee')->get());
      }
      
      public function showCustomer($id){
         $customer = Customer::with('employeesWithActions','employee')->find($id);
         $actions = $customer->employeesWithActions;
         // Customer::find($id)->with('employeesWithActions')->get()->first()->employeesWithActions->first()->pivot->description;
         return view('customer')->with('actions',$actions)->with('customer',$customer);
      }
}
