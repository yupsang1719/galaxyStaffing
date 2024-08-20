<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMessage;
use App\Mail\ContactMessageMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'query' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact' => 'required|numeric',
            'address' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $validated = $validator->validated();

        // Send email
        // Mail::to('admin@galaxystaffing.co.uk')->send(new ContactMessageMail(
        //     $validated['name'],
        //     $validated['query'],
        //     $validated['email'],
        //     $validated['message'],
        //     $validated['address'],
        //     $validated['contact']
        // ));

        // Create a new contact message
        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'query' => $validated['query'],
            'email' => $validated['email'],
            'contact' => $validated['contact'],
            'address' => $validated['address'],
            'message' => $validated['message'],
        ]);

        
    
        return response()->json(['success' => 'Message sent successfully!'], 200);
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
}
