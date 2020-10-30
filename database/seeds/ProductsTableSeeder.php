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
              'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
            'featured' => 1
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
        'featured' => 0
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
        'featured' => 0
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
        'featured' => 0
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
        'featured' => 0
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
        'featured' => 0
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
        'featured' => 0
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
        'featured' => 0
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
        'featured' => 0
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
        'featured' => 1
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
        'featured' => 1
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
        'featured' => 1
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
        'featured' => 1
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
        'featured' => 1
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
        'featured' => 1
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
    'featured' => 0
])->categories()->attach(2);

Product::create([
    'name'=> 'Intel Ghost Canyon NUC',
    'slug'=>'intel-ghost-canyon-nuc',
    'details' => '9th-generation Intel Core i9 | Graphics: Intel UHD Graphics 630 | RAM: 64B DDR4
                  | Storage: 4TB SSD',
    'price' => 1500,
    'description' => 'Intel’s NUC has come a long way from its humble beginnings.
                      For example, while the previous Hades Canyon didn’t come with
                      a RAM or storage, the newer Ghost Canyon has both. In fact, not
                      only does it have more offerings now in terms of specs, but it’s
                       also highly configurable so you can personalize it to your liking
                     before hitting that buy button. With 9th-generation Intel Core chips,
                      up to 64GB of memory and up to 4TB dual storage, we’re all for it.',
    'featured' => 0
])->categories()->attach(2);

Product::create([
    'name'=> ' HP Omen Desktop PC',
    'slug'=>'hp-omen-desktop-pc',
    'details' => 'Intel Core i7-9700K | Graphics: Nvidia GeForce RTX 2080 Ti | RAM: Up to 64GB |
                     Storage: 512GB SSD + 2TB HDD',
    'price' => 1468,
    'description' => 'While the Decepticon look this gaming PC sports might only be for some,
                      there’s definitely something for everybody as far as configurations
                      go – whether you’re a casual gamer on a budget or a hardcore one willing
                     to drop a lot of dough for a souped up rig. ou’re getting a considerable
                      amount of power and storage.HP Omen Desktop PC comes in a tool-less design,
                      making it upgradeable.',
    'featured' => 0
])->categories()->attach(2);


 }
}
