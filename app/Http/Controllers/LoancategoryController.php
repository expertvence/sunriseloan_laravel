<?php

namespace App\Http\Controllers;
use App\Library\Template;
use App\Loancategory;
use Illuminate\Http\Request;
use DB;
class LoancategoryController extends Controller
{
    public function index($id = "")
    {
        $data = Loancategory::find($id);
        dd($data);
        return Template::loadView('admin/categorys/categories_create',['data' => $data]);
    }
    // public function categori_store(Request $request)
    // {
    //     // Validate the incoming data
    //     $request->validate([
    //         'loan_category' => 'required|string|max:100',
    //         'percentage' => 'required|integer',
    //     ]);
    
    //     // Check if the request is for an existing category (update) or a new category (insert)
    //     if ($request->categories_id == '') {
    //         // Creating a new category
    //         $category = new Loancategory();
    //         $category->loan_category = $request->loan_category;
    //         $category->percentage = $request->percentage;
    //         $category->save();
    //     } else {
    //         // Updating an existing category
    //         $category = Loancategory::find($request->categories_id);  // Find the category by ID
    //         if ($category) {  // Check if the category exists
    //             $category->loan_category = $request->loan_category;
    //             $category->percentage = $request->percentage;
    //             $category->save();  // Save the updated category
    //         } else {
    //             // Optionally, handle the case where the category ID is not found
    //             return redirect()->route('show-categories-insert')->with('error', 'Category not found');
    //         }
    //     }
    
    //     // Redirect with success message
    //     return redirect()->route('show-categories-insert')->with('success', 'Category created/updated successfully');
    // }
    
    public function categoryStore(Request $request)
{
    DB::beginTransaction();

    try {

        $request->validate([
            'loan_category' => 'required|string|max:100',
            'percentage'    => 'required|integer',
        ]);

        $id = $request->categories_id;

        $data = [
            'loan_category' => $request->loan_category,
            'percentage'    => $request->percentage,
            'created_at'    => now(),
            'created_by'    => Auth::user()->name ?? null,
        ];

        if (empty($id)) {

            // Optional: Check if category already exists
            $existingCategory = Loancategory::where('loan_category', $request->loan_category)->first();
            if ($existingCategory) {
                return response()->json([
                    'msg'   => 'Category already exists',
                    'title' => 'Error'
                ]);
            }

            // Create new category
            Loancategory::create($data);

            DB::commit();

            return response()->json([
                'msg'   => 'Category Saved Successfully',
                'title' => 'Success'
            ]);

        } else {

            $category = Loancategory::find($id);

            if (!$category) {
                return response()->json([
                    'msg'   => 'Category not found',
                    'title' => 'Error'
                ]);
            }

            // Update category
            $data['updated_at'] = now();
            $data['updated_by'] = Auth::user()->name ?? null;

            $category->update($data);

            DB::commit();

            return response()->json([
                'msg'   => 'Category Updated Successfully',
                'title' => 'Success'
            ]);
        }

    } catch (\Exception $e) {

        DB::rollBack();

        return response()->json([
            'msg'   => 'Error: ' . $e->getMessage(),
            'title' => 'Error'
        ]);
    }
}

    public function show_categories()
    {
        $data=Loancategory::all();
        return Template::loadView('admin/categorys/categories_list', compact('data'));
    }
     
    // public function categoriId($id)
    // {
    //     $datas = Loancategory::find($id);
    //    // dd($datas);
    //     if ($datas) {
    //         return Template::loadView('admin/categorys/categories_create_form', compact('datas'));
    //     }
        
    //     // Handle the case where the category is not found (404 or error message)
    //     return redirect()->route('categories.index')->with('error', 'Category not found');
    // }
//Category fetch
    // public function categoriwithid()
    // {
    //     $datas=Loancategory::all();
        
    //     return response()->json($datas);
    // }
    
     
     
    public function delete($id)
    {
        $datas = Loancategory::find($id);
        if ($datas) {
            $datas->delete();
            return redirect()->route('show-categories-insert')->with('success', 'Category deleted successfully');
        }
        // Handle the case where the category is not found (404 or error message)
        return redirect()->route('categories.index')->with('error', 'Category not found');
    }
}
