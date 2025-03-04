<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    // Display all journals
    public function index()
    {
        $journals = Journal::all();
        return view('journals/index', [
            'journals' => $journals,
        ]);
    }

    // Show the form to create a new journal
    public function create()
    {
        return view('create');
    }

    // Store a new journal in the database
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'journal_name' => 'required|string|max:255',
            'journal_date' => 'required|date',
            'journal_time' => 'required|date_format:H:i',
            'journal_content' => 'nullable|string',
        ]);

        // Debugging: Check incoming request data
        // dd($validated); // Uncomment this to check the request before inserting

        // Store journal in the database
        try {
            Journal::create($validated);
            return redirect()->route('journals.index')->with('success', 'Journal created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

public function update(Request $request, Journal $journal)
{
  // Find the journal by ID
  $journal = Journal::find($request->id);

  // Check if journal exists
  if (!$journal) {
      return redirect()->back()->with('error', 'Journal not found.');
  }

  // Manually assign values and save
  $journal->journal_name = $request->journal_name;
  $journal->journal_date = $request->journal_date;
  $journal->journal_time = $request->journal_time;
  $journal->journal_content = $request->journal_content;
  
  $journal->save(); // Save the updated journal


    try {
        return redirect()->route('journals.index')->with('success', 'Journal updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}


public function edit($id){

    $journal = Journal::find($id);
    return view('edit', [
        'journal' => $journal,
    ]);
}




    // Delete an journal from the database
    public function destroy(Journal $journal)
    {
        try {
            $journal->delete();
            return redirect()->route('journals.index')->with('success', 'Journal deleted successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }





}
