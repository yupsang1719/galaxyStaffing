<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::all(); //fetch all applications from the database
        return view('admin.applications.index', compact('applications')); //pass applications to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vacancies = Vacancy::all(); // Fetch all vacancies to associate with the application
        return view('admin.applications.create', compact('vacancies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'job_id' => 'required|exists:vacancies,id',
            'applicant_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'resume' => 'required|string',  // or a different validation rule if it's a file path
            'status' => 'sometimes|string|in:pending,accepted,rejected',  // if you have multiple statuses
        ]);

        // Create a new application with the validated data
        Application::create($request->except('_token'));

        // Redirect to the applications listing with a success message
        return redirect()->route('admin.applications.index')->with('success', 'Application created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $vacancies = Vacancy::all(); // Fetch all vacancies to associate with the application
        return view('admin.applications.edit', compact('application', 'vacancies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //Validate the incoming request data
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'applicant_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'resume' => 'required|string',  // or a different validation rule if it's a file path
            'status' => 'required|string|in:pending,accepted,rejected',  // or any other status values you might have
        ]);

        // Update the application with the validated data
        $application->update($request->except('_token'));

        // Redirect to the applications listing with a success message
        return redirect()->route('admin.applications.index')->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete(); // Delete the application

        // Redirect to the applications listing with a success message
        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully.');
    }
}
