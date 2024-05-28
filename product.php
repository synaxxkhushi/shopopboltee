<?php
$products = [
    ['id' => 1, 'name' => 'Chatgpt Api', 'image' => 'https://i.ibb.co/gTTDpJZ/3c22f5767e9f.jpg', 'value' => 5],
    ['id' => 2, 'name' => 'Manga Api', 'image' => 'https://i.ibb.co/bK1r6jK/7883d7ac1e56.jpg', 'value' => 5],
    ['id' => 3, 'name' => 'Manga Bot Cloner Api', 'image' => 'https://i.ibb.co/QDgRBxw/6daee9a9a024.jpg', 'value' => 5],
        ['id' => 4, 'name' => 'Spotify Song Downloader Api', 'image' => 'https://i.ibb.co/XCzyN9V/0acc66bd99c3.jpg', 'value' => 5],
        ['id' => 5, 'name' => 'Dynamic Qr Code Api + Bot', 'image' => 'https://i.ibb.co/Y2297MW/5219427728aa.jpg', 'value' => 6],
        ['id' => 6, 'name' => 'Wormgpt Api + Bot', 'image' => 'https://i.ibb.co/y0df66g/c64e1a03a57b.jpg', 'value' => 5],
        ['id' => 7, 'name' => 'Chatgpt Customizable Modes ', 'image' => 'https://i.ibb.co/gTTDpJZ/3c22f5767e9f.jpg', 'value' => 7],
        ['id' => 8, 'name' => 'Terabox Api Temporary +Web', 'image' => 'https://i.ibb.co/Qpcpk4n/file-11.jpg', 'value' => 4],
         ['id' => 9, 'name' => 'Facebook Video Downloader Api', 'image' => 'https://i.ibb.co/K9j325g/file-12.jpg', 'value' => 5],
         ['id' => 10, 'name' => 'Youtube Video Downloader Api', 'image' => 'https://i.ibb.co/47gZyXr/file-13.jpg', 'value' => 5],
           ['id' => 11, 'name' => 'Instagram Video Downloader Api', 'image' => 'https://i.ibb.co/jW4Xzs7/file-14.jpg', 'value' => 5],
                    ['id' => 12, 'name' => 'Fake info generator Api+Bot', 'image' => 'https://i.ibb.co/JBgqgbm/file-15.jpg', 'value' => 3],  
                    ['id' => 13, 'name' => 'Mediafire Downloader Api + Bot', 'image' => 'https://mallucampaign.in/images/img_1715014031.jpg', 'value' => 2.5], 
['id' => 14, 'name' => 'Youtube m3u8 Converter Api + Bot', 'image' => 'https://i.ibb.co/n0ZDMp2/file-17.jpg', 'value' => 3],             
['id' => 15, 'name' => 'Manga Website ', 'image' => 'https://i.ibb.co/bK1r6jK/7883d7ac1e56.jpg', 'value' => 6],            
['id' => 16, 'name' => 'Blackbox Ai Api ', 'image' => 'https://i.ibb.co/42FV7DM/file-18.jpg', 'value' => 4],            


 
];

// Set header for JSON content
header('Content-Type: application/json');

// Encode products array to JSON with JSON_UNESCAPED_SLASHES option
echo json_encode($products, JSON_UNESCAPED_SLASHES);
?>
