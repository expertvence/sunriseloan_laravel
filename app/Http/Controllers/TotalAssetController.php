<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Library\Template;
use App\LoanCommit;
use App\Loan;
use App\TotalAsset;

class TotalAssetController extends Controller
{
    public function index()
    {
        return Template::loadView('admin.assets.assets_form');
    }
    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'assets' => 'required|numeric',
                'date' => 'nullable|date',
            ]);
        
            // Prepare the data
            $data = [
                'assets' => $request->assets,
                'date' => $request->date
            ];
        
            // Check if assets_id is provided or not
            if ($request->assets_id == '') {
                // No assets_id, create a new asset entry
                $data['created_at'] = now(); // current timestamp
                TotalAsset::insert($data);
            } else {
                // Assets ID is provided, update the existing asset entry
                $assets = TotalAsset::find($request->assets_id);
                if ($assets) {
                    $data['updated_at'] = now(); // current timestamp for update
                    $assets->update($data);
                } else {
                    // Return an error message if the asset ID is not found
                    return response()->json([
                        'msg' => 'Asset ID not found',
                        'title' => 'Error'
                    ]);
                }
            }
        
            // Commit the transaction if all goes well
            DB::commit();
        
            // Return a success message
            $message = [
                'msg' => 'Assets successfully added/updated',
                'title' => 'Success'
            ];
        
        } catch (\Throwable $th) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
        
            // Return an error message
            $message = [
                'msg' => 'An error occurred while saving your asset.',
                'title' => 'Error'
            ];
        }
        
        // Return the response as JSON
        return response()->json($message);
        
    }

    public function show_list()
    {
        $data = TotalAsset::all();
        $totalCommite=Loan::sum('loan_amount');
        $total_assets = TotalAsset::sum('assets');
        $remainingAmount=$totalCommite-$total_assets;
        return Template::loadView('admin.assets.assets_list', compact('data', 'total_assets','totalCommite','remainingAmount'));
    }
    
    public function edit_assets($id)
    {
        $data=TotalAsset::find($id);
        return Template::loadView('admin/assets/assets_form',compact('data'));
    }
  /*   public function destroy_assets($id)
    {
        TotalAsset::find($id)->delete();
        return redirect()->back()->with('success','Assets Successfully Deleted');
    } */

  /*   public function totalAssets()
    {
        $total_assets = TotalAsset::sum('assets');
        return Template::loadView('admin/assets/assets_list', [
            'total_assets' => $total_assets
        ]);
    } */
    
     public function assetDelete($id)
    {
        try {
            $manager = TotalAsset::where('id', $id)->firstOrFail(); 
            $manager->delete(); // Delete the record

            return response()->json([
                'msg' => 'Assets Deleted Successfully',
                'title' => 'Success'
            ]);
        }  catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again.'
            ], 500);
        }
    }
}
