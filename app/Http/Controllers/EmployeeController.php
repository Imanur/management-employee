<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Gender;
use App\Models\Marry;
use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::get();
        return view('admin.employee.index', compact('data'), ['breadcrumb' => 'Employee']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gender = Gender::all();
        $religion = Religion::all();
        $marry = Marry::all();
        $nationality = Nationality::all();

        return view('admin.employee.create', compact('gender', 'religion', 'marry', 'nationality'), ['breadcrumb' => 'Employee']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Employee::$rules);

        $employee = new Employee([
            'fullname' => $request->fullname,
            'gender_id' => $request->gender_id,
            'religion_id' => $request->religion_id,
            'marital_status_id' => $request->marital_status_id,
            'nationality_id' => $request->nationality_id,
            'pob' => $request->pob,
            'dob' => $request->dob,
            'position' => $request->position,
            'division' => $request->division,
            'address' => $request->address,
            'image' => "",
        ]);

        if ($request->hasFile('image')) {
            $fullFileName = Str::random(10) . '-' . date('Y-m-d') . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images/employees/', $fullFileName);
            $employee['image'] = "images/employees/" . $fullFileName;
        }

        $employee->save();

        if ($employee) {
            return redirect('admin/employee')->with('success', 'Success added new employee');
        } else {
            return redirect('admin/employee')->with('failed', 'Failed added new employee');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Employee::findOrFail($id);

        return view('admin.employee.detail', compact('data'), ['breadcrumb' => 'Employee']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gender = Gender::all();
        $religion = Religion::all();
        $marry = Marry::all();
        $nationality = Nationality::all();
        $data = Employee::findOrFail($id);

        // return $data;


        return view('admin.employee.edit', compact('data', 'gender', 'religion', 'marry', 'nationality'), ['breadcrumb' => 'Employee']);
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
        $employee = Employee::find($id);

        if ($employee == null) {
            return redirect('admin/employee')->with('failed', 'Society Not Found');
        }
        $request->validate(Employee::$rules);
        $req = $request->all();
        $req['image'] = '';

        if ($request->hasFile('image')) {
            $fullFileName = Str::random(10) . '-' . date('Y-m-d') . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images/employees/', $fullFileName);
            $req['image'] = "images/employees/" . $fullFileName;
        }

        $data = Employee::findOrFail($id)->update($req);

        if ($data) {
            return redirect('admin/employee')->with('success', 'Success to update society');
        } else {
            return redirect('admin/employee')->with('failed', 'Failed to update society');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if ($employee == null) {
            return redirect('admin/employee')->with('failed', 'Society Not Found');
        }

        if ($employee->image !== null || $employee->image !== "") {
            Storage::delete("$employee->image");
        }
        $employee->destroy($id);

        return redirect('admin/employee')->with('success', 'Success Deleted Employee');
    }
}
