<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\User\Entities\Parameters;

class ParametersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['logout']]);

        $this->middleware('permission:parameter-list|parameter-create|parameter-edit|parameter-delete', ['only' => ['index']]);
        $this->middleware('permission:parameter-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:parameter-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:parameter-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $parameters = DB::table('parameters')
            ->orderBy('date', 'DESC')
            ->paginate(10);
        return view('user::parameters.index', compact('parameters'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('user::parameters.create');
    }

    public function store(Request $request)
    {
        //date validation, not less than 1980 and not greater than the current year
        $initialDate = '1980-01-01';
        $currentDate = (date('Y') + 1) . '-01-01'; //2023-01-01

        $request->validate([
            'title' => 'required|max:50|min:5',
            'date' => 'required|date_format:Y-m-d|after_or_equal:today|before:' . $currentDate,
            'subject' => 'required|max:150|min:5',
        ]);

        Parameters::create($request->all());

        return redirect()->route('parameters.index')->with('message', 'Parameter created successfully.');
    }

    public function show($id)
    {
        $parameter = DB::table('parameters')
            ->where('parameters.id', '=', $id)
            ->first();

        return view('user::parameters.show', compact('parameter'));
    }

    public function edit($id)
    {
        $parameter = DB::table('parameters')
            ->where('parameters.id', '=', $id)
            ->first();

        return view('user::parameters.edit', compact('parameter'));
    }

    public function update(Request $request, $id)
    {
        //date validation, not less than 1980 and not greater than the current year
        $initialDate = '1980-01-01';
        $currentDate = (date('Y') + 1) . '-01-01'; //2023-01-01

        $request->validate([
            'title' => 'required|max:50|min:5',
            'date' => 'required|date_format:Y-m-d|after_or_equal:today|before:' . $currentDate,
            'subject' => 'required|max:150|min:5',
        ]);

        $parameter = Parameters::find($id);
        $parameter->update($request->all());

        return redirect()->route('parameters.index')->with('message', 'Parameter updated successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search == '') {
            $parameters = DB::table('parameters')->paginate(10);
        } else {
            $parameters = DB::table('parameters')
                ->where('parameters.title', 'LIKE', "%{$search}%")
                ->orWhere('parameters.subject', 'LIKE', "%{$search}%")
                ->paginate();
        }

        return view('user::parameters.index', compact('parameters', 'search'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function destroy($id)
    {
        Parameters::find($id)->delete();
        return redirect()->route('parameters.index')->with('message', 'Parameter deleted successfully');
    }
}
