<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=> 'Playstation 5',
             'slug'=>'playstation-5',
             'details' => '16GB GDDR6 ,Custom RDNA 2 ,AMD Zen 2-based CPU with 8 cores at 3.5GHz',
             'price' => 499.99,
             'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                               sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                               Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                               nisi ut aliquip ex ea commodo consequat ',
              'featured' => 1,
              'image'=> 'products\dummy\playstation-5.jpg'
        ])->categories()->attach(8);

        Product::create([
            'name'=> 'Canon EOS 250D',
            'slug'=>'canon-eos-250D',
            'details' => '24.1MP ,DIGIC 8 Processor, 4K Movies',
            'price' => 625,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\canon-eos-250D.jpg'
        ])->categories()->attach(6);

        Product::create([
            'name'=> 'Macbook Pro',
            'slug'=>'macbook-pro',
            'details' => '16inch ,1TB SSD, 16GBRAM',
            'price' => 2400,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\macbook-pro.jpg'
        ])->categories()->attach(1);

        Product::create([
            'name'=> 'Xbox Series X',
            'slug'=>'xbox-series-x',
            'details' => 'CPU 8X Cores @ 3.8 GHz , Memory. 16GB GDDR6 w/320 bit-wide bus',
            'price' => 499,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\xbox-series-x.jpg'
        ])->categories()->attach(8);

        Product::create([
            'name'=> 'iphone 12',
            'slug'=>'iphone-12',
            'details' => 'Display:6.1-inch Super Retina OLED (BOE), RAM 4GB',
            'price' => 799,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\iphone-12.jpg'
        ])->categories()->attach(3);

        Product::create([
            'name'=> '27-inch iMac',
            'slug'=>'27-inch-iMac',
            'details' => '27-inch (diagonal) Retina 5K display,256GB SSD, Up to 10-core Intel Core i9 processor',
            'price' => 1799,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\27-inch-iMac.jpg'
        ])->categories()->attach(2);

        Product::create([
            'name'=> 'MacBook Air',
            'slug'=>'macBook-air',
            'details' => '13.3-inch , 1TB SSD, 16GBRAM',
            'price' => 2100,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\macBook-air.jpg'
        ])->categories()->attach(1);

        Product::create([
            'name'=> 'Fire HD 10 Tablet',
            'slug'=>'fire-hd-10-tablet',
            'details' => '10.1" 1080p full HD, 64GB Storage , 2GBRAM',
            'price' => 79.99,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\fire-hd-10-tablet.jpg'
        ])->categories()->attach(4);

        Product::create([
            'name'=> 'Apple iPad Pro 11',
            'slug'=>'apple-iPad-pro-11',
            'details' => 'Display 11 , 128GB Storaga, LiDAR Scanner.',
            'price' => 799,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\apple-iPad-pro-11.jpg'
        ])->categories()->attach(4);

        $product = Product::find(9);
        $product->categories()->attach(7);


        Product::create([
            'name'=> 'Playstation 4 Pro',
            'slug'=>'playstation-4-pro',
            'details' => 'CPU : x86-64 AMD “Jaguar”, 8 cores,GPU : 1.84 TFLOPS, AMD Radeon™ based graphics engine, 1TB',
            'price' => 295,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\playstation-4-pro.jpg'
        ])->categories()->attach(8);


        Product::create([
            'name'=> 'Life Like Solo S460',
            'slug'=>'life-like-solo-s460',
            'details' => 'Multi-Function Stereo Sound Collapsible Wireless Bluetooth Headphones with metal shining case',
            'price' => 14,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\life-like-solo-s460.jpg'
        ])->categories()->attach(7);



        Product::create([
            'name'=> 'CANON EOS 850D',
            'slug'=>'canon-eos-850D',
            'details' => '24.1 Megapixels, DIGIC 8, 4K Movies, 5-axis, 45AF',
            'price' => 1205,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                              nisi ut aliquip ex ea commodo consequat',
            'featured' => 1,
            'image'=> 'products\dummy\canon-eos-850D.jpg'
        ])->categories()->attach(6);


    //Laptops
    Product::create([
        'name'=> 'HP PROBOOK 450 G3',
        'slug'=>'hp-probook-450-g3',
        'details' => '15.6-inch , 1TB HDD, 8GBRAM',
        'price' => 345,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                          nisi ut aliquip ex ea commodo consequat',
        'featured' => 0,
        'image'=> 'products\dummy\hp-probook-450-g3.jpg'
    ])->categories()->attach(1);


    Product::create([
        'name'=> 'HP ENVY x360 Convertible',
        'slug'=>'hp-envy-x360-convertible',
        'details' => '16 GB memory; 1 TB SSD storage',
        'price' => 1399.99,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                          nisi ut aliquip ex ea commodo consequat',
        'featured' => 0,
        'image'=> 'products\dummy\hp-envy-x360-convertible.jpg'
    ])->categories()->attach(1);


    Product::create([
        'name'=> 'HP ENVY Laptop-17t-cg000',
        'slug'=>'hp-envy-laptop-17t-cg000',
        'details' => '8 GB memory; 512 GB SSD storage; Intel i5',
        'price' => 999.99,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                          nisi ut aliquip ex ea commodo consequat',
        'featured' => 0,
        'image'=> 'products\dummy\hp-envy-laptop-17t-cg000.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'Dell Inspiron 15 3000 Laptop',
        'slug'=>'dell-inspiron-15-3000-laptop',
        'details' => '4 GB,128GB SSD, DDR4, 2666 MHz',
        'price' => 349.99,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                          nisi ut aliquip ex ea commodo consequat',
        'featured' => 0,
        'image'=> 'products\dummy\dell-inspiron-15-3000-laptop.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'Dell New XPS 15 Touch Laptop',
        'slug'=>'new-xps-15-touch-laptop',
        'details' =>'32GB DDR4-2933MHz,1TB SSD,15.6 in-touch display',
        'price' => 2299.99,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                          nisi ut aliquip ex ea commodo consequat',
        'featured' => 0,
        'image'=> 'products\dummy\new-xps-15-touch-laptop.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'Inspiron 17 3000 Laptop',
        'slug'=>'inspiron-17-3000-laptop',
        'details' => '17.3inch, 512GBSSD, 8GB Memory, Intel core i7',
        'price' => 779.99,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                          nisi ut aliquip ex ea commodo consequat',
        'featured' => 0,
        'image'=> 'products\dummy\inspiron-17-3000-laptop.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'Dell XPS 13',
        'slug'=>'dell-xps-13',
        'details' => '11th Generation Intel® Core™ i3,8GB 4267MHz LPDDR4x Memory Onboard,256GB M.2 PCIe NVMe SSD',
        'price' => 999.99,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                          nisi ut aliquip ex ea commodo consequat',
        'featured' => 0,
        'image'=> 'products\dummy\dell-xps-13.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'ASUS ROG ZEPHYRUS G14',
        'slug'=>'asus-rog-zephyrus-g14',
        'details' => 'AMD Ryzen 9 4900HS , Nvidia RTX 2060 Max-Q GPU ',
        'price' => 1450,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                          nisi ut aliquip ex ea commodo consequat',
        'featured' => 0,
        'image'=> 'products\dummy\asus-rog-zephyrus-g14.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'HP ELITE DRAGONFLY',
        'slug'=>'hp-elite-dragonfly',
        'details' => 'Intel Core i7-8665U, 16GB RAM ,512GB SSD,13.3-inch touchscreen display, 1920 x 1080, 1000 nits (spec), 773 nits (tested), Sure View Reflect',
        'price' => 2129,
        'description' => 'The new Dragonfly is also the first laptop to include a built-in Tile tracker.
                          That means if you lose the device, you can use the Tile smartphone app to set
                           off an alarm (if it’s in Bluetooth range) or locate it anywhere in the world
                           using Tile’s crowd-finding network.
                           The tracker can work for a limited time even when the laptop is off.',
        'featured' => 1,
        'image'=> 'products\dummy\hp-elite-dragonfly.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'RAZER BLADE PRO 17',
        'slug'=>'razer-blade-pro-17',
        'details' => 'Intel Core i7-10875H , 16GB RAM ,512GB SSD , Nvidia GeForce RTX 2080 Super Max-Q ,17.3inch',
        'price' => 3199,
        'description' => 'At just over six pounds, it’s not too difficult to move around (as 17-inch workstations go).
                          You get an RTX GPU (up to Nvidia’s 2080 Super Max-Q) an eight-core CPU
                           (Intel’s Core i7-10875H) and either a 300Hz screen or a 120Hz touchscreen.
                            There’s even an RGB keyboard with color effects tailored to the game you’re playing.',
        'featured' => 1,
        'image'=> 'products\dummy\razer-blade-pro-17.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'HP SPECTRE X360 13',
        'slug'=>'hp-spectre-x360-13',
        'details' => '13.3-inch 1080p or 4K touchscreen,i7 processor,16GB RAM,512GBSSD',
        'price' => 1250,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                           nisi ut aliquip ex ea commodo consequat',
        'featured' => 1,
        'image'=> 'products\dummy\hp-spectre-x360-13.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'MACBOOK PRO 13',
        'slug'=>'macbook-pro-13',
        'details' => '13.3‑inch ,10th‑generation Intel Core i7,16GB RAM,1TBSSD',
        'price' => 1999,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                           nisi ut aliquip ex ea commodo consequat',
        'featured' => 1,
        'image'=> 'products\dummy\macbook-pro-13.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'ACER CHROMEBOOK SPIN 713',
        'slug'=>'acer-chromebook-spin-713',
        'details' => '13.5‑inch ,128GBSSD ,8GB RAM',
        'price' => 1999,
        'description' => 'But where the 713 really shines is its display. The 3:2 gives you extra
                          space for comfortable multitasking, and the sharp panel delivers a really
                           excellent picture — Personally i actually preferred it to my MacBook Pro’s screen.
                            Between its standout performance, peripherals, and portability, this is
                             really the Chromebook to beat.',
        'featured' => 1,
        'image'=> 'products\dummy\acer-chromebook-spin-713.jpg'
    ])->categories()->attach(1);

    Product::create([
        'name'=> 'DELL XPS 15',
        'slug'=>'dell-xps-15',
        'details' => 'Intel Core i7-10875H ,512GB SSD ,16GB RAM, 15.6inch, 4GB GDDR6',
        'price' => 1300,
        'description' => 'The XPS 15 isn’t a serious gaming rig, but the GTX 1650 Ti
                            can help out with creative tasks. Our model was able to export a five-minute,
                            33-second video in Adobe Premiere Pro in just four and a half minutes — which
                            is faster than we got with the 16-inch MacBook Pro.',
        'featured' => 1,
        'image'=> 'products\dummy\dell-xps-15.jpg'
    ])->categories()->attach(1);

   //Desktops
   Product::create([
    'name'=> 'Dell G5 Gaming Desktop',
    'slug'=>'dell-g5-gaming desktop',
    'details' => '9th Gen Intel Corei9 9900K | Graphics: NVIDIA GeForce RTX 2070 |
                  RAM: 64GB | Storage: 1TB SSD + 2TB HDD',
    'price' => 1559,
    'description' => 'A unique chassis coupled with a price to beat, Dell’s latest in its G
                      series gaming PCs is a solid contender in budget gaming. The Dell G5 boasts
                       9th-generation Intel chips as well as Nvidia’s most powerful
                       gaming GTX and RTX graphics cards, starting with an i3 processor and
                       the GTX 1650 to handle many powerful games without burning a whole in your pocket.',
    'featured' => 0,
    'image'=> 'products\dummy\dell-g5-gaming desktop.jpg'
])->categories()->attach(2);

    // Select random entries to be featured
    //Product::whereIn('id', [1, 12, 22, 31, 41, 43, 47, 51, 53,61, 69, 73, 80])->update(['featured' => true]);


    //TV
    Product::create([
        'name'=> 'LG CX OLED',
        'slug'=>'lg-cx-oled',
        'details' => 'Available Screen Sizes: 48, 55, 65, 77 inches | Screen Type: OLED | Refresh Rate: 120 Hz |
                       HDMI ports: 4 HDMI 2.1, 2 USB | Size: 57.0 x 32.7 x 1.8 inches | Weight: 52.9 pounds',
        'price' => 1897,
        'description' => 'The LG CX OLED is the best 4K smart TV overall, and the standout TV of 2020,
                          with an amazing display, built-in Google Assistant and Amazon Alexa support,
                          and a ton of other smart features. From LGs webOS 5.0 to the addition of
                          smart home control and an intuitive motion-control remote, its one of the smartest TVs weve ever seen.
                          LG has improved on its superb OLED with a more powerful processor,
                          the addition of Dolby Vision IQ (which adjusts HDR performance based on the ambient lighting)
                           and beefs up the sound with AI-powered audio tuning. And while the LG CX OLEDs premium price might
                           put off some shoppers, it packs in more premium value than more expensive OLED competitors,
                            while still delivering an unparalleled picture. Its the TV to beat.',
        'featured' => 0,
        'image'=> 'products\dummy\lg-cx-oled.jpg'
    ])->categories()->attach(5);
 }
}
