<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form_fields = Form::all();
        return view('admin.form.index', compact('form_fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $values = $request->input();
//        print_r($values);

        if (isset($values['filed']) && !empty($values['filed'])){
            Form::truncate();
            foreach ($values['filed'] AS $fld) {
                $data = ['label'=>$fld['label'], 'type'=>$fld['type'], 'options'=>$fld['options'], 'required'=>$fld['required'], 'custom_attr'=>$fld['custom_attr']];
                Form::create($data);
            }
            /*Form::insert($values['filed']);*/
            return redirect()->back()->with('success', 'Data added successfully!');
        } else {
            return redirect()->back()->with('error', 'There were some problems with your input!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Get Contact List
     */
    public function contact() {
        $contacts = Contact::orderBy('id', 'desc')->paginate(20);

        return view('admin.form.list', compact('contacts'));
    }

}
