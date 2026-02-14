<?php
// quotes.php - Kumpulan quotes cinta dengan berbagai bahasa

$quotes = [
    [
        'text' => 'Cinta sejati bukan tentang seseorang yang sempurna, tapi tentang seseorang yang membuat hidupmu sempurna.',
        'author' => 'Anonymous'
    ],
    [
        'text' => 'Kamu adalah alasan aku tersenyum setiap hari.',
        'author' => 'Anonymous'
    ],
    [
        'text' => 'Love is composed of a single soul inhabiting two bodies.',
        'author' => 'Anonymous'
    ],
    [
        'text' => 'Kamu itu tidak bisa diungkapkan melalui kata-kata karena terlalu sempurnanya.',
        'author' => 'Anonymous'
    ],
    [
        'text' => 'The best thing to hold onto in life is each other.',
        'author' => 'Anonymous'
    ],
    [
        'text' => 'Bersamamu, setiap hari adalah Valentine.',
        'author' => 'Anonymous'
    ],
    [
        'text' => 'Kamu adalah hari ini dan semua besok dalam hidupku.',
        'author' => 'Anonymous'
    ],
    [
        'text' => 'I saw that you were perfect, and so I loved you. Then I saw that you were not perfect and I loved you even more.',
        'author' => 'Anonymous'
    ],
    [
        'text' => 'Cinta bukan bagaimana kamu melupakan, tapi bagaimana kamu memaafkan.',
        'author' => 'Anonymous'
    ],
    [
        'text' => 'You are my sun, my moon, and all my stars.',
        'author' => 'Anonymous'
    ]
];

// Fungsi untuk mendapatkan quote berdasarkan index
function getQuote($index) {
    global $quotes;
    return $quotes[$index % count($quotes)];
}

// Fungsi untuk mendapatkan quote random
function getRandomQuote() {
    global $quotes;
    return $quotes[array_rand($quotes)];
}
?>