<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System\Employees\EmployeesService;
use App\System\Employees\Employees;
use App\System\Companies\CompaniesService;
use App\Http\Requests\EmployeeRequest;

class EmployeesController extends Controller
{
    protected $limit = 10;
    protected $keys  = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'company_id',
    ];

    public function index(EmployeesService $employees, Request $request)
    {
        $viewData = [
            'list' => $employees->getItems($this->limit),
            'page' => $request->only('page'),
        ];
        
        return view('elements.employees.index', $viewData);
    }
    
    public function destroy($item, EmployeesService $employees)
    {
        $status = $employees->destroy($item);
        
        return back();
    }
    
    public function create(CompaniesService $companiesService)
    {
        $companies = $companiesService->getItems(0);
        
        $viewData = [
            'companies' => $companies,
        ];
        
        return view('elements.employees.create', $viewData);
    }
    
    public function edit($item, CompaniesService $companiesService)
    {
        $companies = $companiesService->getItems(0);
        $item_data = Employees::find($item);
        
        $viewData = [
            'companies' => $companies,
            'item'      => $item_data,
        ];
        
        return view('elements.employees.edit', $viewData);
    }
    
    public function store(EmployeeRequest $request, EmployeesService $employees)
    {
        $data   = $request->only($this->keys);
        $status = $employees->create($data);

        $request->session()->flash('status', 'Item inserted!');
        
        return redirect()->route('employees.index');;
    }
    
    public function update( $item, EmployeeRequest $request, EmployeesService $employees)
    {
        $item_data  = Employees::find($item);
        $data       = $request->only($this->keys);
        $status     = $employees->update($item_data, $data);
        
        $request->session()->flash('status', 'Item updated!');
        
        return redirect()->route('employees.index');;
    }
}
