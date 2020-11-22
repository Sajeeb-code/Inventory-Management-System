<?php

namespace App\Imports;

use App\Models\Product as ModelsProduct;
use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ModelsProduct([
            'product_name'=>$row[0],
            'cat_id'=>$row[1],
            'supp_id'=>$row[2],
            'product_code'=>$row[3],
            'product_image'=>$row[4],
            'product_wareHouse'=>$row[5],
            'product_route'=>$row[6],
            'buy_date'=>$row[7],
            'expire_date'=>$row[8],
            'buying_price'=>$row[9],
            'selling_price'=>$row[10],
        ]);
    }
}
