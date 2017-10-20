<?php

namespace Moriah\Http\Controllers;

use Illuminate\Http\Request;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Lot;

class AutocompleteController extends Controller
{
    public function index(){
        return view('autocomplete.index');
	
	}
    public function autoComplete(Request $request) {
        $query = $request->get('term','');
        
        $products=Lot::where('block','LIKE','%'.$query.'%')->get();
        
        $data=array();
        foreach ($products as $product) {
                $data[]=array('value'=>$product->block,'id'=>$product->id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }
}
