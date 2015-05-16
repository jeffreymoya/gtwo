<?php

use Illuminate\Database\Seeder;
use App\Product;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ProductTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('products')->delete();

        Product::create(['name'=>'Product B', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'one.png','price'=>'99.15','discount'=>'5','commission'=>'15','available'=>'5']);
        Product::create(['name'=>'Product A', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'two.png','price'=>'79','discount'=>'10','commission'=>'10','available'=>'22']);
        Product::create(['name'=>'Product C', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'three.png','price'=>'250.10','discount'=>'4','commission'=>'20','available'=>'32']);
        Product::create(['name'=>'Product D', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'four.png','price'=>'119.75','discount'=>'16','commission'=>'17','available'=>'125']);
        Product::create(['name'=>'Product E', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'five.png','price'=>'9.75','discount'=>'10','commission'=>'9','available'=>'26']);
        Product::create(['name'=>'Product F', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'six.png','price'=>'69.10','discount'=>'10','commission'=>'9','available'=>'26']);
        Product::create(['name'=>'Product G', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'seven.png','price'=>'99.50','discount'=>'10','commission'=>'9','available'=>'26']);
        Product::create(['name'=>'Product H', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'eight.png','price'=>'09.75','discount'=>'10','commission'=>'9','available'=>'26']);
        Product::create(['name'=>'Product I', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'nine.png','price'=>'4.75','discount'=>'10','commission'=>'9','available'=>'26']);
        Product::create(['name'=>'Product J', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'ten.png','price'=>'17.80','discount'=>'10','commission'=>'9','available'=>'26']);
        Product::create(['name'=>'Product K', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'eleven.png','price'=>'2.13','discount'=>'10','commission'=>'9','available'=>'26']);
        Product::create(['name'=>'Product L', 'description'=>'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti','image'=>'twelve.png','price'=>'1.75','discount'=>'10','commission'=>'9','available'=>'26']);
    }

}