<?php class ApplicationSeeder extends Seeder {

        private function __addProduct($name, $model, $size) {
            $product = array('name'=>$name, 'model'=>$model, 'size'=>$size);     
            $productId = DB::table('products')->insertGetId($product);
            Log::write('info', $name.' product added.');
            return $productId;
        }
        
	public function run()
	{
        }
        

}