<?php

namespace App\System\Companies;

use Illuminate\Support\Facades\Storage;

class CompaniesService
{
    protected $companies;

    public function __construct(Companies $companies)
    {
        $this->companies = $companies;
    }
    
    public function getItems($limit = 10)
    {
        $list = $this->companies->select('*');
        
        if (!empty($limit)) {
            $list = $list->paginate($limit);
        } else {
            $list = $list->get()->pluck('name', 'id');
        }    
        
        return $list;                
    }
    
    public function destroy($item)
    {
        $companies = Companies::find($item);
        
        return $companies->delete();
    }
    
    /*
     * insert company with image
     * 
     * @params $data array
     * 
     * @return @status boolen
     */
    public function create($data = [])
    {
        if (!empty($data['logo'])) {
            
            $filename       = $data['logo']->getClientOriginalName();
            Storage::disk('public')->put('filename', $filename);
            $data['logo']   = $filename;  
        }
        
        $status = $this->companies->create($data);
        
        return $status;
    }
    
    /*
     * update company with image
     * 
     * @params $company Companies 
     * @params $data array
     * 
     * @return @status boolen
     */
    public function update(Companies $companies, $data = [])
    {
        if (!empty($data['logo'])) {
            
            $filename       = $data['logo']->getClientOriginalName();
            Storage::disk('public')->put($filename, file_get_contents($data['logo']->getRealPath()));
            $data['logo']   = $filename;  
        }
        
        $status = $companies->update($data);
        
        return $status;
    }
}
