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
        $customer = Customer::find(1);
        $url = url('/customer');
        $title = "Customer Registration";
        $data = compact('url','title');
        
        return view('customer', compact('customer', 'url', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers|max:255',
            'gender' => 'required|in:M,F,O',
            'address' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'dob' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $customer = Customer::create($request->all());

        // Create a new customer
        $customer = Customer::create($validatedData);

        
            return redirect('/customer')->with('success', 'Customer registered successfully');;
        
        
    }

    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            //where
            $customers = Customer::where('user_name','LIKE', "%$search%")->orWhere('email','LIKE', "%$search%")->get();
        }else{
            $customers = Customer::paginate(10);
        }
        
        $data = compact('customers','search');
        return view('customer-view')->with($data);
    }

    public function trash()
{
    $customers = Customer::onlyTrashed()->get();
    $data = compact('customers');
    return view('customer-trash')->with($data);
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

    public function forceDelete($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer))
        {
            $customer->forceDelete();
        }
        return redirect()->back();
       
    }
   
    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer))
        {
            $customer->restore();
        }
        return redirect('customer');
       
    }
}
