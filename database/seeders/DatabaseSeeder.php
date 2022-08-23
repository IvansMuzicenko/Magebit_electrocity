<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        //Mouses ----------------------------------------
        $mouseBrand = [
            "Logitech",
            "Logitech",
            "Logitech",
            "Logitech",
            "Steelseries",
            "Steelseries",
            "Steelseries",
            "Steelseries",
            "DELL",
            "DELL",
        ];
        $mouseModel = [
            "G203",
            "G203",
            "GPro",
            "MX",
            "Aerox 3",
            "Prime",
            "Prime Neo",
            "Rival 600",
            "545-BBDS",
            "610M",
        ];
        $mouseColor = [
            "Blue",
            "Black",
            "Black",
            "Black",
            "White",
            "Black",
            "White",
            "Black",
            "Black",
            "White",
        ];
        $mouseConn = [
            "USB",
            "USB",
            "USB",
            "Wireless",
            "USB",
            "Wireless",
            "USB",
            "USB",
            "USB",
            "Wireless",
        ];
        $mousePrice = [
            "30,00",
            "35,00",
            "99,00",
            "80,00",
            "47,00",
            "93,00",
            "60,00",
            "80,00",
            "51,00",
            "83,00",
        ];
        $mouseImg1 = [
            "https://m.media-amazon.com/images/I/61BnR2NE4PL._AC_SX679_.jpg",
            "https://m.media-amazon.com/images/I/61UxfXTUyvL._AC_SX679_.jpg",
            "https://images.1a.lv/display/aikido/store/b570d89cd6b4699f7c1c51b49ffe1c7f.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/9f675d9d836710e0ba74e57870510053.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/e408073abb7f88ddf4ebf9cfbc3c1c66.png?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/b6657e77c6d13596de09e44e9d61aea5.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/8748d8741ecf346bbbc81286d691311d.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/da625b99cdd427c63cc68cc3ca97c004.png?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/3fee97bba408d2ca5fc2bd8d52609770.png?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/338d932781c6dda7229eefeb17111c87.jpg?h=742&w=816",
        ];
        $mouseImg2 = [
            "https://images.1a.lv/display/aikido/store/d0c195dba74d40b9ca74217ef16b1dae.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/d47ad6e1a090b6af0eaff11af8f044a0.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/4c986a08fb70e2a911d669fdd2ade3d6.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/352f1d7fa997c7c2bc79f2d3a6030ea4.png?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/715639ae54fb2079df2fb12606b51004.png?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/07895389ce5dd2d9795b08ab6c4db0e7.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/d2fcb0e55841249ae3d14fe4e3951e42.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/86265d2408add57d8991ff8d56b3ce72.jpg?h=742&w=816",
            "https://d3d14bvuzxlv37.cloudfront.net/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/D/-/D-N-545-BBDS_mouse-alienware-aw320m-black-gallery-1.webp",
            "https://images.1a.lv/display/aikido/store/b1aa5455e788d77f0e415e1ca9925d7a.jpg?h=742&w=816"
        ];
        $mouseImg3 = [
            "https://images.1a.lv/display/aikido/store/b9c609996e2660635b608e2c2032850c.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/8e6fd6f7325159c32f089cd0c1fb201a.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/b862f765a66aaec1e2661514124db5cd.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/949a3c638a7f3229b1a06dbab58bcfdc.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/94ddc1e49b39198bc4dd9a10c60f57d0.png?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/5c9b2eb57d0bb49c10195e92d9baa498.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/7d5b8dccee29ea272e896eea4f64e795.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/da625b99cdd427c63cc68cc3ca97c004.png?h=742&w=816",
            "https://d3d14bvuzxlv37.cloudfront.net/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/D/-/D-N-545-BBDS_mouse-alienware-aw320m-black-gallery-3.webp",
            "https://images.1a.lv/display/aikido/store/6d6eb337cfa2f289796ba2b25efea57b.jpg?h=742&w=816",
        ];

        //Keyboards ----------------------------------------
        $keyboardBrand = [
            "Razer",
            "Razer",
            "Logitech",
            "Logitech",
            "Logitech",
            "Redragon",
        ];
        $keyboardModel = [
            "BlackWidow",
            "Huntsman",
            "MK235",
            "K380",
            "G413",
            "K599",
        ];
        $keyboardColor = [
            "Black",
            "White",
            "Black",
            "Black",
            "Black",
            "Black",
        ];
        $keyboardConn = [
            "USB",
            "USB",
            "Wireless",
            "Wireless",
            "USB",
            "Wireless",
        ];
        $keyboardPrice = [
            "150,00",
            "100,00",
            "50,00",
            "47,00",
            "68,00",
            "55,00",
        ];
        $keyboardImg1 = [
            "https://images.1a.lv/display/aikido/store/5d93b456678038a0871a3304fadcb8d7.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/1ccac4e6e778f0e78d38f0d4944bd511.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/26f05742d4835d2149a2aad4b2c58a10.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/fad89d41b0ce74ea2fe5d09a8bee8074.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/6faa5776ec240376a323c8a509e8c720.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/9f1e3520417295ba675741f2803daf8d.jpeg?h=742&w=816",
        ];
        $keyboardImg2 = [
            "https://images.1a.lv/display/aikido/store/babb7ecb95103cd3a083022e6b483567.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/b2e4fe94c2426ecfa6636fab2c1dab2f.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/66b1bcdd48b5a5c96721a021394c1d50.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/3ae17808a0fbbdf6815c91c1c7bc8462.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/d6935ba5655dce7770b2c08e888aa98b.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/8a23149e4d4902c02f21d10c8b6369d7.jpeg?h=742&w=816",
        ];
        $keyboardImg3 = [
            "https://images.1a.lv/display/aikido/store/8a9a8061a870e7f7d17198eca8964942.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/9c0bf0743e15115b0863b4a70806e758.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/5a903f602803ab1c3e8d2abac38b90d9.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/dbeb1c32b41c9802b5eca44a6aca41bb.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/e2f4858b77988d8f2e84c6c26fff678d.jpg?h=742&w=816",
            "https://http2.mlstatic.com/D_NQ_NP_852820-MLA49004181665_022022-O.webp",
        ];

        //Headsets ----------------------------------------
        $headsetBrand = [
            "Logitech",
            "Corsair",
            "Razer",
            "Razer",
            "Logitech",
        ];
        $headsetModel = [
            "G733",
            "HS70 PRO",
            "Kraken",
            "Kraken",
            "G435",
        ];
        $headsetColor = [
            "White",
            "Black",
            "Green",
            "Black",
            "Black",
        ];
        $headsetConn = [
            "Wireless",
            "Wireless",
            "3.5 mm",
            "3.5 mm",
            "Wireless",
        ];
        $headsetPrice = [
            "54,00",
            "60,00",
            "59,99",
            "59,99",
            "79,99",
        ];
        $headsetImg1 = [
            "https://images.1a.lv/display/aikido/store/8c8c08771287f36f08f014344df0adb4.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/8b74d6e418e2bfc1e0656e1c2cce4d7d.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/77c2b9f153717cdd9903f57408af8357.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/f335fde4916ca25a8b127e09e751188d.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/8110bdf88a97165e5504aaae26f39a3d.jpeg?h=742&w=816",
        ];
        $headsetImg2 = [
            "https://images.1a.lv/display/aikido/cache/70a185f5ea17f711c8cdf8e2e8944e7d.jpeg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/0d6a1d0947c9a670d90cb1236a11e250.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/57101c5350e31235f3da09eead4bba64.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/d6469aec7f5aad5d33354ee6d744bf8d.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/4cbfd63d780aa0eb8fd178ff0a0757b2.png?h=742&w=816",
        ];
        $headsetImg3 = [
            "https://4frag.ru/image/cache/data/Naushniki/Logitech/logitech-g733-white-2-600x600.jpg",
            "https://images.1a.lv/display/aikido/store/47a0c345264bfec150710d6f7c62c192.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/399b07e5e8bacadde7be58da801c3963.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/store/3836d31de00ad7a56fefa1dd53266b39.jpg?h=742&w=816",
            "https://images.1a.lv/display/aikido/cache/1197773e08d527fbfa135a46e6f36c16.png?h=742&w=816",
        ];
        for ($i = 0; $i < count($mouseBrand); $i++) {
            DB::table('products')->insert([
                "type" => "Mouse",
                "brand" => $mouseBrand[$i],
                "model" => $mouseModel[$i],
                "color" => $mouseColor[$i],
                "connection" => $mouseConn[$i],
                "price" => $mousePrice[$i],
                "img1" => $mouseImg1[$i],
                "img2" => $mouseImg2[$i],
                "img3" => $mouseImg3[$i],
            ]);
        }
        for ($i = 0; $i < count($keyboardBrand); $i++) {
            DB::table('products')->insert([
                "type" => "Keyboard",
                "brand" => $keyboardBrand[$i],
                "model" => $keyboardModel[$i],
                "color" => $keyboardColor[$i],
                "connection" => $keyboardConn[$i],
                "price" => $keyboardPrice[$i],
                "img1" => $keyboardImg1[$i],
                "img2" => $keyboardImg2[$i],
                "img3" => $keyboardImg3[$i],
            ]);
        }
        for ($i = 0; $i < count($headsetBrand); $i++) {
            DB::table('products')->insert([
                "type" => "Headset",
                "brand" => $headsetBrand[$i],
                "model" => $headsetModel[$i],
                "color" => $headsetColor[$i],
                "connection" => $headsetConn[$i],
                "price" => $headsetPrice[$i],
                "img1" => $headsetImg1[$i],
                "img2" => $headsetImg2[$i],
                "img3" => $headsetImg3[$i],
            ]);
        }
    }
}
