<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function Index() {
    	$usersData = $this->GetLoggedInUserData();
    	$customer_all = Categories::all();
    	return view("admin/categories/index",compact("customer_all","usersData"));
    }
    public function Add() {	
    	$usersData = $this->GetLoggedInUserData();
    	return view("admin/categories/add", compact('usersData'));
    }
    public function GetLoggedInUserData() {
    	return user::find(Auth::user()->id);
    }
    
    public function AddProcess( Request $request) {
    	$validated = $request->validate(
            [
                'c_name' => 'required',
                'c_image' => 'mimes:jpg,jpeg,png',
                'status' => 'required',
			],
			[
				'c_name.required' => 'Categoy Name is Required!',
                'c_image.mimes' => 'Required Image Extensions are .jpg, .jpeg, .png',
                'status.required' => 'Status is Required!',
			],
		);
		
		$c_image = $request->file("c_image");
		if( $c_image ) {
            $name_gen = hexdec( uniqid() );
	        $img_ext = strtolower($c_image->getClientOriginalExtension());
	        $img_name = $name_gen.".".$img_ext;
	        $up_location = public_path('/assets/img/categories/');
	        $last_image = $up_location.$img_name;
	        $statsu = $c_image->move($up_location,$img_name);
            $update_array = array(
	    		"name" => $request->c_name,
		    	"cat_image" => $img_name,
		    	"status" => $request->status
	    	);
        } else {
            $update_array = array(
	    		"name" => $request->c_name,
		    	"status" => $request->status
	    	);
        }
        $result_status = Categories::insert($update_array);
		return Redirect("/admin/categories")->with("success", "Category Added Successfully");
    }

    public function EditProcess( Request $request, $customer_id) {
    	$validated = $request->validate(
            [
                'c_name' => 'required',
                'c_image' => 'mimes:jpg,jpeg,png',
                'status' => 'required',
			],
			[
				'c_name.required' => 'Categoy Name is Required!',
                'c_image.mimes' => 'Required Image Extensions are .jpg, .jpeg, .png',
                'status.required' => 'Status is Required!',
			],
		);
		
		$c_image = $request->file("c_image");
		if( $c_image ) {
            $old_image = $request->old_profile_image;
            $name_gen = hexdec( uniqid() );
	        $img_ext = strtolower($c_image->getClientOriginalExtension());
	        $img_name = $name_gen.".".$img_ext;
	        $up_location = public_path('/assets/img/categories/');
	        $last_image = $up_location.$img_name;
	        $statsu = $c_image->move($up_location,$img_name);
            @unlink($up_location.$old_image);

            $update_array = array(
	    		"name" => $request->c_name,
		    	"cat_image" => $img_name,
		    	"status" => $request->status
	    	);
        } else {
            $update_array = array(
	    		"name" => $request->c_name,
		    	"status" => $request->status
	    	);
        }
        $result_status = Categories::find($customer_id)->update($update_array);
		return Redirect("/admin/categories")->with("success", "Category Updated Successfully");
    }

    public function DeleteProcess($customerId) {
    	if( isset($customerId) && $customerId != "" ) {
	        Categories::find($customerId)->delete();
	        return Redirect()->back()->with("success", "Business User Deleted Successfully");
    	}
    }

    public function View($customerId) {
    	$usersData = $this->GetLoggedInUserData();
    	if( isset($customerId) && $customerId != "" ) {
	        $customer_data = Categories::find($customerId);
	        return view("admin/categories/view",compact("customer_data","usersData"));
    	}
    }

    public function Edit($customerId) {
    	$usersData = $this->GetLoggedInUserData();
    	if( isset($customerId) && $customerId != "" ) {
	        $customer_data = Categories::find($customerId);
	        return view("admin/categories/edit",compact("customer_data","usersData"));
    	}
    }


}
