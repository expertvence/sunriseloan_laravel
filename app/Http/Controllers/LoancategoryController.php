<?php

namespace App\Http\Controllers;
use App\Library\Template;
use App\Loancategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LoancategoryController extends Controller
{
    public function index()
    {
        return Template::loadView('admin/categorys/categories_create');
    }
    
    
public function categoryStore(Request $request)
{
    DB::beginTransaction();

    try {
        // ✅ Validation
        $request->validate([
            'loan_category' => 'required|string|max:100',
            'percentage'    => 'required|numeric|min:0|max:100',
        ]);

        $id = $request->id;

        // ✅ Prepare data array
        $data = [
            'loan_category' => $request->loan_category,
            'percentage'    => $request->percentage,
            'updated_at'    => now()
        ];

        if (empty($id)) {
            // ✅ Create new category
            $category_id = Loancategory::insertGetId(array_merge($data, ['created_at' => now()]));

            if ($category_id) {
                DB::commit();
                return response()->json([
                    'msg'   => 'Category Saved Successfully',
                    'title' => 'Success'
                ]);
            } else {
                DB::rollBack();
                return response()->json([
                    'msg'   => 'Failed to save category',
                    'title' => 'Error'
                ]);
            }

        } else {
            // ✅ Update existing category
            $category = Loancategory::find($id);

            if (!$category) {
                DB::rollBack();
                return response()->json([
                    'msg'   => 'Category not found',
                    'title' => 'Error'
                ]);
            }

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
     
    public function categoriId($id)
    {
        $data = Loancategory::find($id);
       // dd($datas);
        if ($data) {
            return Template::loadView('admin/categorys/categories_create_form', ['data'=>$data]);
        }
    }
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
