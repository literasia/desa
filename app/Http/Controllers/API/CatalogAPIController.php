<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Potency;
use App\Models\Catalog;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CatalogAPIController extends Controller
{

    public function getCatalog()
    {
        $catalog = Potency::join('catalogs', 'potencies.id', 'catalogs.potency_id')->get();


        return response()->json(ApiResponse::success($catalog, 'Success add data'));

    }

    public function addCatalog($potency_id, Request $request)
    {
        $verif = Potency::where('user_id', $request->user_id)->get('status');

        $count = Catalog::where('potency_id', $potency_id)->get();
    
        if($verif[0]->status == 'inactive' || $verif[0]->status == 'rejected'){
            return response()->json(ApiResponse::error('Cannot add data, because your status is '. $verif[0]->status));
        }

        if($count->count() == 3){
            return response()->json(ApiResponse::error('Cannot add data, because your reached maximum upload'));
        }

        $rules = [
            'product_name'  => 'required',
            'product_image' => ['required', 'mimes:jpeg,jpg,png', 'max:3000'],
        ];

        $message = [
            'product_name.required' => 'This column name product cannot be empty',
            'product_image.required' => 'This column image cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        
        $data['product_image'] = "";
        if ($request->file('product_image')) {
            $data['product_image'] = $request->file('product_image')->store('catalog', 'public');
        }

        $catalog = Catalog::create([
            "potency_id" => $potency_id,
            "product_name" => $request->product_name,
            "product_description" => $request->product_description,
            "product_image" => $data['product_image'],
            "product_price" => $request->product_price
        ]);

        return response()->json(ApiResponse::success($catalog, 'Success add data'));
    }

    public function edit($catalog_id)
    {
        $catalog = Catalog::find($catalog_id);

        return response()->json(ApiResponse::success($catalog,'Success get data'));

    }

    public function update(Request $request)
    {
        $rules = [
            'product_name'  => 'required',
        ];

        $message = [
            'product_name.required' => 'This column name product cannot be empty',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        $product = Catalog::findOrFail($request->hidden_id);

        $data['product_image'] = null;
        if ($request->file('product_image')) {
            $data['product_image'] = $request->file('product_image')->store('catalog', 'public');
        }

        $catalog = Catalog::whereId($request->hidden_id)->update([
            "product_name" => $request->product_name,
            "product_description" => $request->product_description,
            "product_image" => $data['product_image'] ?? $product->product_image,
            "product_price" => $request->product_price
        ]);

        if ($request->file('product_image') && $product->product_image && Storage::disk('public')->exists($product->product_image)) {
            Storage::disk('public')->delete($product->product_image);
        }

        return response()->json(ApiResponse::success($catalog, 'Success update data'));
    }

    public function delete($catalog_id)
    {
        $delete = Catalog::find($catalog_id)->delete();

        return response()->json(ApiResponse::success($delete,'Success delete data'));

    }
}
