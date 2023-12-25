<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $url = url('/customer');
        $title = "Customer Registration";
        $data = compact('url','title');
        return view('customer')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());

              // Validation
              $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:customers',
                'gender' => 'required|in:male,female,other|10', 
                'address' => 'required',
                'state' => 'required',
                'country' => 'required',
                'dob' => 'required|date',
                'password' => 'required|min:6',
            ]);
    
            // Insert query
            
            $customer = new Customer;
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->gender = $request->input('gender');
            $customer->address = $request->input('address');
            $customer->state = $request->input('state');
            $customer->country = $request->input('country');
            $customer->dob = $request->input('dob');
            $customer->password = bcrypt($request->input('password'));
            $customer->save();
    
            return redirect('/customer');
        
        
    }

    public function view()
    {
        $customers = Customer::all();
        $data = compact('customers');
        return view('customer-view')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        if(is_null($customer)){
            //not found
            return redirect('customer');
        }else{
            $title = "Update Customer";
            $url = url('/customer/update') ."/". $id;
            //found
            $data = compact('customer', 'url', 'title');
            return view('customer')->with($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request('name');
        $customer->email = $request('email');
        $customer->gender = $request('gender');
        $customer->address = $request('address');
        $customer->state = $request('state');
        $customer->country = $request('country');
        $customer->dob = $request('dob');
        $customer->save();
        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $customer = Customer::find($id);
        if(!is_null($customer))
        {
            $customer->delete();
        }
        return redirect('customer');
       
    }
}
