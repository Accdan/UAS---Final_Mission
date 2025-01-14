-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2025 at 08:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocaweb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutz`
--

CREATE TABLE `aboutz` (
  `ab_id` int NOT NULL,
  `image` text NOT NULL,
  `who_are_we` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `visi_misi` longtext NOT NULL,
  `community_explain` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventz`
--

CREATE TABLE `eventz` (
  `eid` int NOT NULL,
  `judul` varchar(225) NOT NULL,
  `poster` text NOT NULL,
  `isi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pid` int NOT NULL,
  `create_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `eventz`
--

INSERT INTO `eventz` (`eid`, `judul`, `poster`, `isi`, `pid`, `create_at`, `status`) VALUES
(7, '<p><strong>PODCAFE</strong> : Bahas Fate/Strange Fake</p>', 'src/『Fate_strange Fake』.jpg', '<p><strong>Perang Cawan Suci yang disalin secara keliru dari Perang Cawan Suci Ketiga di Fuyuki.</strong>&nbsp;</p><p>&nbsp;</p><p>Setelah berakhirnya Perang Cawan Suci ketiga, sebuah organisasi dari Amerika Serikat yang memiliki magi terpisah dari Asosiasi Penyihir yang berpusat di London karena para anggotanya mengambil data dari Perang Cawan Suci Fuyuki dan merencanakan ritual mereka sendiri.</p>', 2, '2025-01-14 03:17:03', 1),
(8, '<p>PODCAFE : Free Talk bersama Moona Hoshinova!!!</p>', 'src/download (2).jpg', '<p><strong>HELLO</strong></p><p>&nbsp;</p><p>Kali ini kita akan Podcast Bareng Ayang Moona cuiii</p>', 3, '2025-01-14 07:34:33', 0),
(10, 'WIBUCIN : WIbu Sakit Hati? Emang Bisa?!', 'src/wibucin.png', '<p>•════•【𝗢𝗧𝗔𝗞𝗨 𝗖𝗔𝗙𝗘 - 𝗣𝗥𝗘𝗦𝗘𝗡𝗧】•════•</p><p>&gt; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 𝐏𝐎𝐃𝐂𝐀𝐅𝐄 - Podcast Otaku Cafe<br>&gt; &nbsp; &nbsp; &nbsp; &nbsp;\"VOL. 16 : **WIBUCIN : Wibu Sakit Hati? Emang Bisa?!**\"</p><p>Hai Hallo Minna @everyone &nbsp;!!</p><p>Kalian lagi pengen belajar tentang romansa?</p><p>Nah saat yang tepat nih buat kamu-kamu ikutin event kali ini, selain kalian bisa dengerin cerita romansa, kalian juga bisa memberikan cerita kalian dan akan dibacakan oleh host.</p><p>Dengan bergabung ke event kami, kalian bisa dapet banyak pengalaman mengenai hal-hal romansa.</p><p>Submit cerita kalian disini<br>https://forms.gle/fFBKsKTLHWL3RZiy7</p><p><br>&gt; ` [🗓️] Hari &nbsp;: ` **Sabtu, 22 Juni 2024**<br>&gt; ` [⏰] Waktu : ` **20:00 WIB - Selesai**<br>&gt; ` [🎙️] Host &nbsp;: &nbsp;<strong>Denif</strong> dan <strong>Naxxi</strong><br>&gt; ` [🏛️] Venue : ` <a href=\"https://discord.com/channels/746278243216392324/1014523644745093140\">https://discord.com/channels/746278243216392324/1014523644745093140</a></p><p><br>Yuk, ajak teman-teman kalian datang ke eventnya karena akan ada giveaway dan reward untuk audience hadir dan aktif.<br>Jangan sampai ketinggalan ya.<br>**PODCAFE WITH OTAKU CAFE**</p><p>` Poster by &nbsp; &nbsp;: Han<br>` Link Poster &nbsp;: <a href=\"`https://cdn.discordapp.com/attachments/1052871696677359706/1253494188352212992/Vol.16_20240621_073725_0000.png?ex=66760eef&amp;is=6674bd6f&amp;hm=4d6e3ebfb559dca1e223ec38bf0409650fb5d98972a4356cf3796f87deb37b54&amp;\">`https://cdn.discordapp.com/attachments/1052871696677359706/1253494188352212992/Vol.16_20240621_073725_0000.png?ex=66760eef&amp;is=6674bd6f&amp;hm=4d6e3ebfb559dca1e223ec38bf0409650fb5d98972a4356cf3796f87deb37b54&amp;</a><br>` Link Event &nbsp; : <a href=\"` https://discord.gg/otaku-cafe-746278243216392324?event=1253595194436358227\">` https://discord.gg/otaku-cafe-746278243216392324?event=1253595194436358227</a><br>` Link Server &nbsp;: <a href=\"`https://discord.gg/otaku-cafe-746278243216392324\">`https://discord.gg/otaku-cafe-746278243216392324</a></p><p>‼️ GIVEAWAY &amp; QUIZ ALERT ‼️<br>&lt;#996017219353980938&gt;</p>', 3, '2025-01-06 05:00:32', 1),
(13, '  𝗢𝗖𝗔𝗙𝗘𝗦𝗧 - 𝗢𝗰𝗮𝗳𝗲 𝗙𝗲𝘀𝘁𝗶𝘃𝗮𝗹           \"Main Stage Otaku Cafe Festival\"', 'src/ocafwe.jpg', '<p>Hai Hallo @everyone \"Otaku Cafe Festival\" hadir sebagai hiburan, mewarnai dunia virtual. Memberikan ruang bagi penggiat maupun penggemar pop-culture serta menghadirkan panggung, dan memberikan ruang kreatifitas. MAIN STAGE OCAFEST menghadirkan hal menarik, menggabungkan kencintaan terhadap anime, seni, dan fenomena dunia virtual. Dunia virtual, Illustrator, dan seputar Anime manga. Vtuber dengan perkembangan virtual, Illustrator dengan proses kreatif mereka, hingga fenomena penggemar anime di Indonesia dengan segala kisahnya.&nbsp;</p><p>&nbsp;</p><p>Tiga topik menarik beserta guest yang terampil hadir meramaikan OCAFEST. CATAT JADWALNYA! <img src=\"https://discord.com/assets/142423f53c548759b30a.svg\" alt=\"📅\"> <strong>Tanggal</strong> : 25 - 26 Agustus 2023 (dua hari) <img src=\"https://discord.com/assets/243c8770d52d7f1acbb0.svg\" alt=\"⏰\"> <strong>Waktu</strong> : Pukul, 19:00 WIB (GMT+7) <img src=\"https://discord.com/assets/c1f1dbff510558583391.svg\" alt=\"🎙️\"> <strong>Host</strong> : @❑ Host <img src=\"https://discord.com/assets/7c2bf519ee13934638c0.svg\" alt=\"🌟\"> <strong>Guest</strong> : @Airisiaaa @![✨] zane Eitss... GIVEAWAY juga hadir untuk meramaikan <img src=\"https://discord.com/assets/ea54191208d770b20952.svg\" alt=\"🥳\"> Jangan sampai ketinggalan, pastikan kamu ikut dan aktif berinteraksi di event nanti! <img src=\"https://discord.com/assets/085f9a67339a3f0656ee.svg\" alt=\"🍥\"> <strong>Link Event</strong></p><blockquote><p><a href=\"https://discord.com/events/746278243216392324/1144296486344077383\">https://discord.com/events/746278243216392324/1144296486344077383</a></p></blockquote>', 2, '2025-01-08 00:57:54', 1),
(14, '𝐏𝐎𝐃𝐂𝐀𝐅𝐄 - Podcast Otaku Cafe VOL.14 \"Frieren: Beyond Journey’s End\"', 'src/Desain-tanpa-judul-768x432.jpg', '<p>Hai Hallo @everyone !!! Bang rekomendasi anime genre NATIVE ISEKAI DONG!<img src=\"https://discord.com/assets/50edf055a7d1af5544a5.svg\" alt=\"🤓\"> Apaan tuhhhh... Ngga native SHONEN sekalian wkwk... Sini kita kasih paham dengan salah satu anime yang kata wibu bocil sepi awikwok, udah sepi ostnya Yoisabi pulakkk<img src=\"https://discord.com/assets/a5682f6bee778fc17d7e.svg\" alt=\"🤡\"> seleramu aja yang jelek kids. Kenalin nih anime Frieren, Anime petualangan, fantasi, dan shounen dengan tema Arti Dari kehidupan abadi. Dalam dunia yang diperindah oleh sihir, dihuni oleh beragam ras, dan dipenuhi dengan tantangan epik. Apakah anime ini beneran bagus? sini kita bahas bareng-bareng di podcast! <img src=\"https://discord.com/assets/7879af8e9f0e67967e2f.svg\" alt=\"‼️\"> GIVEAWAY &amp; QUIZ ALERT <img src=\"https://discord.com/assets/7879af8e9f0e67967e2f.svg\" alt=\"‼️\"> [🎙️] Host: @Deenifff✨🔥⚜ &amp; @ZhanGJhanG 『 ✓ᴠᴇʀʀɪғɪᴇᴅ』 [🗓️] Hari: Sabtu, 18 November 2023 [⏰] Waktu: Pukul 21:00 WIB (Malam Minggu) Link event : <a href=\"https://discord.gg/otaku-cafe-746278243216392324?event=1175065320231280670\">https://discord.gg/otaku-cafe-746278243216392324?event=1175065320231280670</a></p>', 1, '2025-01-13 05:19:17', 1),
(15, '<p>𝐏𝐎𝐃𝐂𝐀𝐅𝐄 - Belajar Gambar Bareng VTuber!!! \"VOL. 18 : Menggambar Karakter Chibi: Imutnya di Level Maksimal!\"</p>', 'src/ayascy1.png', '<p><br>Hai Hallo Minna @everyone @⭐ • Yuujin !! Buat kalian yang mau belajar menggambar karakter chibi, event ini cocok banget! Episode kali ini, VTuber kita bakal kasih tutorial step-by-step gimana caranya bikin karakter chibi yang super imut. Gak cuma belajar, kalian juga bisa kirim hasil karya kalian untuk dikomentari langsung oleh vtuber loh!!!. Dengan gabung ke event ini, kalian bisa belajar sambil seru-seruan, bertanya, dan langsung praktik menggambar!</p><blockquote><p>[🗓️] Hari : <strong>Sabtu, 5 Oktober 2024</strong> [⏰] Waktu : <strong>20:00 WIB - Selesai</strong> [🎙️] Host : @Harujo [✨] Guest : @Aya | P! Bang VArtist [🏛️] Venue : ⁠🎪・STAGE EVENT</p></blockquote><p>Ajak teman-teman kalian, karena akan ada Q&amp;A dan giveaway untuk peserta aktif! Jangan sampai ketinggalan ya. <strong>𝐏𝐎𝐃𝐂𝐀𝐅𝐄 - Belajar Gambar Bareng VTuber!!!</strong> Poster by : @Harujo Link Poster : <a href=\"https://media.discordapp.net/attachments/1030148034954268752/1291610483928862772/ayascy1.png?ex=6700b980&amp;is=66ff6800&amp;hm=9cc71f390401451db9a2c1c1fdf686249bce6c3f118e6a86c8e1907b57cb5947&amp;=&amp;format=webp&amp;quality=lossless&amp;width=700&amp;height=700\">Poster Podcast Vol.18</a> Link Event : <a href=\"https://discord.gg/2hCaeV26CN?event=1291623642920124487\">https://discord.gg/2hCaeV26CN?event=1291623642920124487</a> Link Server : <a href=\"https://discord.gg/uYUjzTCGwZ\">https://discord.gg/uYUjzTCGwZ</a>&nbsp;<br>&nbsp;</p>', 3, '2025-01-14 07:31:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_partners`
--

CREATE TABLE `event_partners` (
  `eventpartner_id` int NOT NULL,
  `partner_Id` int NOT NULL,
  `event_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `nid` int NOT NULL,
  `title` varchar(225) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` text,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`nid`, `title`, `content`, `image`, `create_at`) VALUES
(7, '<p><strong>Fate/strange Fake</strong></p>', '<p><i><strong>Perang Cawan Suci</strong></i> yang disalin secara keliru dari Perang Cawan Suci Ketiga di Fuyuki . Setelah berakhirnya Perang Cawan Suci ketiga, sebuah organisasi dari Amerika Serikat yang memiliki magi terpisah dari Asosiasi Penyihir yang berpusat di London karena para anggotanya mengambil data dari Perang Cawan Suci Fuyuki dan merencanakan ritual mereka sendiri.</p>', 'src/『Fate_strange Fake』.jpg', '2025-01-09 05:25:39'),
(8, '<h2><strong>Jajaran Anime Terfavorit Selama Tahun 2024 Menurut Animate Times</strong></h2>', '<p>Tahun 2024 baru saja berakhir. Berbagai <a href=\"https://www.kaorinusantara.or.id/rubrik/aktual/anime\">anime-anime</a> baru telah dirilis pada tahun tersebut, baik itu anime yang benar-benar baru ataupun anime lanjutan dari musim sebelumnya. Tapi apa sajakah yang difavoritkan para fans, terutama di Jepang selama tahun 2024 lalu? Kini laman <strong>Animate Times </strong>memuat 10 judul anime terfavorit selama tahun 2024 lalu berdasarkan jajak pendapat mereka. Inilah jajaran anime terfavorit 2024 menurut Animate Times:</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><ul><li>Oshi no Ko Season 2</li><li>Makeine: Too Many Losing Heroines!</li><li>DANDADAN</li><li>Mashle: Magic and Muscles Season 2</li><li>Oblivion Battery</li><li>The Elusive Samurai</li><li>Delicious in Dungeon</li><li>My Hero Academia Season 7</li><li>The Dangers in My Heart</li><li>Blue Lock Season 2</li><li>&nbsp;</li></ul><p>Adakah anime-anime kesukaan Kaoreaders di antara daftar ini? Sampaikan komentar kalian ya!</p>', 'src/Desain-tanpa-judul-768x432.jpg', '2025-01-14 07:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `partnerz`
--

CREATE TABLE `partnerz` (
  `pid` int NOT NULL,
  `pname` varchar(225) NOT NULL,
  `pdesc` varchar(225) NOT NULL,
  `ppict` text NOT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `partnerz`
--

INSERT INTO `partnerz` (`pid`, `pname`, `pdesc`, `ppict`, `create_at`) VALUES
(1, 'NIMENATION', 'Nimenation adalah komunitas indie yang berjalan demi keselamatan umat manusia', 'src/(PRIMARY COLOR) Nimenation Logo Original.png', '2025-01-04 07:12:25'),
(2, 'MAHA5 Official', 'Agensi vtuber Maha5 dikepalai oleh dua CEO dari Rentracks dan Shinta VR, sebuah perusahaan yang berkolaborasi dengan Rentracks dalam pengembangan teknis vtuber.', 'src/MAHA5_Logo.png', '2025-01-04 06:36:29'),
(3, 'Hololive ID', 'Hololive adalah agensi YouTuber virtual (VTuber) asal Jepang yang memiliki cabang di Indonesia. ', 'src/Hololive_Production_logo.png', '2025-01-06 03:10:56'),
(4, 'Hoyoverse', 'HoYoverse adalah perusahaan pengembang game dan studio animasi yang berbasis di Shanghai, Tiongkok. Perusahaan ini didirikan pada tahun 2012 oleh tiga mahasiswa Universitas Jiao Tong, Shanghai. ', 'src/HoYoverse-Logo.png', '2025-01-08 00:45:50'),
(5, 'V Shojo Entertainment', 'VShojo adalah agensi bakat yang berfokus pada promosi kreator konten VTuber (YouTuber virtual) asal Amerika Serikat.', 'src/VShojo_Logo.svg.png', '2025-01-08 00:39:27'),
(6, 'Nijisanji JP', 'Nijisanji adalah agensi Virtual YouTuber (VTuber) asal Jepang yang didirikan pada tahun 2018 oleh Ichikara Inc. (sekarang Anycolor Inc.). ', 'src/Nijisanji_logo.svg.png', '2025-01-08 00:41:48'),
(7, 'Pertamina ', 'Pertamina adalah perusahaan energi nasional yang bergerak di bidang migas. ', 'src/Pertamina_Logo.png', '2025-01-13 05:45:08'),
(8, 'Amazon', 'Amazon adalah toko online pertama didunia.', 'src/Amazon_logo.png', '2025-01-14 07:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `profilez`
--

CREATE TABLE `profilez` (
  `aid` int NOT NULL,
  `logo` text NOT NULL,
  `jumbtron` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `banner` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rolez`
--

CREATE TABLE `rolez` (
  `id` int NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rolez`
--

INSERT INTO `rolez` (`id`, `name`, `description`, `create_at`, `status`) VALUES
(1, 'Admin', 'ADMIN', '2024-12-23 08:47:07', 1),
(2, 'User', 'Member', '2024-12-23 08:46:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int NOT NULL,
  `uname` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `id` int NOT NULL COMMENT 'Foreign Key role.id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `password`, `create_at`, `id`) VALUES
(2, 'Hardjo', '$2y$10$89YWLzC6crw0IyJKfqnObuwKeaPsyjeiGVjmOhI6AoHi0ZAHzF/qC', '2024-12-30 03:13:06', 1),
(3, 'Member', '$2y$10$nv6iw4B29sTUDFmUVO0/CefbAG0OF7WfBTC/cvFghN8zYlEjcI7sO', '2024-12-23 08:58:41', 2),
(6, 'Rudi', '$2y$10$hzlKsTy1E6EVvRf4KKu9Tu5f/sB9iUfSGpVK2trQxJA7q5YyLfy4u', '2025-01-04 01:45:10', 2),
(7, 'Ell', '$2y$10$rrQiuWK2GEbyJSYR2.HxBugBeFpNQhiGOcwbvkgUU.ISLIAkXOL02', '2025-01-04 01:45:51', 1),
(8, 'Shiyo', '$2y$10$Tt4woImzuHiRekwxMOi1au8bdCUqI5t0cnmIpbBdU2.bBAQz08ugm', '2025-01-05 10:59:18', 1),
(9, 'indra', '$2y$10$d3aNzxTLmprh13XszDzyDunAP2Q4NSUGGMNqimduBLNy0iRUndIxW', NULL, 2),
(10, 'Danu', '$2y$10$a4gPnt1BVqfj3uDOnwOHZuQ2kNRKUe5M/FX8NuBct4Y58uhYeM4Ju', NULL, 2),
(11, 'Lala', '$2y$10$GAT63gg.sbJEibOyTL1gJevhYoJx2OhD11P6XTRYJPxOgw0hKg7N6', NULL, 2),
(12, 'Ono', '$2y$10$M/mYLYbIDKddJ5Y52rB/VOoXfns.wDZXkaDv1CJjAYJXD0U0jPAve', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutz`
--
ALTER TABLE `aboutz`
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `eventz`
--
ALTER TABLE `eventz`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `event_partners`
--
ALTER TABLE `event_partners`
  ADD PRIMARY KEY (`eventpartner_id`),
  ADD KEY `event_Id` (`event_Id`),
  ADD KEY `partner_Id` (`partner_Id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `partnerz`
--
ALTER TABLE `partnerz`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `profilez`
--
ALTER TABLE `profilez`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `rolez`
--
ALTER TABLE `rolez`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutz`
--
ALTER TABLE `aboutz`
  MODIFY `ab_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventz`
--
ALTER TABLE `eventz`
  MODIFY `eid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `event_partners`
--
ALTER TABLE `event_partners`
  MODIFY `eventpartner_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `nid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `partnerz`
--
ALTER TABLE `partnerz`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profilez`
--
ALTER TABLE `profilez`
  MODIFY `aid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rolez`
--
ALTER TABLE `rolez`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventz`
--
ALTER TABLE `eventz`
  ADD CONSTRAINT `eventz_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `partnerz` (`pid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `event_partners`
--
ALTER TABLE `event_partners`
  ADD CONSTRAINT `event_partners_ibfk_1` FOREIGN KEY (`event_Id`) REFERENCES `eventz` (`eid`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `event_partners_ibfk_2` FOREIGN KEY (`partner_Id`) REFERENCES `partnerz` (`pid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id`) REFERENCES `rolez` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
