<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Http\Resources\FaqResource;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return FaqResource::collection($faqs);    
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
    public function store(StoreFaqRequest $request)
    {
        // Create a new FAQ entry with validated data
        $faq = Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        // Return a success response (e.g., JSON response)
        return response()->json([
            'message' => 'FAQ created successfully!',
            'faq' => $faq,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return new FaqResource($faq);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {

        $faq->update($request->all());
        return new FaqResource($faq);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        
        return response()->json([
            'message' => 'FAQ deleted successfully!',
        ], 200);
    }
}
