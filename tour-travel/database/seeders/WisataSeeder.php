<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wisata = [
            [
                'id' => 1,
                'nama_wisata' => 'Bromo',
                'id_kategori_wisata' => 1,
                'deskripsi_wisata' => 'Gunung Bromo atau dalam bahasa Tengger dieja "Brama", juga disebut Kaldera Tengger, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang. Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah objek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif. Gunung Bromo termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru.',
                'harga_wisata' => 450000,
                'gambar_wisata' => '../resources/Bromo.png',
                'alamat_wisata' => 'Malang, Jawa Timur',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama_wisata' => 'Bukit Sikunir',
                'id_kategori_wisata' => 1,
                'deskripsi_wisata' => 'Berwisata ke Dataran Tinggi Dieng atau Dieng Plateau tidak lengkap tanpa mengunjungi Bukit Sikunir Dieng yang terletak di Desa Sembungan. Bukit Sikunir sebagai salah satu obyek wisata andalan Dataran Tinggi Dieng saat ini semakin ramai dikunjungi wisatawan baik domestik maupun mancanegara. Banyak hal yang menarik wisatawan untuk berkunjung ke Bukit Sikunir Dieng. Salah satu yang paling diincar wisatawan adalah indahnya view sunrise dari Puncak Sikunir yang dikenal dengan Golden Sunrise Sikunir yang fenomenal. Selain itu, dari Puncak Sikunir wisatawan bisa menyaksikan gagahnya gunung-gunung tinggi berderet dikejauhan.',
                'harga_wisata' => 350000,
                'gambar_wisata' => '../resources/Sikunir.png',
                'alamat_wisata' => 'Magelang, Jawa Tengah',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'nama_wisata' => 'Rinjani',
                'id_kategori_wisata' => 1,
                'deskripsi_wisata' => 'Gunung Rinjani adalah gunung yang berlokasi di Pulau Lombok, Nusa Tenggara Barat. Gunung yang merupakan gunung berapi kedua tertinggi di Indonesia dengan ketinggian 3.726 mdpl ini merupakan gunung favorit bagi pendaki Indonesia karena keindahan pemandangannya.Gunung ini merupakan bagian dari Taman Nasional Gunung Rinjani yang memiliki luas sekitar 41.330 ha dan ini akan diusulkan penambahannya sehingga menjadi 76.000 ha ke arah barat dan timur.',
                'harga_wisata' => 1750000,
                'gambar_wisata' => '../resources/Rinjani.png',
                'alamat_wisata' => 'Lombok, Nusa Tenggara Barat',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'nama_wisata' => 'Pantai Merah',
                'id_kategori_wisata' => 2,
                'deskripsi_wisata' => 'Pulau Merah atau Pulo Merah ( Red Island dalam Bahasa Inggris) adalah objek wisata pantai yang terletak di Kecamatan Pesanggaran, Kabupaten Banyuwangi, Provinsi Jawa Timur. Di pantai ini terdapat sebuah bukit hijau kecil dengan tanah berwarna merah yang terletak di dekat bibir pantai. Bukit tersebut dapat dikunjungi dengan berjalan kaki saat air laut surut.[1] Di Pulau Merah terdapat Pura yang digunakan pemeluk agama Hindu melaksanakan ibadah ataupun upacara Mekiyis. Kawasan wisata ini dikelola oleh Perum Perhutani Unit II Jawa Timur, KPH Banyuwangi Selatan.',
                'harga_wisata' => 650000,
                'gambar_wisata' => '../resources/PulauMerah.png',
                'alamat_wisata' => 'Banyuwangi, Jawa Timur',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'nama_wisata' => 'Tanah Lot',
                'id_kategori_wisata' => 2,
                'deskripsi_wisata' => 'Pura Tanah Lot adalah salah satu Pura (Tempat Ibadah Umat Hindu) yang sangat disucikan di Bali, Indonesia. Di sini ada dua Pura yang terletak di atas batu besar. Satu terletak di atas bongkahan batu dan satunya terletak di atas tebing mirip dengan Pura Uluwatu. Pura Tanah Lot ini merupakan bagian dari Pura Dang Kahyangan. Pura Tanah Lot merupakan Pura laut tempat pemujaan dewa-dewa penjaga laut. Tanah Lot terkenal sebagai tempat yang indah untuk melihat matahari terbenam.',
                'harga_wisata' => 850000,
                'gambar_wisata' => '../resources/TanahLot.png',
                'alamat_wisata' => 'Tabanan, Bali',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'nama_wisata' => 'Pantai 3 Warna',
                'id_kategori_wisata' => 2,
                'deskripsi_wisata' => 'Pantai 3 Warna merupakan kawasan rehabilitasi dan konservasi mangrove, terumbu karang dan hutan lindung. Pantai 3 warna memiliki keunikan tersendiri yakni memiliki warna air yang berbeda-beda yang meliputi warna biru, hijau dan coklat. Penyebab dari perbedaan warna air laut tersebut dikarenakan kedalaman air laut. Warna biru merupakan sisi yang paling dalam, hijau pada sisi yang dangkal serta coklat merupakan pada pasir pantai. Pantai 3 Warna memiliki ombak yang tenang dan satu-satunya spot snorkeling yang ada di Malang. Wisatawan dapat langsung menikmati indahnya tembu karang dan berbagai macam jenis ikan di sana. Pantai 3 Warna ini juga langsung berhadapan dengan Pulau Sempu yang indah. Pantai ini juga langsung bersebelahan dengan Pantai Sendang Biru.',
                'harga_wisata' => 500000,
                'gambar_wisata' => '../resources/Pantai3Warna.png',
                'alamat_wisata' => 'Malang, Jawa Timur',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'nama_wisata' => 'Air Terjun Tumpak Sewu',
                'id_kategori_wisata' => 3,
                'deskripsi_wisata' => 'Air Terjun Tumpak Sewu atau disebut juga Coban Sewu adalah sebuah air terjun berketinggian sekitar 120 meter. Air terjun ini berbatasan dengan Kabupaten Lumajang dan Kabupaten Malang, Provinsi Jawa Timur. Air Terjun Tumpak Sewu memiliki aliran air yang menyerupai tirai sehingga termasuk dalam tipe air terjun Tiered. Lokasi Air Terjun Tumpak Sewu ada di dalam sebuah lembah yang curam memanjang dengan elevasi 500 meter di atas permukaan air laut. Air Terjun Tumpak Sewu terbentuk di aliran Sungai Glidih[1] yang berhulu di Gunung Semeru.',
                'harga_wisata' => 665000,
                'gambar_wisata' => '../resources/TumpakSewu.png',
                'alamat_wisata' => 'Lumajang, Jawa Timur',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'nama_wisata' => 'Air Terjun Madakaripura',
                'id_kategori_wisata' => 3,
                'deskripsi_wisata' => 'Air terjun Madakaripura adalah sebuah air terjun yang terletak di Kabupaten Probolinggo, Provinsi Jawa Timur. Air terjun setinggi 200 meter ini merupakan air terjun tertinggi di Pulau Jawa dan tertinggi kedua di Indonesia. Air terjun ini adalah salah satu air terjun di kawasan Taman Nasional Bromo Tengger Semeru tepatnya di lereng Gunung Bromo. Air terjun Madakaripura berada di ujung lembah sempit dan berbentuk ceruk yang dikelilingi tebing-tebing curam yang meneteskan air pada seluruh bidang tebingnya seperti layaknya sedang hujan, 3 di antaranya bahkan mengucur deras membentuk air terjun lagi. Nama air terjun yang berada di ketinggian 1.000 Mdpl ini berasal dari kata Madakaripura, tanah perdikan milik mahapatih Gajah Mada dari kerajaan Majapahit. Air Terjun Madakaripura juga kerap disebut Air Terjun Abadi. Hal itu karena air yang dialirkan oleh air terjun ini selalu melimpah dan tak pernah berkurang debitnya.',
                'harga_wisata' => 455000,
                'gambar_wisata' => '../resources/Madakaripura.png',
                'alamat_wisata' => 'Probolinggo, Jawa Timur',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'nama_wisata' => 'Air Terjun Sipiso-piso',
                'id_kategori_wisata' => 3,
                'deskripsi_wisata' => 'Anda sedang berada di kawasan wisata Danau Toba? Tak ada salahnya untuk mengunjungi air Sipiso-piso. Air terjun ini merupakan salah satu destinasi wisata alam yang menjadi andalan di Provinsi Sumatera Utara dan termasuk air terjun tertinggi di Indonesia dengan ketinggian sekitar 120 meter. Air terjun Sipiso-piso terletak di Desa Tongging, Kecamatan Merek, Kabupaten Karo, Sumut. Wisata alam yang indah ini terbentuk dari sungai bawah tanah di Plato Karo yang mengalir melalui sebuah goa di sisi kawah Danau Toba. Untuk bisa menikmati keindahan air terjun ini dari dekat, Anda harus menuruni bukit yang curam, sehingga tak sedikit orang yang memilih melihat air terjun Sipiso-piso dari jauh. Meski begitu, keindahannya tetap terlihat dengan derasnya air yang mengalir dari ketinggian 120 meter.',
                'harga_wisata' => 2500000,
                'gambar_wisata' => '../resources/Sipiso.png',
                'alamat_wisata' => 'Karo, Sumatra Utara',
                'created_at' => Carbon::now(),
            ],

        ];

        foreach ($wisata as $wisata) {
            DB::table('wisata')->insert($wisata);
        }
    }
}