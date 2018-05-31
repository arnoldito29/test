<?php

namespace App\System\Employees;

class EmployeesService
{
    public $employees;
    
    public function __construct(Employees $employees)
    {
        $this->employees = $employees;
    }
    
    public function getItems($limit = 10)
    {
        $list = $this->employees
                ->with('Companies');
        
        if (!empty($limit)) {
            $list = $list->paginate($limit);
        } else {
            $list = $list->get();
        }    
        
        return $list;                
    }
    
    public function destroy($item)
    {
        $employees = Employees::find($item);
        
        return $employees->delete();
    }
    
    public function create($data = [])
    {
        $status = $this->employees->create($data);
        
        return $status;
    }
    
    public function update(Employees $employees, $data = [])
    {
        $status = $employees->update($data);
        
        return $status;
    }
}
