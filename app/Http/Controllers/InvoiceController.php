<?php

namespace App\Http\Controllers;
use App\Models\Invoice; 

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        // Retrieve a list of all invoices
        $invoices = Invoice::all();

        // Pass the invoices data to the view
        return view('invoice.index', compact('invoices'));
    }

    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'client_name' => 'required|string',
            'client_email' => 'required|email',
            'client_street_address' => 'required|string',
            'client_city' => 'required|string',
            'client_postal_code' => 'required|string',
            'client_country' => 'required|string',
            'street_address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'invoice_date' => 'required|date',
            'payment_terms' => 'required|string',
            'project_description' => 'required|string',
            'item_list' => 'required|json',
            'status' => 'required|string',
        ]);
        // Create a new invoice
        $invoice = new Invoice($request->all());
        $invoice->save();

         return redirect()->route('invoice.index')->with('success', 'Invoice created successfully.');
    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return response()->json($invoice);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            // ... (other validation rules)
        ]);

        // Find the invoice by ID
        $invoice = Invoice::findOrFail($id);

        // Update the invoice
        $invoice->update($request->all());

        return response()->json(['message' => 'Invoice updated successfully']);
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return response()->json(['message' => 'Invoice deleted successfully']);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'client_name' => 'required|string',
            'client_email' => 'required|email',
            'client_street_address' => 'required|string',
            'client_city' => 'required|string',
            'client_postal_code' => 'required|string',
            'client_country' => 'required|string',
            'street_address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'invoice_date' => 'required|date',
            'payment_terms' => 'required|string',
            'project_description' => 'required|string',
            'item_list' => 'required|json',
            'status' => 'required|string',
        ]);

        // Create a new invoice
        $invoice = new Invoice($request->all());
        $invoice->save();

        // Redirect to a success page or the invoice detail page
        return redirect()->route('invoice.index')->with('success', 'Invoice created successfully');
    }
}
