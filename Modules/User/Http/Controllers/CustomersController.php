<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\Customers;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['logout']]);

        $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index']]);
        $this->middleware('permission:customer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:customer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $customers = DB::table('customers')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('user::customers.index', compact('customers'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('user::customers.create');
    }

    public function store(Request $request)
    {
        //date validation, not less than 1980 and not greater than the current year
        $initialDate = '1980-01-01';
        $currentDate = (date('Y') + 1) . '-12-01'; //2023-01-01

        $request->validate([
            'name' => 'required|max:50|min:5',
            'phone' => 'nullable|max:25|min:5',
            'address' => 'nullable|max:255|min:5',
            'email' => 'nullable|max:50|min:10',
            'doc_number' => 'nullable|max:20|min:6',
            'timbrado' => 'nullable|max:8|min:8',
            'start_date_timbrado' => 'nullable|date_format:Y-m-d|after_or_equal:' . $initialDate . '|before:' . $currentDate,
            'end_date_timbrado' => 'nullable|date_format:Y-m-d|after_or_equal:' . $initialDate . '|before:' . $currentDate,
        ]);

        Customers::create($request->all());
        return redirect()->to('/user/customers')->with('message', 'Customer created successfully.');
    }

    public function show($id)
    {
        $customer = Customers::find($id);
        return view('user::customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customers::find($id);
        return view('user::customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        //date validation, not less than 1980 and not greater than the current year
        $initialDate = '1980-01-01';
        $currentDate = (date('Y') + 1) . '-12-01'; //2023-01-01

        $request->validate([
            'name' => 'required|max:50|min:5',
            'phone' => 'nullable|max:25|min:5',
            'address' => 'nullable|max:255|min:5',
            'email' => 'nullable|max:50|min:10',
            'doc_number' => 'nullable|max:20|min:6',
            'timbrado' => 'nullable|max:8|min:8',
            'start_date_timbrado' => 'nullable|date_format:Y-m-d|after_or_equal:' . $initialDate . '|before:' . $currentDate,
            'end_date_timbrado' => 'nullable|date_format:Y-m-d|after_or_equal:' . $initialDate . '|before:' . $currentDate,
        ]);

        $customer = Customers::find($id);
        $customer->update($request->all());

        return redirect()->to('/user/customers')->with('message', 'Customer updated successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search == '') {
            $customers = DB::table('customers')->paginate(30);
        } else {
            $customers = DB::table('customers')->where('customers.name', 'LIKE', "%{$search}%")->paginate();
        }

        return view('user::customers.index', compact('customers', 'search'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function destroy($id)
    {
        Customers::find($id)->delete();
        return redirect()->to('/user/customers')->with('message', 'Customer deleted successfully');
    }
}
