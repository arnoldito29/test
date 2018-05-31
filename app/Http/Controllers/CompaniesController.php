<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System\Companies\CompaniesService;
use App\System\Companies\Companies;
use App\Http\Requests\CompanyRequest;

class CompaniesController extends Controller
{
    protected $limit = 10;
    protected $keys  = [
        'name',
        'website',
        'email',
        'logo',
    ];

    public function index(CompaniesService $companies, Request $request)
    {
        $viewData = [
            'list' => $companies->getItems($this->limit),
            'page' => $request->only('page'),
        ];
        
        return view('elements.companies.index', $viewData);
    }
    
    public function destroy($item, CompaniesService $companies)
    {
        $status = $companies->destroy($item);
        
        return back();
    }
    
    public function create(CompaniesService $companiesService)
    {
        $viewData = [
        ];
        
        return view('elements.companies.create', $viewData);
    }
    
    public function edit($item, CompaniesService $companiesService)
    {
        $item_data = Companies::find($item);
        
        $viewData = [
            'item' => $item_data,
        ];
        
        return view('elements.companies.edit', $viewData);
    }
    
    public function store(CompanyRequest $request, CompaniesService $companies)
    {
        $data   = $request->only($this->keys);
        $status = $companies->create($data);

        $request->session()->flash('status', 'Item inserted!');
        
        return redirect()->route('companies.index');;
    }
    
    public function update( $item, CompanyRequest $request, CompaniesService $companies)
    {
        $item_data  = Companies::find($item);
        $data       = $request->only($this->keys);
        $status     = $companies->update($item_data, $data);
        
        $request->session()->flash('status', 'Item updated!');
        
        return redirect()->route('companies.index');;
    }
}
