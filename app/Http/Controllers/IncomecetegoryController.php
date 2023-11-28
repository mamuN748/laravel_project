<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IncomecetegoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $allData = IncomeCategory::where('Incate_status',1)->orderby('Incate_id', 'DESC')->get();
        return view('admin.income.category.all', compact('allData'));
    }
    public function add()
    {
        return view('admin.income.category.add');
    }
    public function edit($slug)
    {
        $data = IncomeCategory::where('Incate_status', 1)->where('Incate_slug', $slug)->firstOrFail();
        return view('admin.income.category.edit', compact('data'));
    }
    public function view($slug)
    {
        $data = IncomeCategory::where('Incate_status', 1)->where('Incate_slug', $slug)->firstOrFail();
        return view('admin.income.category.view', compact('data'));
    }
    public function update(Request $request)
    {
        $id = $request['id'];
        $request->validate([
            'name' => 'required | max:50 | unique:income_categories,Incate_name,' . $id . ',Incate_id',
        ], [
            'name.required' => 'Please enter income category name.',
        ]);

        $slug = Str::slug($request['name'], '-');
        $editor = Auth::user()->id;
        $update = IncomeCategory::where('Incate_status',1)->where('Incate_id', $id)->update([
            'Incate_name' => $request['name'],
            'Incate_remarks' => $request['remarks'],
            'editor' => $editor,
            'Incate_slug' => $slug,
            'updated_at' => Carbon::now()->todatetimestring(),
        ]);

        if ($update) {
            Session::flash('success!!!', 'Update succesfully Done!!.');
            return redirect('dashboard/Income/cetegory/view/' . $slug);
        } else {
            Session::flash('error', 'Opps! operation failed.');
            return redirect('dashboard/Income/cetegory/edit');
        }
    }

    public function softdelete($id){
        
        $soft=IncomeCategory::where('Incate_status',1)->where('Incate_id',$id)->update([
            'Incate_status'=> '0',
            'updated_at' => Carbon::now()->todatetimestring(),
        ]);
        if ($soft) {
            Session::flash('success!!!', 'Delete succesfully Done!!.');
            return redirect('dashboard/Income/cetegory');
        } else {
            Session::flash('error', 'Opps! operation failed.');
            return redirect('dashboard/Income/cetegory');
        }
    }
    public function restore()
    {
        return view('admin.income.category.restore');
    }
    public function delete()
    {
        return view('admin.income.category.delete');
    }
    public function insert(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50|unique:income_categories,Incate_name',

        ], [
            'name.required' => 'Please enter income category name.',
        ]);

        $slug = Str::slug($request['name'], '-');
        $creator = Auth::user()->id;
        $insert = IncomeCategory::insert([
            'Incate_name' => $request['name'],
            'Incate_remarks' => $request['remarks'],
            'Incate_creator' => $creator,
            'Incate_slug' => $slug,
            'created_at' => Carbon::now()->todatetimestring(),
        ]);

        if ($insert) {
            Session::flash('success', 'Mamun khan mia  income category information.');
            return redirect('dashboard/Income/cetegory/add');
        } else {
            Session::flash('error', 'Opps! operation failed.');
            return redirect('dashboard/Income/cetegory/add');
        }
    }
}
