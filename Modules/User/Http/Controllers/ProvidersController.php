<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\Providers;

class ProvidersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['logout']]);

        $this->middleware('permission:provider-list|provider-create|provider-edit|provider-delete', ['only' => ['index']]);
        $this->middleware('permission:provider-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:provider-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:provider-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $providers = DB::table('providers')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('user::providers.index', compact('providers'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('user::providers.create');
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

        Providers::create($request->all());
        return redirect()->to('/user/providers')->with('message', 'Provider created successfully.');
    }

    public function show($id)
    {
        $provider = Providers::find($id);
        return view('user::providers.show', compact('provider'));
    }

    public function edit($id)
    {
        $provider = Providers::find($id);
        return view('user::providers.edit', compact('provider'));
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

        $provider = Providers::find($id);
        $provider->update($request->all());

        return redirect()->to('/user/providers')->with('message', 'Provider updated successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search == '') {
            $providers = DB::table('providers')->paginate(30);
        } else {
            $providers = DB::table('providers')->where('providers.name', 'LIKE', "%{$search}%")->paginate();
        }

        return view('user::providers.index', compact('providers', 'search'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function destroy($id)
    {
        Providers::find($id)->delete();
        return redirect()->to('/user/providers')->with('message', 'Provider deleted successfully');
    }
}
