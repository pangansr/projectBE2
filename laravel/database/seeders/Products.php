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
                'name' => "Nike Sportswear Essential   Men's T-Shirt",
                'description' => 'Say hello to your go-to cotton tee. Slightly dropped shoulder seams and a loose fit make it comfortable to wear wherever your day takes you—from dusk till dawn.',
                'price' => 1243,
                'stock_quantity' => 13,
                'category_id' => 1,
                'image1' =>  'product-img/tshirt12.png',
                'image2' =>  'product-img/tshirt13.png',
                'image3' =>  'product-img/tshirt14.png',
   
           
            ],
            [
                'name' => "Nike Sportswear    Men's T-Shirt",
                'description' => 'Throwback hoops style meets soft-cotton comfort in this roomy tee. Dropped shoulders and a loose fit through the body give our Max90 tee a relaxed and casual look, while soft, midweight cotton fabric has you feeling like an all-star. 
                Colour Shown: Pale Ivory
Style: HF4443-110',
                'price' => 18540,
                'stock_quantity' => 14,
                'category_id' => 1,

                'image1' =>  'product-img/tshirt9.png',
                'image2' =>  'product-img/tshirt10.png',
                'image3' =>  'product-img/tshirt11.png',

            ],
            [
   
                'name' => "Men's Dri-FIT Running    Men's T-Shirt",
   
                'description' => 'Celebrate the diversity of runners all over the globe with this relaxed-fit tee. The smooth, sweat-wicking fabric helps you stay cool while your run heats up.
 
                Colour Shown: Bicoastal
                Style: FV8385-361
               ',
                'price' => 100,
                'stock_quantity' => 31,
                'category_id' => 1,

                'image1' =>  'product-img/tshirt6.png',
                'image2' =>  'product-img/tshirt7.png',
                'image3' =>  'product-img/tshirt8.png',
            ],
            [ 
                'name' => "Jordan Brand Jordan Brand
                  Men's T-Shirt",
                'description' => 'Give a shout-out to Jordan in 4 different ways with distinct logos pulled from our archives. Do you have a fave? The midweight cotton and a classic cut keep the fit feeling soft and familiar.
 
                Colour Shown: White/Gym Red
                Style: FN6027-123',
                'price' => 123,
                'stock_quantity' => 21,
                'category_id' => 1,
                'image1' =>  'product-img/tshirt3.png',
                'image2' =>  'product-img/tshirt4.png',
                'image3' =>  'product-img/tshirt5.png',

   
            ],
            [
   
                'name' => "Nike Dri-FIT UV Hyverse
                Men's Short-Sleeve Fitness Top    Men's T-Shirt",
                'description' => "Suit up in our sweat-wicking top and let the soft feel and relaxed fit help you get through workouts of all shapes and sizes. Your fitness plan has variety, so we made a top comfortable enough for whatever you're up for, whether that's a quick run, reps at the gym or finding your zen on the yoga mat.
 
                Colour Shown: Black/White
                Style: DV9840-010",
            
                'price' => 1232,
                'stock_quantity' => 34,
                'category_id' => 1,

                'image1' =>  'product-img/tshirt1.png',
                'image2' =>  'product-img/tshirt2.png',
                'image3' =>  'product-img/tshirt3.png',
            ],
            [
                'name' => "Nike Club Fleece
                Men's French Terry Pullover  Hoodie",
                'description' => " Bringing the varsity athletic look, this hoodie mixes print, puff print and embroidered graphics to create a design rooted in Nike heritage. Pull it on with your favourite shorts or chinos and give a nod to our '72 origins.
                 
                Colour Shown: Dark Grey Heather/Light Smoke Grey
                Style: FN3101-063
   
                ",
                'price' => 9676,
                'stock_quantity' => 16,
                'category_id' => 2,

                'image1' =>  'product-img/hoodi1.png',
                'image2' =>  'product-img/hoodi2.png', 
                'image3' =>  'product-img/hoodi3.png',
            ],
            [
                'name' => "Jordan Brooklyn Fleece
                Women's Graphic Crew-Neck Sweatshirt   Hoodie",
                'description' => "Get back to basics. Smooth on the outside with unbrushed loops on the inside, this midweight French terry sweatshirt is comfy enough to wear all year round, whatever the temp. Plus, the elegant graphics and heritage Jordan branding give this roomy layer a look that's second to none.
                 
                Colour Shown: Dark Grey Heather/Black
   
                ",
                'price' => 4543,
                'stock_quantity' => 9,
                'category_id' => 2,
                'image1' =>  'product-img/hoodi4.png',
                'image2' =>  'product-img/hoodi5.png', 
                'image3' =>  'product-img/hoodi6.png',

   
            ],
            [
                'name' => "Nike Sportswear Collection
                Women's High-Waisted 7.5cm (approx.) Trouser   Shorts",
                'description' => " 
                Timeless style meets laid-back vibes in these trouser shorts. Cotton Ripstop fabric adds structure and durability, while still being light enough to help keep you comfortable as the temp climbs. A zip on the back and elastic inserts in the waistband help give you that perfectly snug feeling.
                 
Colour Shown: Obsidian/Black
               
               
   
                ",
                'price' => 6543,
                'stock_quantity' => 48,
                'category_id' => 3,
                'image1' =>  'product-img/short1.png',
                'image2' =>  'product-img/short2.png', 
                'image3' =>  'product-img/short3.png',

   
            ],
            [
                'name' => "Jordan Essentials
                Men's Loopback Fleece  Shorts",
                'description' => " 
                You want an easy pair of shorts that look as good as they feel? Here you go. They're made from soft fleece that's smooth on the outside and looped on the inside—that means lightweight comfort wherever you wear 'em.


                 
                Colour Shown: Carbon Heather/Carbon Heather/White               
   
                ",
                'price' => 2453,
                'stock_quantity' => 70,
                'category_id' => 3,
                'image1' =>  'product-img/short4.png',
                'image2' =>  'product-img/short5.png', 
                'image3' =>  'product-img/short6.png',

   
            ],
            [
                'name' => "Nike Sportswear Everything Wovens
                Women's Oversized Hooded  Jacket",
                'description' => " 
                Designed with simplicity and functionality in mind, the adjustable waist means you can tighten the jacket for a more tailored fit or wear it loose for easy layering. Plus, we added a water-repellent coating to the crinkled fabric so you're always ready for rain. It's got everything you need to cover up in style.

              


                 
                Colour Shown: Light Armoury Blue/Sail            
   
                ",
                'price' => 7556,
                'stock_quantity' => 21,
                'category_id' => 4,
                'image1' =>  'product-img/jacket1.png',
                'image2' =>  'product-img/jacket2.png', 
                'image3' =>  'product-img/jacket3.png',

   
            ],
            [
                'name' => "Jordan Essentials Chicago
                Men's  Jacket",
                'description' => " 
                Stay ready for anything spring brings. This workwear-inspired jacket is made from breathable cotton. An all-over wash treatment gives it a perfectly worn-in look. Wear it open or closed—it layers like a dream.




                 
                Colour Shown: Blue Grey      
   
                ",
                'price' => 3252,
                'stock_quantity' => 12,
                'category_id' => 4,
                'image1' =>  'product-img/jacket4.png',
                'image2' =>  'product-img/jacket5.png', 
                'image3' =>  'product-img/jacket6.png',
               
   
            ],
            [
                'name' => "Nike ACG 'UV Hike'
                Women's Mid-Rise   Trousers",
                'description' => " 
                Your next adventure is calling. These versatile trousers are designed to help you take on the day, all while keeping you covered from the sun. Reinforced stitching adds durability, while the slim belt adds adjustability with a utilitarian vibe. Its lightweight woven fabric has just the right amount of stretch so you can move comfortably on your hike.

              


                 
                Colour Shown: Black/Summit White    
   
                ",
                'price' => 6534,
                'stock_quantity' => 23,
                'category_id' => 5,
                'image1' =>  'product-img/trousers1.png',
                'image2' =>  'product-img/trousers2.png', 
                'image3' =>  'product-img/trousers3.png',

   
            ],
            [
                'name' => "Nike Sportswear Essential
                Women's Woven High-Waisted    Trousers",
                'description' => " 
                With a versatile look and relaxed feel, these trousers are the perfect foundation piece for a day-to-night 'fit. The woven fabric is smooth and structured but still light enough to wear in warmer weather.

               

                 
                Colour Shown: Light Orewood Brown/Sail 
   
                ",
                'price' => 9999,
                'stock_quantity' => 43,
                'category_id' => 5,
                'image1' =>  'product-img/trousers4.png',
                'image2' =>  'product-img/trousers5.png', 
                'image3' =>  'product-img/trousers6.png',

   
            ],
        ]);
    }
}
