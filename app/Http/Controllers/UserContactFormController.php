<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactForm;

class UserContactFormController extends Controller
{
    public function storeUserMessage(Request $request){
        
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'message' => 'required',
        ]);
    
        ContactForm::create($request->all());
     
        return back()->with('success','Product created successfully.');

        //dd($request->all());
    }

}
