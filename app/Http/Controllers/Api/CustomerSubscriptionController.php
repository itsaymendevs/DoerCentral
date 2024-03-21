<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerAllergy;
use App\Models\CustomerExclude;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerSubscriptionController extends Controller
{


	use HelperTrait;






	public function storeCustomer(Request $request)
	{


		// :: root
		$request = json_decode(json_encode($request->all()));
		$request = $request->customer;




		// :: createCustomer
		$customer = new Customer();






		// ------------------------------
		// ------------------------------




		// 1: phase - storeGeneralInformation
		$customer = $this->storeGeneral($customer, $request);




		// 2: phase - storeAllergyAndExclude
		$customer = $this->storeAllergyAndExclude($customer, $request);












		return response()->json(['message' => 'Thanks for your subscription, enjoy your meals!'], 200);




	} // end function













	// --------------------------------------------------------------------------------------------
	// --------------------------------------------------------------------------------------------
	// --------------------------------------------------------------------------------------------
	// --------------------------------------------------------------------------------------------









	protected function storeGeneral($customer, $request)
	{



		// 1: general
		$customer->name = $request->name;
		$customer->email = $request->email;
		$customer->gender = $request->gender ?? 'Male';
		$customer->phone = $request->phone ?? null;
		$customer->whatsapp = $request->whatsapp ?? null;
		$customer->password = Hash::make($request->password ?? '123456');



		$customer->save();





		return $customer;



	} // end function













	// --------------------------------------------------------------------------------------------
	// --------------------------------------------------------------------------------------------












	protected function storeAllergyAndExclude($customer, $request)
	{



		// 1: allergy
		foreach ($request->allergyLists as $allergyList) {


			// :: create
			$customerAllergy = new CustomerAllergy();

			$customerAllergy->customerId = $customer->id;
			$customerAllergy->allergyId = $allergyList;

			$customerAllergy->save();

		} // end loop









		// 2: exclude
		foreach ($request->excludeLists as $excludeList) {


			// :: create
			$customerAllergy = new CustomerExclude();

			$customerAllergy->customerId = $customer->id;
			$customerAllergy->allergyId = $allergyList;

			$customerAllergy->save();

		} // end loop



		$customer->name = $request->name;
		$customer->email = $request->email;
		$customer->gender = $request->gender ?? 'Male';
		$customer->phone = $request->phone ?? null;
		$customer->whatsapp = $request->whatsapp ?? null;
		$customer->password = Hash::make($request->password ?? '123456');



		$customer->save();





		return $customer;



	} // end function













	// --------------------------------------------------------------------------------------------
	// --------------------------------------------------------------------------------------------








} // end controller
