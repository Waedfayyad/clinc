<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClinicController extends Controller
{

    public function index()
    {
        
    $clinics = Clinic::all();
    return view('clinic.index', compact('clinics'));
    }

     public function create()
    {  
        $user = Auth::user();
        $id=$user->clinic_id;
        if ($id == ""){
             return view('clinic.create');
      
        }else{
                $clinic = Clinic::findOrFail($id);
                return view('clinic.show', compact('clinic'))->with('success', 'لديك بلفعل عيادة مسجلة باسمك وهذه هي بياناتها.');
            };
    }

    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'clinic_name' => 'required|string|max:255',
                'clinic_phone' => 'required|string|max:255',
                'clinic_specialty' => 'required|string|max:255',
                'image' => 'required|image|max:2048',
                'location' => 'required|string|max:255',
            ]);
        
            $imagePath = $request->file('image')->store('public/img');
            $imageUrl = Storage::url($imagePath);
        
            $clinic = new Clinic();
            $clinic->clinic_name = $validatedData['clinic_name'];
            $clinic->clinic_phone = $validatedData['clinic_phone'];
            $clinic->clinic_specialty = $validatedData['clinic_specialty'];
            $clinic->image = $imageUrl;
            $clinic->location = $validatedData['location'];
            $clinic->save();
            $user = Auth::user();
            $user->clinic_id=$clinic->id;
            $user->update();

            return view('clinic.show', compact('clinic'))->with('success', 'User created successfully.');
    }

     public function show($id)
    {
            $clinic = Clinic::findOrFail($id);
            return view('clinic.show', compact('clinic'));
    }

    public function edit($id)
    {
        // Retrieve the clinic with the specified ID from the database
        $clinic = Clinic::find($id);

        // If the clinic doesn't exist, redirect back to the index page with an error message
        if (!$clinic) {
            return redirect()->route('clinic.index')->with('error', 'Clinic not found.');
        }

        // Return the view for the edit form, passing in the clinic data
        return view('clinic.edit', ['clinic' => $clinic]);
    }
    public function update(Request $request, $id)
    {
            $clinic = Clinic::findOrFail($id);
/*             
            $file = $request->file('updatedimage');
            if (!$file) {
                return redirect()->back()->with('error', 'Please choose a file to upload.');
            }
            $path = $file->store('public/img');

            $symlink = public_path('storage/' . $file->hashName());
 
            if (!file_exists($symlink)) {
                symlink(storage_path('app/' . $path), $symlink);
            }           
 */ 
            $clinic->clinic_phone = $request->input('clinic_phone');
            $clinic->clinic_name = $request->input('clinic_name');
            $clinic->clinic_specialty = $request->input('clinic_specialty');
           // $clinic->image = $symlink;//$request->input('image');
            $clinic->location = $request->input('location');
            $clinic->save();

    
        return redirect()->route('clinic.show', $clinic->id)->with('success', 'User information has been updated successfully!');
        //
    }

    public function destroy($id)
        {
            $clinic = Clinic::findOrFail($id);
            $clinic->delete();

            return redirect()->route('clinic.index')->with('success', 'Clinic deleted successfully');
        }//
    
    }
