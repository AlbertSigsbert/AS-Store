<?php

function productImage($path)
{
   return $path  && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('images/not-found.png');
}


 function getNumbers()
{
    $subTotal = Cart::subtotal();
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0; //Null coalescing operator since php 7
    $code = session()->get('coupon')['name'] ?? null ;
    $newSubtotal = ($subTotal - $discount);
    if($newSubtotal < 0)
    {
            $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax ;
    $newTotal = $newSubtotal + $newTax;



    return collect([
        'discount' => $discount,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
        'code'=> $code
    ]);
}

function getStockLevel($quantity)
{
    if($quantity > setting('site.stock_threshold'))
    {
        $stockLevel = '<div class="badge badge-success">In Stock</div>';
    }
    elseif($quantity <= setting('site.stock_threshold') && $quantity > 0)
    {
        $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
    }
     else
     {
        $stockLevel = '<div class="badge badge-danger">Not Available</div>';
     }

     return $stockLevel;
}
