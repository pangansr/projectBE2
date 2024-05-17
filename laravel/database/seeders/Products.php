<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Áo sơ mi nam Urban Luxe 1',
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
   
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 1,
                'image1' => '1.jpg',
                'image2' => '2.jpg',
                'image3' => '3.jpg',
   
           
            ],
            [
                'name' => 'Áo sơ mi nam Urban Luxe 2',
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
   
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 1,
                'image1' => '4.jpg',
                'image2' => '5.jpg',
                'image3' => '6.jpg',

            ],
            [
   
                'name' => 'Áo sơ mi nam Urban Luxe 3',
   
   
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.
               ',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 1,

                'image1' => '7.jpg',
                'image2' => '8.jpg',
                'image3' => '9.jpg',
            ],
            [
   
                'name' => 'Áo sơ mi nam Urban Luxe 4',
   
            
   
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
   
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 1,
                'image1' => '18.jpg',
                'image2' => '19.jpg',
                'image3' => '20.jpg',

   
            ],
            [
   
                'name' => 'Áo sơ mi nam Urban Luxe 5',
   
            
   
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.
   
                ',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 1,
                'image1' => '18.jpg',
                'image2' => '19.jpg',
                'image3' => '20.jpg',

   
                
            ],
            [
                'name' => 'Áo sơ mi nam Urban Luxe 6',
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.
   
                ',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 2,
                'image1' => '18.jpg',
                'image2' => '19.jpg',
                'image3' => '20.jpg',

   
            ],
            [
                'name' => 'Áo sơ mi nam Urban Luxe 7',
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.
   
',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 2,

                'image1' => '18.jpg',
                'image2' => '19.jpg',
                'image3' => '20.jpg',
            ],
            [
                'name' => 'Áo sơ mi nam Urban Luxe 7',
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.
',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 3,

                'image1' => '18.jpg',
                'image2' => '19.jpg',
                'image3' => '20.jpg',
            ],
            [
                'name' => 'Áo sơ mi nam Urban Luxe 7',
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.
',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 3,
                'image1' => '18.jpg',
                'image2' => '19.jpg',
                'image3' => '20.jpg',
            ],
            [
                'name' => 'Áo sơ mi nam Urban Luxe 7',
                'description' => 'Đặc điểm:
                Kiểu dáng hiện đại: Áo sơ mi có kiểu dáng slim-fit với cổ button-down và tay dài, tạo nên vẻ lịch lãm và sang trọng.
                Chất liệu cao cấp: Sử dụng chất liệu vải cotton tự nhiên, mềm mại và thoáng mát, giúp cải thiện sự thoải mái khi mặc trong suốt cả ngày dài.
                Thiết kế tinh tế: Áo được thiết kế với các đường may chắc chắn và tỉ mỉ, cùng với các chi tiết như túi ngực nhỏ và các nút cài được làm tỉ mỉ, tạo nên sự tinh tế và phong cách.
                Đa dạng màu sắc: Áo sơ mi Urban Luxe có sẵn trong một loạt các màu sắc phong phú và tươi sáng như trắng, xanh navy, xám, hoặc hồng nhạt, phù hợp với mọi cơ hội và sở thích cá nhân của người mặc.
                Dễ phối hợp: Với thiết kế đơn giản và màu sắc đa dạng, áo sơ mi Urban Luxe dễ dàng phối hợp với các loại quần jean, quần tây, hoặc quần short, phù hợp cho cả các sự kiện công sở hoặc dạo phố cuối tuần.
',
                'price' => 100,
                'stock_quantity' => 50,
                'category_id' => 4,
                'image1' => '18.jpg',
                'image2' => '19.jpg',
                'image3' => '20.jpg',
   
            ],
        ]);
    }
}
