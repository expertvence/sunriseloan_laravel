<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Library\Template;
use App\TotalAsset;
use Illuminate\Http\Request;
use DB;
class LoanController extends Controller
{
    public function loanRequest()
    {
        return Template::loadView('admin/loan/loan_request');
    }

    public function loan_store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'loan_amount' => 'required|numeric',
            'loan_category_id' => 'required|string', // Ensures loan category is an integer
            'loan_purpose' => 'required|string',
            'loan_term' => 'required|integer', // Assuming it's an integer
            'payment_schedule' => 'required|string',
            'monthly_income' => 'required|numeric',
            'other_documents' => 'nullable|file',
        ]);
    if ($request->hasFile('other_documents')) {
    // Get the uploaded file
    $uploadedFile = $request->file('other_documents');
    
    // Generate a unique file name
    $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
    
    // Define the destination path (public/images/other_documents)
    $destinationPath = public_path('images/other_documents');
    
    // Move the uploaded file to the destination folder
    $uploadedFile->move($destinationPath, $fileName);
    
    // Store the file name in your data array or model
    // Assign the file path directly
}

try {
    // Create the loan record
    $loan = new Loan();
    $loan->user_id = auth()->id();  // Assuming the user is logged in
    $loan->loan_amount = $request->loan_amount;
    $loan->loan_category_id = $request->loan_category_id;
    $loan->loan_purpose = $request->loan_purpose;
    $loan->loan_term = $request->loan_term;
    $loan->payment_schedule = $request->payment_schedule;
    $loan->monthly_income = $request->monthly_income;
    $loan->other_documents = 'images/other_documents/' . $fileName;
    // Save the loan record
    $loan->save();
    
    
            return response()->json(['msg' => 'Loan saved successfully!']);
        } catch (\Exception $e) {
            // Log the exception
            \Log::error('Error saving loan application: ' . $e->getMessage());
            
            // Rollback if any error occurs
            DB::rollback();
    
            // Return a detailed error message
            return response()->json(['msg' => 'An error occurred while saving your loan application.', 'error' => $e->getMessage()]);
        }
    }
    


    public function showLoan_list()
    {
        $data=Loan::with('user')->orderBy('created_at','desc')->get();
        return Template::loadView('admin/loan/loan_list', compact('data'));
    }

/* Edit */

public function loanEdit()
{
    $data=Loan::all();
    return Template::loadView('admin/loan/loan_request_form', compact('data'));
}
    /* status change */

    public function updateStatus(Request $request)
    {
         $status = $request->status;
        $newStatus = $request->status;

        $request->validate([
            'loan_ide'=>'required|exists:loans,loan_ide',
            'status'=>'required|in:pending,complete,rejected',
        ]);
        $loan=Loan::find($request->loan_ide);
       if($newStatus == 'complete')
       {
        $totalLoan = Loan::sum('loan_amount');
        
        $totalAsset = TotalAsset::sum('assets');

        // if($totalLoan > $totalAsset)
        // {
        //     return response()->json(['error'=>false,'message'=>'Total loan exceeds total assets! Remove : '.abs($totalLoan-$totalAsset)]);
        // }
       }
        $loan->status = $status;
        $loan->save();
        return response()->json(['success'=>true]);
    }
}
