<?php

namespace App\Database\Seeds;

use App\Models\AuthorModel;
use App\Models\BookModel;
use App\Models\GenreModel;
use App\Models\PublisherModel;
use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{

    private $bookModel;
    private $authorModel;
    private $publisherModel;
    private $genreModel;
    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->authorModel = new AuthorModel();
        $this->publisherModel = new PublisherModel();
        $this->genreModel = new GenreModel();
    }

    public function run()
    {
        $db = db_connect();
        $db->query("SET FOREIGN_KEY_CHECKS=0;");
        $this->bookModel->builder()->truncate();
        $faker = \Faker\Factory::create();
        $publisher = $this->publisherModel->select('id')->get()->getResultArray();
        $data = [
            [
                'title' => 'Penelusuran Benang Merah (A Study In Scarlet)',
                'author_id' => $this->getAuthorId('conandyle@gmail.com'),
                'language' => 'Indonesa',
                'price' => 56000,
                'total_pages' => 160,
                'cover' => '9786020631653_Penelusuran-Benang-Merah-A-Study-In-Scarlet.jpg',
                'genre_id' => $this->getGenreId('action'),
                'description' => 'Penelusuran Benang Merah merupakan buku pertama dalam seri Sherlock Holmes dan mengisahkan perkenalan dr. Watson dengan sang detektif. Sang dokter yang ketika itu belum mengetahui profesi Holmes, pada awalnya dibuat bingung dengan keeksentrikan pria itu serta kemampuannya yang unik. Holmes sangat pandai dalam ilmu deduksi dan mampu menebak keadaan seseorang hanya dalam sekali pandang. Para tamu yang mengunjungi rumah sewaan mereka di Baker Street pun berasal dari berbagai kelas sosial, mulai dari bangsawan sampai portir. Holmes juga mahir bermain biola, tetapi lebih sering menggeseknya sembarang. Dia bisa tampak sangat bersemangat, namun di lain waktu tampak merenung dengan tatapan kosong seperti orang kecanduan narkotika.'
            ],
            [
                'title' => 'Kau, Aku dan Sepucuk Angpau Merah',
                'author_id' => $this->getAuthorId('tereliye@gmail.com'),
                'language' => 'Indonesa',
                'price' => 95000,
                'total_pages' => 512,
                'cover' => '9786020331614_Kau-Aku-dan-Sepucuk-Angpau-Merah-Cover-Baru-2018.jpg',
                'genre_id' => $this->getGenreId('rommance'),
                'description' => 'Ada tujuh miliar penduduk bumi saat ini. Jika separuh saja dari mereka pernah jatuh cinta, maka setidaknya akan ada satu miliar lebih cerita cinta. Akan ada setidaknya 5 kali dalam setiap detik, 300 kali dalam semenit, 18.000 kali dalam setiap jam, dan nyaris setengah juta sehari-semalam, seseorang entah di belahan dunia mana, berbinar, harap-harap cemas, gemetar, malu-malu menyatakan perasaanya.'
            ],
            [
                'title' => 'Bumi Manusia',
                'author_id' => $this->getAuthorId('pramoedyaanantatoer@gmail.com'),
                'language' => 'Indonesa',
                'price' => 132000,
                'total_pages' => 538,
                'cover' => 'bumi-manusia.jpg',
                'genre_id' => $this->getGenreId('historical'),
                'description' => 'Roman Tetralogi Buru mengambil latar belakang dan cikal bakal nation Indonesia di awal abad ke-20. Dengan membacanya waktu kita dibalikkan sedemikian rupa dan hidup di era membibitnya pergerakan nasional mula-mula, juga pertautan rasa, kegamangan jiwa, percintaan, dan pertarungan kekuatan anonim para srikandi yang mengawal penyemaian bangunan nasional yang kemudian kelak melahirkan Indonesia modern.'
            ],
            [
                'title' => 'Romeo & Juliet',
                'author_id' => $this->getAuthorId('william@gmail.com'),
                'language' => 'Indonesa',
                'price' => 56000,
                'total_pages' => 188,
                'cover' => '9786025170201_ROMEO--JULIE.jpg',
                'genre_id' => $this->getGenreId('rommance'),
                'description' => 'Cerita berawal dari depresi yang dialami Romeo, karena cinta Romeo pada salah satu keponakan Capulet, Rosaline, tak berbalas. Atas bujukan fc Henvolio dan Mercutio, Romeo akhirnya bersedia menghadiri pesta dansa keluarga Capulet demi bisa bertemu dengan Rosaline. Namun di pesta itu Romeo melihat Juliet untuk pertama kalinya, dan jatuh cinta pada pandangan pertama.'
            ],
            [
                'title' => 'Terpuruk dan Melarat di Paris dan London (Down and Out in Paris and London)',
                'author_id' => $this->getAuthorId('gorge@gmail.com'),
                'language' => 'Indonesa',
                'price' => 64000,
                'total_pages' => 288,
                'cover' => 'Down_and_Out_in_Paris_and_London_cov.jpg',
                'genre_id' => $this->getGenreId('action'),
                'description' => 'Sebelum menjadi pengarang terkenal lewat buku Animal Farm dan 1984, George Orwell pernah hidup miskin di dua kota besar---Paris dan London. Di Paris, dia menjadi tukang cuci piring, dan di London, sambil mencari pekerjaan, dia banyak bergaul dengan gelandangan dan orang-orang jalanan, dan tinggal di rumah-rumah penampungan. Dengan narasi yang jujur dan sering kali humoris, buku semi autobiografi ini mengisahkan kehidupan Orwell pada masa-masa sulit sebagai orang melarat dan berbagai masalah yang mesti dihadapinya.'
            ],
            [
                'title' => 'Sherlock Holmes Petualangan Dirumah Kosong',
                'author_id' => $this->getAuthorId('conandyle@gmail.com'),
                'language' => 'Indonesa',
                'price' => 60000,
                'total_pages' => 208,
                'cover' => '556445a0e63c422b486d3dadd5cbdf1a.jpg',
                'genre_id' => $this->getGenreId('science-fiction'),
                'description' => 'Dalam buku ini, dihadirkan cerita-cerita terbaik yang akan mengajak pembaca bertualang mendampingi Sherlock Holmes dan Dokter Watson mengungkap berbagai kejahatan yang mengancam kedamaian London dan juga Eropa. termasuk pertemuan dengan sang rival terberat, Profesor Moriarty yang demikian melegenda.' 
            ],
            [
                'title' => 'Tentang Kamu',
                'author_id' => $this->getAuthorId('tereliye@gmail.com'),
                'language' => 'Indonesa',
                'price' => 89000,
                'total_pages' => 503,
                'cover' => '9786239554569.jpg',
                'genre_id' => $this->getGenreId('rommance'),
                'description' => 'Terima kasih untuk kesempatan mengenalmu, itu adalah salah satu anugerah terbesar hidupku. Cinta memang tidak perlu ditemukan, cintalah yang akan menemukan kita. Terima kasih. Nasihat lama itu benar sekali, aku tidak akan menangis karena sesuatu telah berakhir, tapi aku akan tersenyum karena sesuatu itu pernah terjadi. Masa lalu. Rasa sakit. Masa depan. Mimpi-mimpi. Semua akan berlalu, seperti sungai yang mengalir. Maka biarlah hidupku mengalir seperti sungai kehidupan.'
            ],
            [
                'title' => 'Rumah Kaca',
                'author_id' => $this->getAuthorId('pramoedyaanantatoer@gmail.com'),
                'language' => 'Indonesa',
                'price' => 137000,
                'total_pages' => 656,
                'cover' => 'Rumah-Kaca.jpg',
                'genre_id' => $this->getGenreId('historical'),
                'description' => 'Kehadiran roman sejarah ini, bukan saja dimaksudkan untuk mengisi sebuah episode berbangsa yang berada di titik persalinan yang pelik dan menentukan, namun juga mengisi isu kesusastraan yang sangat minim menggarap periode pelik ini. Karena itu hadirnya roman ini memberi bacaan alternatif kepada kita untuk melihat jalan dan gelombang sejarah secara lain dan dari sisinya yang berbeda. Tetralogi ini dibagi dalam format empat buku.'
            ],
        ];

        foreach ($data as $book) {
            $this->bookModel->insert([
                'title' => $book['title'],
                'slug' => slug($book['title']),
                'genre_id' => $book['genre_id'],
                'author_id' => $book['author_id'],
                'publisher_id' => $publisher[$faker->numberBetween(0, count($publisher) - 1)]['id'],
                'price' => $book['price'],
                'total_pages' => $book['total_pages'],
                'release_date' => $faker->date(),
                'language' => $book['language'],
                'description' => $book['description'],
                'quantity' => $faker->numberBetween($min = 1, $max = 10),
                'cover' => $book['cover']
            ]);
        }

        $db->query("SET FOREIGN_KEY_CHECKS=1;");
    }

    private function getAuthorId($email = 'conandyle@gmail.com')
    {
        $author = $this->authorModel->where('email', $email)->first();
        if (!$author) {
            return 1;
        }
        return $author['id'];
    }

    private function getGenreId($name = 'action')
    {
        $genre = $this->genreModel->where('name', $name)->first();
        if (!$genre) {
            return 1;
        }
        return $genre['id'];
    }
}
