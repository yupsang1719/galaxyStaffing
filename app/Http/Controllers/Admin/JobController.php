<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //display a listing of jobs
    public function index()
    {
        $vacancies = Vacancy::all(); //fetch all jobs from the database
        return view('admin.vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //handles the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
        ]);

        //create a new vacancy with the validated data
        Vacancy::create($request->except('_token'));

        //redirect to the vacancy listing with a success message
        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy created Successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        //displays a single vacancy's details.
        return view('admin.vacancies.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        //displays the form for editing an existing vacancy
        return view('admin.vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
        ]);

        //update the vacancy with the validated data
        $vacancy->update($request->except('_token'));

        //redirect to the vacancy listing with a success message
        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy Updated Successfully');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete(); 
        //redirect to the vacancy listing with a success message
        return redirect()->route('admin.vacancies.index')->with('success','Vacancy Deleted Succesuffly');
    }
}
