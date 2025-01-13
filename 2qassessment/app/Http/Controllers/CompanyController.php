<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index(){
        // Fetch companies with pagination
        $companies = Company::paginate(10); // Adjust items per page as needed

        // Pass companies to the view
        return view('company.index', compact('companies'));
    }

    // Go to create page
    public function create(){
        return view('company.create');
    }

    // Store company data to database
    public function store(Request $request){
        // Validate data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100|max:2048',
            'website' => 'required|url|unique:companies,website',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Create new data to database
        Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo' => $logoPath,
            'website' => $request->input('website'),
        ]);

        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }

    public function edit($id){
        // Find the company by ID
        $company = Company::findOrFail($id);

        // Pass the company data to the edit view
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id){
        $company = Company::findOrFail($id);

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100|max:2048',
            'website' => 'nullable|url',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($company->logo && Storage::disk('public')->exists($company->logo)) {
                Storage::disk('public')->delete($company->logo);
            }

            // Store new logo
            $company->logo = $request->file('logo')->store('logos', 'public');
        }

        // Update other fields
        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => $company->logo, // Keep the existing logo if no new one is uploaded
        ]);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }

    public function destroy($id){
        $company = Company::findOrFail($id);

        // Delete logo if exists
        if ($company->logo && Storage::disk('public')->exists($company->logo)) {
            Storage::disk('public')->delete($company->logo);
        }

        // Delete the company
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
    }

}
