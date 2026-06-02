<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    // Display all medicines
    public function index()
    {
        $search = request('search');

        $medicines = Medicine::when($search, function ($query) use ($search) {

            $query->where('medicine_name', 'like', "%{$search}%");

        })->get();

        return view('medicines.index', compact('medicines'));
    }

    // Open add medicine form
    public function create()
    {
        return view('medicines.create');
    }

    // Save new medicine
    public function store(Request $request)
    {
        $request->validate([
            'medicine_name' => 'required|max:100',
            'category' => 'required',
            'quantity' => 'required|integer|min:0',
            'expiration_date' => 'required|date'
        ]);

        Medicine::create([
            'user_id' => Auth::id(),
            'medicine_name' => $request->medicine_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date
        ]);

        return redirect('/medicines')
            ->with('message', 'Medicine added successfully.')
            ->with('type', 'success');
    }

    // Open edit form
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);

        return view('medicines.edit', compact('medicine'));
    }

    // Update medicine record
    public function update(Request $request, $id)
    {
        $request->validate([
            'medicine_name' => 'required|max:100',
            'category' => 'required',
            'quantity' => 'required|integer|min:0',
            'expiration_date' => 'required|date'
        ]);

        $medicine = Medicine::findOrFail($id);

        $medicine->update([
            'medicine_name' => $request->medicine_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date
        ]);

        return redirect('/medicines')
            ->with('message', 'Medicine updated successfully.')
            ->with('type', 'success');
    }

    // Delete medicine
    public function destroy($id)
    {
        Medicine::destroy($id);

        return redirect('/medicines')
       ->with('message', 'Medicine deleted successfully.')
       ->with('type', 'danger');
    }
}