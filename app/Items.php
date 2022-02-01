<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'picture',
        'category',
        'gender',
        'size',
        'quantity',
        'quantity_sold',
        'price',
        'location',
        'seller_id',
    ];

    public function searchFilter($request)
    {
        try {
            $limit              = $request->page * 10;
            $pagination         = $limit - 10;
            $search_name        = [['name', 'like', '%'.$request->search.'%']];
            $search_description = [['description', 'like', '%'.$request->search.'%']];

            if (isset($request->product_category)){
                array_push($search_name, ['category', $request->product_category]);
                array_push($search_description, ['category', $request->product_category]);
            }
            if (isset($request->gender)){
                array_push($search_name, ['gender', $request->gender]);
                array_push($search_description, ['gender', $request->gender]);
            }

            $products = Items::select('name', 'description', 'category', 'gender', 'size', 'price', 'quantity')
                            ->where($search_name)
                            ->orWhere($search_description)->get()->take($limit)->toArray();

            $paginated_products = array_slice($products, $pagination);

            if (empty($paginated_products))
                return false;
            else
                return $paginated_products;

        } catch (Throwable $th) {
            throw $th;
        }
    }
}
