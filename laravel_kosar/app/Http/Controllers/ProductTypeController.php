<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class ProductTypeController extends Controller
{
    public function index(){
        $types = response()->json(ProductType::all());
        return $types;
    }

    public function show($id){
        $type = response()->json(ProductType::find($id));
        return $type;
    }

    public function store(Request $request){
        $type = new ProductType();
        $type->name = $request->name;
        $type->description = $request->description;
        $type->cost = $request->cost;
        
        $type->save();
    }

    public function update(Request $request, $id){
        $type = ProductType::find($id);
        $type->name = $request->name;
        $type->description = $request->description;
        $type->cost = $request->cost;

        $type->save();
    }

    public function destroy($id){
        ProductType::find($id)->delete();
    }

    public function termekTipusB(){


        $user=Auth::user();

        $bvelkezd =DB::table('product_types as p')
        ->selectRaw('type_id')
        ->join('baskets as b ', 'p.type_id','b.item_id', 'b.user_id', )
        ->join('users as u ', 'u.id', 'b.user_id')
        
        ->where('p.type_id ','LIKE' ,'B%')
        ->where('users',$user)
        ->get();

        return $bvelkezd;
        
        



    }

   
}
