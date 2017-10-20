<?php

namespace Moriah\Http\Controllers\Manager;

use Illuminate\Http\Request;
use Moriah\Http\Controllers\Controller;
use Moriah\Models\Installment;

class InstallmentsController extends Controller
{
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			
		$installment = Installment::find($id);
		
		$installment->payment_term = $request->input('payment_term');
		$installment->interest_rate = $request->input('interest_rate');
		$installment->monthly_amortization= $request->input('monthly_amortization');
		$installment->save();
		
        return redirect()->route('sales.index')->with('success', "The sales has successfully been updated.");
    }   
}
