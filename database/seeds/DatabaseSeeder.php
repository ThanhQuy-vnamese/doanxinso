<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('tabdangkiSeeder');
    }
}

/**
 * 
 */
class tabdatbanSeeder extends Seeder
{
	public function run()
	{
		DB::table('tabdatbans')->insert([
			['firstname'=>'Nguyen','lastname'=>'Dang','ngay'=>'2020-01-20','thoigian'=>'11:15','sdt'=>'0964150699','tinnhan'=>'Lam do an ngon'],
			['firstname'=>'Nguyen','lastname'=>'Khoa','ngay'=>'2020-01-21','thoigian'=>'11:12','sdt'=>'0584917120','tinnhan'=>'Lam do an ngon'],
		]);
	}
}

/**
 * 
 */
class tabdangkiSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('menudisplaymains')->insert([
            ['slide'=>'Home','tieude'=>'Home','noidung'=>'Home'],
        ]);
    }
}

class tabblogSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('tabmenus')->insert([
            ['tenmonan'=>'Traditional coffee','mota'=>'A small river named Duden flows by their place and supplies','gia'=>'20.49','theloai'=>'Coffee','hinhanh'=>'images/traditioncoffee.jpg'],
            ['tenmonan'=>'Espresso','mota'=>'A small river named Duden flows by their place and supplies','gia'=>'20.49','theloai'=>'Coffee','hinhanh'=>'images/esspresso.jpg'],
            ['tenmonan'=>'Latte Macchiato','mota'=>'A small river named Duden flows by their place and supplies','gia'=>'20.49','theloai'=>'Coffee','hinhanh'=>'images/lattemacchiato.jpg'],
            ['tenmonan'=>'Cappuccino','mota'=>'A small river named Duden flows by their place and supplies','gia'=>'20.49','theloai'=>'Coffee','hinhanh'=>'images/Cappuccino.jpg'],
            ['tenmonan'=>'Cafe Latte','mota'=>'A small river named Duden flows by their place and supplies','gia'=>'20.49','theloai'=>'Coffee','hinhanh'=>'images/cafelatte.jpg'],
            ['tenmonan'=>'Cafe Mocha','mota'=>'A small river named Duden flows by their place and supplies','gia'=>'20.49','theloai'=>'Coffee','hinhanh'=>'images/cafemocha.jpg'],
            ['tenmonan'=>'Americano','mota'=>'A small river named Duden flows by their place and supplies','gia'=>'20.49','theloai'=>'Coffee','hinhanh'=>'images/americano.jpg'],
            ['tenmonan'=>'Espresso Con Panna','mota'=>'A small river named Duden flows by their place and supplies','gia'=>'20.49','theloai'=>'Coffee','hinhanh'=>'images/EspressoConPanna.jpg'],
            ['tenmonan'=>'Cappuccino Viennese','mota'=>'A small river named Duden flows by their place and supplies','gia'=>'20.49','theloai'=>'Coffee','hinhanh'=>'images/CappuccinoViennese.jpg'],
        ]);
    }
}
