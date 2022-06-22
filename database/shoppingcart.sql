-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 04:23 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `backlist`
--

CREATE TABLE `backlist` (
  `id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_keywords` text NOT NULL,
  `page_description` text NOT NULL,
  `page_headline` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `small_pic` varchar(100) NOT NULL,
  `big_pic` varchar(100) NOT NULL,
  `date_published` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `author`, `page_title`, `page_url`, `page_keywords`, `page_description`, `page_headline`, `page_content`, `small_pic`, `big_pic`, `date_published`) VALUES
(1, 'Vishal Kumar', 'Do you Know what Bill Gates is Thinking About Network Marketing', 'Do-you-Know-what-Bill-Gates-is-Thinking-About-Network-Marketing', 'New This Some Keywords', 'SOme Description', 'Headline', '<span xss=removed>Bill Gates never said that. The quote is supposedly made by Donald Trump and he probably ment it as a producer not as a sales rep, ABO or however they call themselves. Same with Warren Buffet where they claim he promotes MLM.</span><br xss=removed><span xss=removed>As far as I found he never promoted MLM, he just made the remark that a company his investment-company bought was one of the best buys ever.</span><br xss=removed><span xss=removed>Again it is the producing company that has the high profitability not the sales-reps</span>', '8Mt4ZJEBqbYfqJ9l_thumb.jpg', '8Mt4ZJEBqbYfqJ9l.jpg', 1505113200),
(2, 'Vishal Kumar', 'This Children\'s Day Something Going to Amazing.... See Here', 'This-Childrens-Day-Something-Going-to-Amazing-See-Here', 'Children\'s Day', 'SOme Descripotion', 'Headline', '<strong xss=\"removed\">Lorem Ipsum</strong><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><div><span xss=\"removed\"><br></span></div><div><strong xss=\"removed\">Lorem Ipsum</strong><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></div><div><span xss=\"removed\"><br></span></div><div><span xss=\"removed\"><br></span></div><div><strong xss=\"removed\">Lorem Ipsum</strong><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></div><div><span xss=\"removed\"><br></span></div>', 'Vxd1QNThu2EGYumd_thumb.jpg', 'Vxd1QNThu2EGYumd.jpg', 1504249200),
(3, 'Vishal Kumar', 'See.... What Narendra Modi is Saying..?', 'See-What-Narendra-Modi-is-Saying', 'Fabulaous', 'Fabulaous', 'Headline', '<p><span class=\"place_cont\" xss=removed>DABHOI, GUJARAT: </span><span xss=removed> Prime Minister Narendra Modi today inaugurated the Sardar Sarovar Dam, the world\'s second biggest dam, on his 67th birthday. Prime Minister Narendra Modi said that the dam will usher in a new chapter of prosperity for Gujarat. The dam, which is on the Narmada river, will be launched nearly six decades after its foundation stone was laid by Pandit Jawaharlal Nehru on April 5, 1961. Prime Minister Narendra Modi gave a speech at Dabhoi for the dam inauguration.</span></p>', 'NGhJXy5fQxaupfdO_thumb.jpg', 'NGhJXy5fQxaupfdO.jpg', 1505199600);

-- --------------------------------------------------------

--
-- Table structure for table `btm_nav`
--

CREATE TABLE `btm_nav` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btm_nav`
--

INSERT INTO `btm_nav` (`id`, `page_id`, `priority`) VALUES
(1, 4, 3),
(2, 5, 2),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('h4sj9edbek99rjnekr8bebkjt3873p7m', '::1', 1510384804, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338343830343b69735f61646d696e7c733a313a2231223b),
('u4vu1031mi6b9r03qkjdseonotu9l7cm', '::1', 1510384166, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338343136363b69735f61646d696e7c733a313a2231223b),
('bevhdrrhf20onl80bbuur5uq90dorac6', '::1', 1510385118, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338353131383b69735f61646d696e7c733a313a2231223b),
('5iqsmm7g6kdqoh9q0fa020murta4bjcj', '::1', 1510385461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338353436313b69735f61646d696e7c733a313a2231223b),
('fr2vcnjig70p2iaqsedo79jd1e329f1o', '::1', 1510387207, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338373230373b69735f61646d696e7c733a313a2231223b),
('fvjd8fel47p0nb652jm4ef504hesgc5d', '::1', 1510413562, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431333535373b69735f61646d696e7c733a313a2231223b),
('k23gefqm22o1mq03phdh3ls8nh595k1l', '::1', 1510466978, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303436363937343b),
('44dksqf93itshhnuck0vhumm13sb99da', '::1', 1510481064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303438313035393b),
('ibuc6a0ta6md3j0of4s0bk6ufasrsk6h', '::1', 1512550475, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531323535303436383b),
('g5t2o05f19sk6t526jdbo7q770n89khv', '::1', 1510413557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431333535373b69735f61646d696e7c733a313a2231223b),
('fdbg4thncp6mhtjerlpmu4pnbv75rlt4', '::1', 1510413098, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431333039383b69735f61646d696e7c733a313a2231223b),
('4illuf4l60u93n7uvbntcr8k2tti3adi', '::1', 1510412689, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431323638393b69735f61646d696e7c733a313a2231223b),
('vn7sjvkeongpf8u019a6dnnnpo687skl', '::1', 1510412271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431323237313b69735f61646d696e7c733a313a2231223b),
('9qsub9o1ngllgqannudah4ob0f4ecgu8', '::1', 1510411968, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431313936383b69735f61646d696e7c733a313a2231223b),
('u14qkl36n77jmt3mgp9ej7hnaq2huv11', '::1', 1510411653, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431313635333b69735f61646d696e7c733a313a2231223b),
('mlfqhskn5t5g3oh66j3buep8capmjftl', '::1', 1510411288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431313238383b69735f61646d696e7c733a313a2231223b),
('98b6g846v963qrqlq4b8j9i0mvtudopi', '::1', 1510410392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431303339323b69735f61646d696e7c733a313a2231223b),
('eods0gr4s65jij1up2iue80t5s8hn2tt', '::1', 1510410708, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303431303730383b69735f61646d696e7c733a313a2231223b),
('d75f9v51n3pi0dgtf04oabpunsijkvkm', '::1', 1510409935, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430393933353b69735f61646d696e7c733a313a2231223b),
('5kubj64cn8bchk4ss4e9gb5q8bhhq018', '::1', 1510409376, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430393337363b69735f61646d696e7c733a313a2231223b),
('p4htaaqk45sercohe6dmlgvhv7h78nki', '::1', 1510409530, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430393337363b69735f61646d696e7c733a313a2231223b),
('9q1na03c2dcs58tpt4khjlj9qfua2hif', '::1', 1510408928, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430383932383b69735f61646d696e7c733a313a2231223b),
('pp6sk0asq47p5fuqnt8vomr4q0vqngjq', '::1', 1510407856, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430373835363b69735f61646d696e7c733a313a2231223b),
('k3nnctdjqs6ikeodk0jftv22ul5d8q2a', '::1', 1510408434, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430383433343b69735f61646d696e7c733a313a2231223b),
('fe078t6a3lgvj42tcncdlevcfo7lslsg', '::1', 1510407529, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430373532393b69735f61646d696e7c733a313a2231223b),
('lr70kmqntnm94rhiqo1bge2rhbb9gn8d', '::1', 1510406803, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430363830333b69735f61646d696e7c733a313a2231223b),
('4vgmrmvlj5ijsbsbh21k13pphu1nvkdj', '::1', 1510407139, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430373133393b69735f61646d696e7c733a313a2231223b),
('dnkpfgcghfvtlr9641fme70tkip830eb', '::1', 1510406493, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430363439333b69735f61646d696e7c733a313a2231223b),
('ulmse0np4r01v0un4g9kdpj8cbc3o3vn', '::1', 1510405332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430353333323b69735f61646d696e7c733a313a2231223b),
('k93p1dojeidhrc7opjvi5jtpqu4qreqk', '::1', 1510405683, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430353638333b69735f61646d696e7c733a313a2231223b),
('uig2e0h7p827b45fci3cathf2obv5ojc', '::1', 1510405028, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430353032383b69735f61646d696e7c733a313a2231223b),
('sen7vauctmh3a9rbrtl147shkmra844a', '::1', 1510404107, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430343130373b69735f61646d696e7c733a313a2231223b),
('hcg5jta92dkd0hffjd0g2qm7r80c9nua', '::1', 1510403806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430333830363b69735f61646d696e7c733a313a2231223b),
('jgiov1a9ueh2j2fqfcffv7age8jfa0k3', '::1', 1510404725, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430343732353b69735f61646d696e7c733a313a2231223b),
('a7r8c12ep838ou9gi2s3je6gt3mc3s15', '::1', 1510402732, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430323733323b69735f61646d696e7c733a313a2231223b757365725f69647c733a313a2232223b),
('2p6h03ae5g9nip4n93sbojnvd3i4tv5e', '::1', 1510403034, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430333033343b69735f61646d696e7c733a313a2231223b),
('v2rm0i26qc6qpd9mls3eigjohe6chvdr', '::1', 1510402424, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430323432343b69735f61646d696e7c733a313a2231223b),
('3cjaqgq1t9hcm06uhk1q7bq41u5b4q1i', '::1', 1510402096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430323039363b),
('uka6j0ani4lmkq5uf92nhavp6ir4cn0k', '::1', 1510401773, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430313737333b),
('uv800e4mtpj6mpsh4p7e2bkveol5v724', '::1', 1510401453, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430313332333b757365725f69647c733a313a2232223b),
('ib86togkkjsnmev44aj9c1lmhfad4ujh', '::1', 1510401323, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430313332333b757365725f69647c733a313a2232223b),
('0l34u69m6i2btqrsihn084dmhp5j45km', '::1', 1510400127, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303430303132373b),
('ebp1ae30cebf6st0e3c7atmp8du9htk6', '::1', 1510399768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339393736383b),
('ojmfuds68ejoumkfd8ai9j1ongrqv2sc', '::1', 1510399424, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339393432343b),
('6c1q8sahrermcio8bv2nl2ma916scjte', '::1', 1510398732, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339383733323b),
('k9lbt6jmh0jc8pi9hf4e285dvc05uppt', '::1', 1510399057, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339393035373b),
('bpkm4qspl758gk9r10q4kvhnbe2lk6b2', '::1', 1510398405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339383430353b),
('kn028j42cqmk8ga39pgai4pveqhntg9q', '::1', 1510398005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339383030353b),
('5ep5mi42eebkre0umoa1eluqro908tn0', '::1', 1510397426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339373432363b),
('ivk2bs7leqrrduo35fam5fnkq3rke7cf', '::1', 1510397117, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339373131373b),
('n7n0s1366d6o85oiahdjhiav3ckauuib', '::1', 1510396434, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339363433343b),
('bn31d28t59uc7cvdnpcdkolq4bt2o1kr', '::1', 1510396099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339363039393b),
('ls22r97al15n9vqu89b9hr6tokuam6kk', '::1', 1510395773, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339353737333b),
('jc82j08bsskco56gpkh2iga2gcrrec2o', '::1', 1510395193, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339353139333b),
('pdb598qadpilpqpgb2ea2dat2198mqha', '::1', 1510394887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339343838373b),
('p6p6d1ev39a64i1va6avb13j8gq26m2o', '::1', 1510394558, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339343535383b),
('gppgbcfttfka497qp5mibvq36e9utijm', '::1', 1510394529, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339343432313b69735f61646d696e7c733a313a2231223b),
('adbe114c76cm45oeoj59edb3caa62j25', '::1', 1510394421, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339343432313b69735f61646d696e7c733a313a2231223b),
('d9mve9r4sqtjmgfe7cad7orgrivi09i3', '::1', 1510394106, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339343130353b69735f61646d696e7c733a313a2231223b),
('ih709muuh8ksuagk9j29c7s2eu47hd73', '::1', 1510393773, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339333737333b69735f61646d696e7c733a313a2231223b),
('utbcvksc3nlh3hmslllsje3bobcqffri', '::1', 1510391999, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339313939393b69735f61646d696e7c733a313a2231223b),
('l6dka6307kmqmtbd33fhfmg1qhmrmmdu', '::1', 1510391677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339313637373b69735f61646d696e7c733a313a2231223b),
('ov44qroceo7h632igc0p4lvgrckcpsld', '::1', 1510390888, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339303838383b69735f61646d696e7c733a313a2231223b),
('7boglh4bg3285q034grprbhbc9s689de', '::1', 1510391271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303339313237313b69735f61646d696e7c733a313a2231223b),
('137a59apfm7cub9nphad7393bmej5pvr', '::1', 1510389613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338393631333b69735f61646d696e7c733a313a2231223b),
('l2ivjkd01eto76rgh3g7g78elm0mqg2q', '::1', 1510389309, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338393330393b69735f61646d696e7c733a313a2231223b),
('2577kbcak8o6868ta6vug10foe5c8uvk', '::1', 1510388608, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338383630383b69735f61646d696e7c733a313a2231223b),
('5i1e0e3u5uorhemf19ovbeq617tcqg2u', '::1', 1510387985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338373938353b69735f61646d696e7c733a313a2231223b),
('qr0491bcdsd106tmd71ojtajrhc8j9nc', '::1', 1510388290, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531303338383239303b69735f61646d696e7c733a313a2231223b),
('n4mc28c7s4l1k6n3b5f5a1phq5st2elu', '::1', 1600599641, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630303539393634313b),
('cnhtkmbfigut7ivddv1i3nhgkkes9ep4', '::1', 1600599671, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630303539393634313b),
('6rcr306kg2vt47omecd05nmc0pl431dd', '::1', 1601711286, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313731313136343b69735f61646d696e7c733a313a2231223b),
('nql41pqe6ckvu81ui86k4djpb9aq4v3a', '::1', 1601711389, 0x5f5f63695f6c6173745f726567656e65726174657c693a313630313731313239313b69735f61646d696e7c733a313a2231223b);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_type` varchar(1) NOT NULL,
  `update_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_type`, `update_id`, `date_created`, `comment`) VALUES
(1, 'e', 576, 1509519975, 'Here is the comments about this'),
(2, 'e', 576, 1509520022, 'Here is the second Try'),
(3, 'e', 576, 1510291504, 'Hello Halal Luiya');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `sent_by` int(11) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `opened` int(11) NOT NULL,
  `code` varchar(8) NOT NULL,
  `urgent` tinyint(1) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `date_created`, `sent_by`, `sent_to`, `subject`, `message`, `opened`, `code`, `urgent`, `ranking`) VALUES
(1, 1507861794, 0, 1, 'New Accounts', 'I am a New Customer', 1, 'EhFCeR3j', 0, 0),
(2, 1507861794, 1, 1, 'Hello', 'THis is New', 0, 'v1fu3tzE', 0, 0),
(3, 1507862584, 0, 1, 'Enquiry For The Product', 'Hii I am New Customer', 1, '0rTJVDyd', 0, 0),
(4, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'Uho5y6KN', 0, 0),
(5, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'XjtiHCU6', 0, 0),
(6, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'UgT88XLU', 0, 0),
(7, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'vUolAP5W', 0, 0),
(8, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'uYJFO1DZ', 0, 0),
(9, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'DdERyg7L', 0, 0),
(10, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'GoUFAjk2', 0, 0),
(11, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'mffQDU0y', 0, 0),
(12, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'sxq8rOS3', 0, 0),
(13, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'HZchNMIi', 0, 0),
(14, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'Poi3pxh2', 0, 0),
(15, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'Csuc2Rh1', 0, 0),
(16, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'NYvssuvZ', 0, 0),
(17, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, '7E7AoaHI', 0, 0),
(18, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'mg4kBEAV', 0, 0),
(19, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'ey6rQHWn', 0, 0),
(20, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'vhYFQ2vO', 0, 0),
(21, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'WbqLnr20', 0, 0),
(22, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'g0dtbDhG', 0, 0),
(23, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'ew5y0oYB', 0, 0),
(24, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'BsNLBsTv', 0, 0),
(25, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, '7A6PJzLa', 0, 0),
(26, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'xDJv7ulj', 0, 0),
(27, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'BmryyYoH', 0, 0),
(28, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, '4w0IKKD5', 0, 0),
(29, 1508084358, 0, 4, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'FR9KsARc', 0, 0),
(30, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'b8CpreMO', 0, 0),
(31, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'l5bqsqaF', 0, 0),
(32, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'UsAyfVLw', 0, 0),
(33, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'B1zyztk7', 0, 0),
(34, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'dvTa9QBc', 0, 0),
(35, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'sGiaKKkw', 0, 0),
(36, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, '7hxg8YhQ', 0, 0),
(37, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'U3ne2fbU', 0, 0),
(38, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'CLxPdjNs', 0, 0),
(39, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'X9MMqXRf', 0, 0),
(40, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'HXSQoT92', 0, 0),
(41, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'BXxMTSoz', 0, 0),
(42, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'oSylFGmA', 0, 0),
(43, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'PuEgs1MQ', 0, 0),
(44, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'FwAj2Gp6', 0, 0),
(45, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'EJ6d7oZ6', 0, 0),
(46, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'xSWKuUiA', 0, 0),
(47, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, '4HTDSZ3k', 0, 0),
(48, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, '0XFD2m23', 0, 0),
(49, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, '5o1wJMYw', 0, 0),
(50, 1508084358, 0, 1, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, '4LI0G1Ct', 0, 0),
(51, 1508084358, 0, 5, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'HNvSFOIG', 0, 0),
(52, 1508084358, 0, 5, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'Ig7RqU2S', 0, 0),
(53, 1508084358, 0, 5, 'It\'s Just a Trail', 'Tell me some cool features of this Fender Guitar', 0, 'TVjHI3jO', 0, 0),
(54, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'YvRag0ie', 0, 0),
(55, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'GLuZQvKU', 0, 0),
(56, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'OsWWbkpz', 0, 0),
(57, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, '4kZK4b2Y', 0, 0),
(58, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'f8nbdRmR', 0, 0),
(59, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, '3BQZn5a0', 0, 0),
(60, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'hw9TkCa8', 0, 0),
(61, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'DB2GNc80', 0, 0),
(62, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'TDg5xBOn', 0, 0),
(63, 1508084459, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'OkAQixWY', 0, 0),
(64, 1508084486, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, '7sJJQNiz', 0, 0),
(65, 1508084486, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'zLtuT6BV', 0, 0),
(66, 1508084486, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'V0xRecCK', 0, 0),
(67, 1508084486, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'VVHAAR6P', 0, 0),
(68, 1508084486, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'kgGrIPNT', 0, 0),
(69, 1508084486, 0, 5, 'Is this Value for Money', 'Thining About Buying', 0, 'SNganRsI', 0, 0),
(70, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 1, 'kfbvjGO0', 0, 0),
(71, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'qobcg4Dy', 0, 0),
(72, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'UX11ZLF5', 0, 0),
(73, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'yHrIevFn', 0, 0),
(74, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, '6nc1K2n8', 0, 0),
(75, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'iJ3Hi9y9', 0, 0),
(76, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'SwJuCyVa', 0, 0),
(77, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'CtZ9s0gU', 0, 0),
(78, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'fnBqzhj9', 0, 0),
(79, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'xWh4I6PD', 0, 0),
(80, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'dXOPDey6', 0, 0),
(81, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, '38Vr4pfk', 0, 0),
(82, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'MfmHMoD2', 0, 0),
(83, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, '92TivVuZ', 0, 0),
(84, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'Vgg21LyV', 0, 0),
(85, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'RFdD2FAB', 0, 0),
(86, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'GZvQlnkM', 0, 0),
(87, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, '90SqGDwc', 0, 0),
(88, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, '1s67MbWC', 0, 0),
(89, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, '24TGoOjM', 0, 0),
(90, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'XC1Rieoq', 0, 0),
(91, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'wQfpdcWj', 0, 0),
(92, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'uvi4UuGb', 0, 0),
(93, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'BlWB8PpO', 0, 0),
(94, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'B7VLCXPV', 0, 0),
(95, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'gzZh8EIh', 0, 0),
(96, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'krSUqEOD', 0, 0),
(97, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'wvmpeISJ', 0, 0),
(98, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'DubxjzEj', 0, 0),
(99, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'oa61qZS8', 0, 0),
(100, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'xgQCjHjX', 0, 0),
(101, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'Qxa5ItIv', 0, 0),
(102, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, '2KPbo3Qz', 0, 0),
(103, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'SDAD5bpR', 0, 0),
(104, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, '7WaczCc9', 0, 0),
(105, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'wrlEz7Wb', 0, 0),
(106, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'ORQHQppH', 0, 0),
(107, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'KYr78gks', 0, 0),
(108, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, '5vSFcqsd', 0, 0),
(109, 1508084486, 0, 3, 'Is this Value for Money', 'Thining About Buying', 0, 'zdT4NDxI', 0, 0),
(110, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 1, 'XRf6FElH', 0, 0),
(111, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 1, 'ZbGuydBW', 0, 0),
(112, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 1, 'qWX0d55a', 0, 0),
(113, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '0SOnp1v8', 0, 0),
(114, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'uK0nRKEA', 0, 0),
(115, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ChiJl2gh', 0, 0),
(116, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '8fpdBD5Y', 0, 0),
(117, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Op7ynhRp', 0, 0),
(118, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ou9wrJll', 0, 0),
(119, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'CfhQvKiv', 0, 0),
(120, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'erfim3sF', 0, 0),
(121, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '0ONCJqAz', 0, 0),
(122, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'F7FxnBpY', 0, 0),
(123, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Z5EQ3kIC', 0, 0),
(124, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Hvsgvmdf', 0, 0),
(125, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'y5QxtrGC', 0, 0),
(126, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'jCzrHkRt', 0, 0),
(127, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'JOnIYMuA', 0, 0),
(128, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xr250wlG', 0, 0),
(129, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ufglzk9w', 0, 0),
(130, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'lZQdpWFR', 0, 0),
(131, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Qpurg6Er', 0, 0),
(132, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'KfZNTzQ0', 0, 0),
(133, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Nh4135Zj', 0, 0),
(134, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'KetRtqR7', 0, 0),
(135, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'lSY4Vjba', 0, 0),
(136, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'lWjo9uIc', 0, 0),
(137, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'tbfzUJdY', 0, 0),
(138, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'wmvnVMqf', 0, 0),
(139, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ddQyYn6L', 0, 0),
(140, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'iv1QNhYg', 0, 0),
(141, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xXN08fOw', 0, 0),
(142, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'FmTMK0mg', 0, 0),
(143, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sq5Voknf', 0, 0),
(144, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'DW6bNXBd', 0, 0),
(145, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'YCIjJDMV', 0, 0),
(146, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ceF3W7G8', 0, 0),
(147, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4wHaba2A', 0, 0),
(148, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'mfyobvB2', 0, 0),
(149, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'M91uIU8d', 0, 0),
(150, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '6YOcw6nT', 0, 0),
(151, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4uGhlR4O', 0, 0),
(152, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rrotWVZJ', 0, 0),
(153, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'XyGx42Rn', 0, 0),
(154, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'nBkdtXrw', 0, 0),
(155, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rk2gTrtV', 0, 0),
(156, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'UuBr5dJi', 0, 0),
(157, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'wPJtN3Xq', 0, 0),
(158, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '16d7NHS2', 0, 0),
(159, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'b3M8OTgT', 0, 0),
(160, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'KqbgBoRK', 0, 0),
(161, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sZahUWqk', 0, 0),
(162, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '3tuTujHq', 0, 0),
(163, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'jETS6dqK', 0, 0),
(164, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Xf8Ztrm3', 0, 0),
(165, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'L1XXoIg7', 0, 0),
(166, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sJ8xzNSF', 0, 0),
(167, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'N7nuLqXt', 0, 0),
(168, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'yVtzKmfg', 0, 0),
(169, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rV8vfluM', 0, 0),
(170, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'eQ9309sO', 0, 0),
(171, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'FsfZOvR4', 0, 0),
(172, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'vua1n9vk', 0, 0),
(173, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'vHGWtR5k', 0, 0),
(174, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'nQxsPnoO', 0, 0),
(175, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'VFtles9x', 0, 0),
(176, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'QVfmoP7g', 0, 0),
(177, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'VmCe4f3J', 0, 0),
(178, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'UJjJ2uHH', 0, 0),
(179, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xL5A1hOT', 0, 0),
(180, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'zfIzMn85', 0, 0),
(181, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'JTUp3wp1', 0, 0),
(182, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'OtsSBtos', 0, 0),
(183, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xJ5IbYQ7', 0, 0),
(184, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'EqxExNvM', 0, 0),
(185, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ViAtpF8b', 0, 0),
(186, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '56YUyks5', 0, 0),
(187, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'UzrHJyfd', 0, 0),
(188, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '7uKCF5gm', 0, 0),
(189, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'tzDo8Fee', 0, 0),
(190, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'KBRNS4UA', 0, 0),
(191, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'EibzE02c', 0, 0),
(192, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'XqksbgoN', 0, 0),
(193, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'pJ4cfzH8', 0, 0),
(194, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'LY8zzFIY', 0, 0),
(195, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'LTijWlc3', 0, 0),
(196, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'aeha4jT7', 0, 0),
(197, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ILRSIkxV', 0, 0),
(198, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'adMdE9Ue', 0, 0),
(199, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'gmMVBxJM', 0, 0),
(200, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'LVCKkeLj', 0, 0),
(201, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'pF2rzYLA', 0, 0),
(202, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'WlNK6wtm', 0, 0),
(203, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '8HDpECDn', 0, 0),
(204, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'IukcX11n', 0, 0),
(205, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'srAROum8', 0, 0),
(206, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '6lb8VKpm', 0, 0),
(207, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'nUSM3zVQ', 0, 0),
(208, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '3VpxYHEk', 0, 0),
(209, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'T6vapSkx', 0, 0),
(210, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'CdXp7RJf', 0, 0),
(211, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '00u1RoAc', 0, 0),
(212, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'MeRKmeE9', 0, 0),
(213, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'HDOlo8GP', 0, 0),
(214, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'wY6yHQq0', 0, 0),
(215, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ZYt816Cq', 0, 0),
(216, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'RqGP7F2Q', 0, 0),
(217, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'S2uoKhpZ', 0, 0),
(218, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'NACADHuD', 0, 0),
(219, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'mOQ8yF1w', 0, 0),
(220, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ktTNgXMp', 0, 0),
(221, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rjxktiv2', 0, 0),
(222, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 's5vtXqV9', 0, 0),
(223, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '6xzZt7Ov', 0, 0),
(224, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'aptDL7UQ', 0, 0),
(225, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ntX8zbYW', 0, 0),
(226, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'tsMfF2Kw', 0, 0),
(227, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'e8GJLsYm', 0, 0),
(228, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'neqlEapa', 0, 0),
(229, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'GvLO3WOJ', 0, 0),
(230, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'SIqTJwVM', 0, 0),
(231, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'JBbmrEv5', 0, 0),
(232, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'YULVU5im', 0, 0),
(233, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'mpWmUA2o', 0, 0),
(234, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'EPrqbSuU', 0, 0),
(235, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'BW2QtJpG', 0, 0),
(236, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'WttoyTxr', 0, 0),
(237, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'qbuN86DV', 0, 0),
(238, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'OPQO07rV', 0, 0),
(239, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Q9hdTGH9', 0, 0),
(240, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'hUyIyyan', 0, 0),
(241, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'RQp6KuBl', 0, 0),
(242, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'kIB5cdKO', 0, 0),
(243, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sfTsGvmv', 0, 0),
(244, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Ze0VW6bc', 0, 0),
(245, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'FnIhJKXD', 0, 0),
(246, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'esKeMcry', 0, 0),
(247, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sdSzRdoJ', 0, 0),
(248, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4pQ1HwyT', 0, 0),
(249, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'QMok5TGN', 0, 0),
(250, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'v5ggJ4vc', 0, 0),
(251, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'P4eyoNNP', 0, 0),
(252, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xt2YQPjs', 0, 0),
(253, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'p3rgOUMP', 0, 0),
(254, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'aAa93NWH', 0, 0),
(255, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'zMYqjfAO', 0, 0),
(256, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'npCOmZrU', 0, 0),
(257, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'kdR4UNfK', 0, 0),
(258, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'bXqVKpL5', 0, 0),
(259, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Gn5aBzKE', 0, 0),
(260, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'AdAwe2We', 0, 0),
(261, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'DfFKoz5x', 0, 0),
(262, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Ac4APTXl', 0, 0),
(263, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'bQzMhMhn', 0, 0),
(264, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'bUU6vXOq', 0, 0),
(265, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'k9Pifcjc', 0, 0),
(266, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'mk56gfwt', 0, 0),
(267, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '3brhjQbZ', 0, 0),
(268, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '9tCz8L4u', 0, 0),
(269, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'nVnJtIUJ', 0, 0),
(270, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'wkuv5ust', 0, 0),
(271, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ipFDJNts', 0, 0),
(272, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'uUHT9qHr', 0, 0),
(273, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'OAj156S9', 0, 0),
(274, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '2cfLiAMm', 0, 0),
(275, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'VuhSwD8O', 0, 0),
(276, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'cd96xYHf', 0, 0),
(277, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'C7Bc3ner', 0, 0),
(278, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'WXoVRzt7', 0, 0),
(279, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Ush0Hka2', 0, 0),
(280, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'hpZcio4W', 0, 0),
(281, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'OwhgpvWB', 0, 0),
(282, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'dzUWOqxK', 0, 0),
(283, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'hjDZeUz8', 0, 0),
(284, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Ksc9qGPw', 0, 0),
(285, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'mNkb9w2D', 0, 0),
(286, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'S4OQ8aYf', 0, 0),
(287, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '21nR9mm7', 0, 0),
(288, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'AoMZWRXX', 0, 0),
(289, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'iXLZfpwy', 0, 0),
(290, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Tr5CPMMD', 0, 0),
(291, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '9CuBrGwX', 0, 0),
(292, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'NdJHPUsh', 0, 0),
(293, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'BZyFJbml', 0, 0),
(294, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'iHIgUgYT', 0, 0),
(295, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'E5Yd6T3G', 0, 0),
(296, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'oT3h5Plt', 0, 0),
(297, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'hTJeAOA0', 0, 0),
(298, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4PKMmCx1', 0, 0),
(299, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'wqPH9YXi', 0, 0),
(300, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'msLKICAx', 0, 0),
(301, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'lFhEOkbx', 0, 0),
(302, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'eO8bbQu2', 0, 0),
(303, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'LE44zVfL', 0, 0),
(304, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'HTQ5Jidu', 0, 0),
(305, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'MkcXqJ9X', 0, 0),
(306, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'KHUsnXNU', 0, 0),
(307, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'nJGjmKU7', 0, 0),
(308, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'pdii7Qdj', 0, 0),
(309, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ARv8oZvf', 0, 0),
(310, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Er3BXWuF', 0, 0),
(311, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'nHFqwrWl', 0, 0),
(312, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'uo8nSgB0', 0, 0),
(313, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'LgbbK8dp', 0, 0),
(314, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'V4zCTNyi', 0, 0),
(315, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Ky2q41lr', 0, 0),
(316, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Xslk1ymz', 0, 0),
(317, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'kye7t8jr', 0, 0),
(318, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'AzswdxZO', 0, 0),
(319, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ugMhZt8p', 0, 0),
(320, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'NoVawJt1', 0, 0),
(321, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'fHEVA2Nm', 0, 0),
(322, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'BWJiV8Ob', 0, 0),
(323, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'CRS1hOig', 0, 0),
(324, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '0cSSpMZk', 0, 0),
(325, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'zJsB4ND9', 0, 0),
(326, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '0bnWZC0r', 0, 0),
(327, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '6knEW0PZ', 0, 0),
(328, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'BTdsFHRw', 0, 0),
(329, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'fDD9VrRO', 0, 0),
(330, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'MjosrZzA', 0, 0),
(331, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'YFe8Z5JA', 0, 0),
(332, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'zsUVju7B', 0, 0),
(333, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'iqbA9Xsl', 0, 0),
(334, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'WjMRgdvA', 0, 0),
(335, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'dTtvp214', 0, 0),
(336, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'UTZgjaKx', 0, 0),
(337, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'J46TKlqL', 0, 0),
(338, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sby8skPt', 0, 0),
(339, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'QY5KcRGq', 0, 0),
(340, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'CcstHIKm', 0, 0),
(341, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xBp4JBM3', 0, 0),
(342, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'mWHh2jve', 0, 0),
(343, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'QW4RmzIE', 0, 0),
(344, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Iohys873', 0, 0),
(345, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'J0575Kud', 0, 0),
(346, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'EydiZaAR', 0, 0),
(347, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'dNrQU97K', 0, 0),
(348, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'aruwBqSC', 0, 0),
(349, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'hi83OLAf', 0, 0),
(350, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'i36cjT1m', 0, 0),
(351, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'XvaIPBUI', 0, 0),
(352, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '0o4l7B04', 0, 0),
(353, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'dryQVE4a', 0, 0),
(354, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'kqnY0vPK', 0, 0),
(355, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '46hs7V4z', 0, 0),
(356, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ec13ZDvo', 0, 0),
(357, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'wtmxppUX', 0, 0),
(358, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'IG1C5Z10', 0, 0),
(359, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'zzL4M7Bi', 0, 0),
(360, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'OSmEgyoA', 0, 0),
(361, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'cnw5g38C', 0, 0),
(362, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'vO28wlA8', 0, 0),
(363, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rUDzPcvT', 0, 0),
(364, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Mr46TmDE', 0, 0),
(365, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ga5vuzJ9', 0, 0),
(366, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ENqxlAx8', 0, 0),
(367, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'G8SVf9Nn', 0, 0),
(368, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '7S9rU1gB', 0, 0),
(369, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'HO0O5XHz', 0, 0),
(370, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'bGcOyHQ1', 0, 0),
(371, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'idua2YsJ', 0, 0),
(372, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'PcBEizgp', 0, 0),
(373, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'vliZ4d3Q', 0, 0),
(374, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4qlX7GxM', 0, 0),
(375, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ibthcGuX', 0, 0),
(376, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'VnqJ3ZE7', 0, 0),
(377, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'GKY3qmL1', 0, 0),
(378, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'm3RY4xBp', 0, 0),
(379, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'F2PhKgT3', 0, 0),
(380, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'nrDHbioG', 0, 0),
(381, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'f21Y9nR3', 0, 0),
(382, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '0yKSog2V', 0, 0),
(383, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'pKz9EIG1', 0, 0),
(384, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'dndwHsw7', 0, 0),
(385, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'bbsMgglY', 0, 0),
(386, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '2V1E5SRi', 0, 0),
(387, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xlGTX2QS', 0, 0),
(388, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rbaeAv2r', 0, 0),
(389, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'udfsJ2bK', 0, 0),
(390, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'qaFiam3y', 0, 0),
(391, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '1OavCfnB', 0, 0),
(392, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '1SvPQqUD', 0, 0),
(393, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'a7q0AFpq', 0, 0),
(394, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'diGOCICG', 0, 0),
(395, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'T92ZFjhc', 0, 0),
(396, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ZrdhteaI', 0, 0),
(397, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'eUYrPb0X', 0, 0),
(398, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'mi5drXyH', 0, 0),
(399, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '9ngm4gzG', 0, 0),
(400, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'kSiCuTNE', 0, 0),
(401, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'EyUKqzYn', 0, 0),
(402, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'TaQuD3Sz', 0, 0),
(403, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'LsSBS6e1', 0, 0),
(404, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '2bKPSrNt', 0, 0),
(405, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 't5cVpQkE', 0, 0),
(406, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'NVZDd2yk', 0, 0),
(407, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'LqRI2Ngf', 0, 0),
(408, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '8nAUDRaa', 0, 0),
(409, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'EuSYLY2O', 0, 0),
(410, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4xvF9UCY', 0, 0),
(411, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '8heIznFm', 0, 0),
(412, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'AqMSL9VJ', 0, 0),
(413, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'cMVUuZ8R', 0, 0),
(414, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'I2pytD4t', 0, 0),
(415, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'SZYzuPsk', 0, 0),
(416, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'qnmIhk3b', 0, 0),
(417, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '8VlIASCL', 0, 0),
(418, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'KpFkbfSR', 0, 0),
(419, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ZA5jM9Cb', 0, 0),
(420, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Ebkqanyv', 0, 0),
(421, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rX9o4Esy', 0, 0),
(422, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '9FjYfJ47', 0, 0),
(423, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'u3zVsm9U', 0, 0),
(424, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'eRE0qiqH', 0, 0),
(425, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '8RkWViGd', 0, 0),
(426, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'VNkvH5Df', 0, 0),
(427, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'moqqur3v', 0, 0),
(428, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'cqms45GL', 0, 0),
(429, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'bESn9NhL', 0, 0),
(430, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4NJTwjzf', 0, 0),
(431, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'BCFNUolZ', 0, 0),
(432, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xRrN4LjH', 0, 0),
(433, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'CiNGLcfa', 0, 0),
(434, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'BFuaIqT8', 0, 0),
(435, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'eHh2Hd0k', 0, 0),
(436, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'fbT0sjjw', 0, 0),
(437, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'qP6RKsAs', 0, 0),
(438, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'vpDjipAT', 0, 0),
(439, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'dFg9SV2y', 0, 0),
(440, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'lmJ5dJHd', 0, 0),
(441, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'BeMU6BjC', 0, 0),
(442, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'M2alfgEw', 0, 0),
(443, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'AwD8purF', 0, 0),
(444, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'OqW3m1rN', 0, 0),
(445, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'awPQPCpF', 0, 0),
(446, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'qx3ez051', 0, 0),
(447, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'kem0kWeD', 0, 0),
(448, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'EmwTRcze', 0, 0),
(449, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '6FfDVvSz', 0, 0),
(450, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sUk0gBUp', 0, 0),
(451, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sPtKChou', 0, 0),
(452, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'RatBKf4y', 0, 0),
(453, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'pH3jpgJm', 0, 0),
(454, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'R9XEl56F', 0, 0),
(455, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'XiYmitVd', 0, 0),
(456, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rRNb1aXK', 0, 0),
(457, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '5BeSgUX1', 0, 0),
(458, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'DhZbMsFN', 0, 0),
(459, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'PDPRkyPO', 0, 0),
(460, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'pqvEEXdO', 0, 0),
(461, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '9oMiuqyz', 0, 0),
(462, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'MhnzBGBO', 0, 0),
(463, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4R4dKv7h', 0, 0),
(464, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'KRAYFDQL', 0, 0),
(465, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'A2HB6OwY', 0, 0),
(466, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'j99QONUG', 0, 0),
(467, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'GWGsxkMD', 0, 0),
(468, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sa2b3bQA', 0, 0),
(469, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 1, 'oz0M44Rg', 0, 0),
(470, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'dUiZnMBr', 0, 0),
(471, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'GUFzI2OR', 0, 0),
(472, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ymShOBdh', 0, 0),
(473, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'zYFQqdAq', 0, 0),
(474, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'uwO1kDF4', 0, 0),
(475, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '3L1zfCdX', 0, 0),
(476, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '1q5eWTYQ', 0, 0),
(477, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '8gJLaeGt', 0, 0),
(478, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '81HUEn7A', 0, 0),
(479, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'NtLra40W', 0, 0),
(480, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'RmF4s46i', 0, 0),
(481, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '3p9zg79n', 0, 0),
(482, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'aoYGlYVX', 0, 0),
(483, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'V4SbsoaN', 0, 0),
(484, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4aCMl6BB', 0, 0),
(485, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'mrWfKS0a', 0, 0),
(486, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'zEClqs7d', 0, 0),
(487, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'pxmN7AHw', 0, 0),
(488, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'EQXmB2tN', 0, 0),
(489, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '3l7NBweP', 0, 0),
(490, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'lMDRSOGm', 0, 0),
(491, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'hSehaFB7', 0, 0),
(492, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'CpEPePJS', 0, 0),
(493, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '68FeP2Pn', 0, 0),
(494, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'uM1gH3Cm', 0, 0),
(495, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'w6sEACTA', 0, 0),
(496, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'XQJ9fumO', 0, 0),
(497, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xMBxrqNM', 0, 0),
(498, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '1ENwTaWf', 0, 0),
(499, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '9b4TnsxW', 0, 0),
(500, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'FacmD2mD', 0, 0),
(501, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ljTIpH84', 0, 0),
(502, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'VoWGt9D0', 0, 0),
(503, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '8940x9Aa', 0, 0),
(504, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Ll1sosKk', 0, 0),
(505, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'xIzLLPRe', 0, 0),
(506, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'c1sHp0HD', 0, 0),
(507, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'v0qZ5JZg', 0, 0),
(508, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'epepwLuT', 0, 0),
(509, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '50CHuQXh', 0, 0),
(510, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'QwlBJJ88', 0, 0),
(511, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'gIaR0bMf', 0, 0),
(512, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4lOf2VCl', 0, 0),
(513, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '193vBJqb', 0, 0),
(514, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'STCnrlXw', 0, 0);
INSERT INTO `enquiries` (`id`, `date_created`, `sent_by`, `sent_to`, `subject`, `message`, `opened`, `code`, `urgent`, `ranking`) VALUES
(515, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'njhBivV6', 0, 0),
(516, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'h9LXVY7F', 0, 0),
(517, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'kbQb5vhY', 0, 0),
(518, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'h8g1vP8M', 0, 0),
(519, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'SMLdXItP', 0, 0),
(520, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'RQ6xbT0R', 0, 0),
(521, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '051JW8vD', 0, 0),
(522, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '3ghxXbHU', 0, 0),
(523, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'K7CI0Mnq', 0, 0),
(524, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'PpO0PHfV', 0, 0),
(525, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4SzaaE6a', 0, 0),
(526, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'cgFWMqEU', 0, 0),
(527, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ZlR5qKFT', 0, 0),
(528, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'aQTlPmSS', 0, 0),
(529, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'vwusL24A', 0, 0),
(530, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'J8rdYwXN', 0, 0),
(531, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Bqtjdzjf', 0, 0),
(532, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'S9lydUTG', 0, 0),
(533, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'j3NEKjpS', 0, 0),
(534, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'DTAmyvEy', 0, 0),
(535, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Bosrngmt', 0, 0),
(536, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'YlaDYkgo', 0, 0),
(537, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ustH6r82', 0, 0),
(538, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Uv6nvnIb', 0, 0),
(539, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'YfPqVQLz', 0, 0),
(540, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rpnA7D1X', 0, 0),
(541, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '3KwCPse4', 0, 0),
(542, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'y00hP6aH', 0, 0),
(543, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'IXyiQiyy', 0, 0),
(544, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'hlXqCN9o', 0, 0),
(545, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ZTWqWmHZ', 0, 0),
(546, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'Ang3wIY4', 0, 0),
(547, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'QyF28CHo', 0, 0),
(548, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'u9U8vQEI', 0, 0),
(549, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'iVK6q7yM', 0, 0),
(550, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ZDUHBcak', 0, 0),
(551, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'k1aENPf7', 0, 0),
(552, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '5QfIMLwU', 0, 0),
(553, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'YPVFgLMr', 0, 0),
(554, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'LLVd2yJs', 0, 0),
(555, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'cm18QU9J', 0, 0),
(556, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '2oXbpyMY', 0, 0),
(557, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '2Ct5vgnY', 0, 0),
(558, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'ULkCRMFt', 0, 0),
(559, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sAgvgRrc', 0, 0),
(560, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'nP2wqepV', 0, 0),
(561, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'sgoo6Flo', 0, 0),
(562, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, 'rD5T4TZl', 0, 0),
(563, 1508084486, 0, 1, 'Is this Value for Money', 'Thining About Buying', 0, '4FSK3G5y', 0, 0),
(564, 1508589743, 2, 0, 'Enquiry For The Product', 'Heloo \r\n\r\n\r\nThank You..............', 1, 'U1mldWd8', 0, 0),
(565, 1508590202, 2, 0, 'First Urgent Message Send Try', 'This is First Try of Urgent Messages Sending Check', 1, 'u8I9m3LC', 1, 0),
(566, 1508670570, 2, 0, 'Check Firstr', 'Here is the way that is not going to fail', 1, 'WkGvsRNA', 0, 0),
(567, 1508671412, 2, 0, 'Check Second', 'Hello This is Second Check\r\n', 1, '9uJOMpKg', 1, 0),
(568, 1508671828, 0, 1, 'Thank Yoy We Will get Get Back To you', 'See Hey This is Our Support Team We Will Help You You Through Out of hte Condition.<div><br></div><div><br></div><div><br></div><div>Thank you</div>', 0, '', 0, 0),
(569, 1508672104, 0, 1, 'Heloo THis is VIshal I am Wondring ABout THis Fender Quitar Whay this is So COstlyThan You', 'sdasdasd', 1, 'c8U978Sd', 0, 0),
(570, 1508675121, 0, 1, 'Enquiry For The Product', 'Thank You for your message we will see you soon with a proper replay,<br><br>\r\n        ---------------------------------------------------<br>\r\n        The orginal message is shown bellow.<br><br>Heloo \r\n\r\n\r\nThank You..............', 1, '4uMD9dMP', 0, 0),
(571, 1508675179, 2, 0, 'Enquiry For The Product', 'Hello', 1, 'IWs3cESL', 0, 0),
(572, 1508675344, 0, 1, 'Enquiry For The Product', 'We Will Come Back QUickly As Possible as Simple<br><br>\r\n        ---------------------------------------------------<br>\r\n        The orginal message is shown bellow.<br><br>Hello', 1, 'NHz5VGGl', 0, 0),
(573, 1508682915, 0, 1, 'Enquiry For The Product', '<br><br>---------------------------------------------------<br>The orginal message is shown bellow.<br><br>Hello', 1, 'bTpa5OPx', 0, 0),
(574, 1508682961, 2, 0, 'Enquiry For The Product', 'We Will Come Back QUickly As Possible as Simple\r\n\r\n\r\n        ---------------------------------------------------\r\n\r\n        The orginal message is shown bellow.\r\n\r\nHello', 1, 'ne2DSG64', 0, 0),
(575, 1508903519, 0, 0, 'Contact Form', 'Vishal Kumar submitted the following infromation:<br><br> Name :Vishal Kumar<br> Email :vishalkumar8507@gmail.com<br> Telephone Number :9162317839<br> Message :asdasda<br>', 1, 'RKKl8pv3', 0, 3),
(576, 1509263790, 0, 0, 'Contact Form', 'Vishal Kumar submitted the following infromation:<br><br> Name :Vishal Kumar<br> Email :vishalkumar8507@gmail.com<br> Telephone Number :09162317839<br> Message :Hello THis is the Test <br>', 1, '0RUJdne8', 0, 5),
(577, 1510172269, 0, 2, 'Order Status Updated', 'Order 3 has just been updated. The new status for your order is Goods Dispatched.', 0, '', 0, 0),
(578, 1510172329, 0, 2, 'Order Status Updated', 'Order 3 has just been updated. The new status for your order is Goods Dispatched.', 1, 'PyYZoZOc', 0, 0),
(579, 1510172353, 0, 2, 'Order Status Updated', 'Order DD3GSP has just been updated. The new status for your order is Goods Dispatched.', 1, 'VO9onBIV', 0, 0),
(580, 1510172430, 0, 2, 'Order Status Updated', 'Order DD3GSP has just been updated. The new status for your order is Goods Dispatched.', 1, 'fsKDuYWR', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `homepage_blocks`
--

CREATE TABLE `homepage_blocks` (
  `id` int(11) NOT NULL,
  `block_title` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_blocks`
--

INSERT INTO `homepage_blocks` (`id`, `block_title`, `priority`) VALUES
(1, 'Summer Sale Offers', 1),
(2, 'This Diwali Sale', 2),
(5, 'Hot Fender Sale', 3);

-- --------------------------------------------------------

--
-- Table structure for table `homepage_offers`
--

CREATE TABLE `homepage_offers` (
  `id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_offers`
--

INSERT INTO `homepage_offers` (`id`, `block_id`, `item_id`) VALUES
(29, 5, 12),
(7, 6, 19),
(8, 6, 19),
(9, 6, 17),
(10, 17, 18),
(27, 5, 10),
(26, 5, 5),
(25, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `item_galleries`
--

CREATE TABLE `item_galleries` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `target_url` varchar(255) NOT NULL,
  `alt_text` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_galleries`
--

INSERT INTO `item_galleries` (`id`, `parent_id`, `target_url`, `alt_text`, `picture`) VALUES
(2, 20, '', '', 'fender_jimi_hendrix_strat_black_6-800x800.jpg'),
(3, 20, '', '', 'fender-jimi-hendrix-stratocaster-guitar-black-maple-b47.jpg'),
(4, 20, '', '', 'preview.jpg'),
(5, 20, '', '', 'Jimi-Hendrix-Strat-neck-plate.png'),
(6, 20, '', '', '7e8264e78e464367fe37a2e31984418b--american-standard-stratocaster-fender-american-standard.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `posted_information` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`id`, `date_created`, `posted_information`) VALUES
(1, 14732114, 'a:43:{s:10:\"mc_gross_1\";s:4:\"0.02\";s:14:\"num_cart_items\";s:1:\"1\";s:8:\"payer_id\";s:12:\"XFDJRTDFDHLJ\";s:20:\"address_country_code\";s:2:\"IN\";s:12:\"ipn_track_id\";s:10:\"z4hlraaxh2\";s:11:\"address_zip\";s:6:\"LW18QT\";s:7:\"charset\";s:12:\"windows-1252\";s:13:\"payment_gross\";s:0:\"\";s:14:\"address_status\";s:9:\"confirmed\";s:14:\"address_street\";s:14:\"Evergreen Road\";s:11:\"verify_sign\";s:39:\"FHEJhfdfdYRCdfsrGRHdfdkKJDFDJKLsiy5aSyk\";s:11:\"mc_shipping\";s:4:\"0.01\";s:8:\"txn_type\";s:4:\"cart\";s:11:\"receiver_id\";s:14:\"LRKJKLje68KLJF\";s:11:\"payment_fee\";s:0:\"\";s:12:\"item_number1\";s:0:\"\";s:11:\"mc_currency\";s:3:\"GBP\";s:19:\"transaction_subject\";s:0:\"\";s:6:\"custom\";s:216:\"4b310e4e5c80b33046266d78cfbe3ed1127170bb407e524f5d72a870f9ed5257fb859e80270028e9eb24ac3287c6b998e928df6cd0aa46baa6ffddbbb33b72e488yYcUnSRJfocSEYwimHZfFQBv7XgjneLfNWSWez0mSBPJ0OTvm5IwjTpPG61mnfOABFzSCdvJODxR9Zj1CsYg==\";s:22:\"protection_eligibility\";s:8:\"Eligible\";s:9:\"quantity1\";s:1:\"1\";s:15:\"address_country\";s:14:\"United Kingdom\";s:12:\"payer_status\";s:8:\"verified\";s:10:\"first_name\";s:6:\"Vishal\";s:10:\"item_name1\";s:34:\"Fender Jimi Hendrix Strat in Black\";s:12:\"address_name\";s:8:\"Flat 436\";s:8:\"mc_gross\";s:4:\"0.02\";s:12:\"payment_date\";s:25:\"12:11:00 Sep 28, 2016 PDT\";s:14:\"payment_status\";s:9:\"Completed\";s:8:\"business\";s:21:\"vishalkumar@xxxxx.com\";s:9:\"last_name\";s:5:\"Kumar\";s:13:\"address_state\";s:7:\"Glasgow\";s:19:\"payer_business_name\";s:17:\"Some Business Ltd\";s:6:\"txn_id\";s:14:\"98DCDD8LKJKDFD\";s:6:\"mc_fee\";s:4:\"0.02\";s:6:\"resend\";s:4:\"true\";s:12:\"payment_type\";s:7:\"instant\";s:14:\"notify_version\";s:3:\"3.8\";s:11:\"payer_email\";s:19:\"payments@yyyy.co.uk\";s:14:\"receiver_email\";s:21:\"vishalkumar@xxxxx.com\";s:12:\"address_city\";s:7:\"Glasgow\";s:17:\"residence_country\";s:2:\"IN\";s:12:\"date_created\";s:41:\"Saturday 20th of June 1970 at 12:15:14 PM\";}');

-- --------------------------------------------------------

--
-- Table structure for table `site_cookies`
--

CREATE TABLE `site_cookies` (
  `id` int(11) NOT NULL,
  `cookie_code` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expiry_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_cookies`
--

INSERT INTO `site_cookies` (`id`, `cookie_code`, `user_id`, `expiry_date`) VALUES
(1, 'CJOG3WU5G48UftXeWZkEuYJh6f8Gxb0XXAjI8Qw3fMBx2J1hIxKS0zgq6DwvL70cbPF858ZoGRVyIlXIns3uoxGXZpNHSqTPhrUVUNl6Zj8WfmMwTLetESYQJyXgR7EP', 88, 1508663655),
(5, '5vbCtMy00S7kFoCVUofDJvJNzOigpUEnIS1Ysk8q6lbxCwUFuXwGEeKTBtN9jenOdCKIkfAc5b77s25NVTG6slDmwuaq5VZDBKkP4xUmVoV4aV7jfcIU8PodjTp4J0tP', 88, 1508664584),
(8, '9Bh0ZG8aSvwTaxxnHLMlOEl0l9P5EKiOzpnTsA9y9hdvZVFYOv4FXvyOiRH894BQn5REjnyNNViZab9ri8KRve9vDsY32giKyDIix2kVOrJlJj1M9CMWpP73kUBQhklw', 88, 1508673205),
(9, '64WO8AuVcQzzGkgZoZcTHisvqfCwUhMb1nyc6Z0NY7LGZcT50eZIlEaOSs04V6AIkyxsrhUx7gkFGXT3ZlaqnSfZHxLuiNM70BTBarbaDhhwKAfTmkH0NYI3UvTM3mko', 88, 1508673232);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `target_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `target_url`) VALUES
(9, 'Fender Deals', 'http://localhost/shoppingcart/');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `target_url` varchar(255) NOT NULL,
  `alt_text` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `parent_id`, `target_url`, `alt_text`, `picture`) VALUES
(7, 9, '', '', 'slider52.jpg'),
(8, 9, 'http://localhost/shoppingcart/musical/instrument/fender-american-standard-stratocaster-electric-guitar-with-rosewood-fingerboard', 'AMerican Telecaster', 'New_Project.png'),
(9, 9, 'http://localhost/shoppingcart/musical/instrument/fender-jimi-hendrix-start-in-black', 'Jimi Hendrix', 'Fender-Offset-Guitars-header.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store_accounts`
--

CREATE TABLE `store_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `company` varchar(150) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `town` varchar(50) NOT NULL,
  `country` varchar(40) NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `telnum` varchar(30) NOT NULL,
  `email` varchar(65) NOT NULL,
  `date_made` int(11) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_accounts`
--

INSERT INTO `store_accounts` (`id`, `username`, `firstname`, `lastname`, `company`, `address1`, `address2`, `town`, `country`, `postcode`, `telnum`, `email`, `date_made`, `pword`, `last_login`) VALUES
(1, 'Webguy', 'Web', 'Guy', 'Dream Project', 'Address one', 'Address two', 'my town', 'My town ', '2147483647', '2147483647', 'web.webguy@web.com', 1505237891, '', 0),
(3, 'admin', 'Vishal', 'Kumar', '', '', '', '', '', '', '', 'vishalkumar8507@gmail.com', 0, '', 0),
(8, 'Mukesh', 'Mukesh', 'Solanki', 'Mukesh tech ', 'Haryana', 'Haryana', 'Town', 'Indua', '1234567', '1234567897', 'mukeshsolanki1604@gmail.com', 1505238382, '$2y$12$2lBiIMCaqM8S0yN1kQC6auGqwXRj76jiv.inhE1mLJQ4/zy5SgA2y', 1510028620),
(9, 'Guest YlR', 'Guest', 'Account', '', '', '', '', '', '', '', '', 1510206374, 'cb41f3492c7d57d49753e83623dbf2544591e00f7e5967c1e5fdbfd2caabf7fd6dab2b5fc7b50ec7525e00b9802562e1669e6607b1e4fd1632a0d167f7233a0cSdiV7suqmNn1iXRckoYyv5dOFo71q8nLjfBaZcqseW781mt4tnD9xsL5U4Lc0qoYxUnM-fwrd-hdfPZJE89PH-plus-XHngA-eqls--eqls-', 0),
(2, 'vishal', 'Vishal', 'Kumar', '', 'H3 3rd floor Garwali Mohalla', 'Near hanuman mandir Laxmi nagar', 'NEW DELHI', 'India', '110092', '09162317839', 'vishalkumar8507@gmail.com', 1505237891, '$2y$12$R5YWl9WoADSjA5Brpqwv7uIcQVytz4e0.8yxwSGBcaH4vdel0.pK6', 1510402430),
(10, 'Guest Xcj', 'Guest', 'Account', '', '', '', '', '', '', '', '', 1510301151, 'd3ab79249a6e254f64252d38edf910ad97d77b03baf8f83e9342f3c68239657d870af24ac68098bd22cf19b81213ac139d31a9aed5735d668e1ee221152911abF1e3I3tafQOOlY0AmIKxUxHIgCgiH0tUb2WiXRoh1DdnuMQSGqD6eyv6tEMvJvxLcn5eMuj-fwrd-zvyM7XjHxTYl5g-eqls--eqls-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_basket`
--

CREATE TABLE `store_basket` (
  `id` int(11) NOT NULL,
  `session_id` varchar(64) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `tax` decimal(7,2) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_color` varchar(70) NOT NULL,
  `item_size` varchar(70) NOT NULL,
  `date_added` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `ip_address` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_basket`
--

INSERT INTO `store_basket` (`id`, `session_id`, `item_title`, `price`, `tax`, `item_id`, `item_qty`, `item_color`, `item_size`, `date_added`, `shopper_id`, `ip_address`) VALUES
(1, 'r4if7do7laq7s75vveepb7ktsulfjo2h', 'Fender Special Edition Deluxe Ash Telecaster Maple Fretboard Butterscotch Blonde', '1650.00', '0.00', 10, 1, '', '', 1510206356, 9, '::1'),
(2, 'h8faivi04jm5moif4o4a4smpla6b40ep', 'Fender Special Edition Deluxe Ash Telecaster Maple Fretboard Butterscotch Blonde', '1650.00', '0.00', 10, 2, '', '', 1510215675, 0, '::1'),
(3, '9lf1k4co3328snqhckqihak9ve6beimq', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510301142, 10, '::1'),
(4, 'uka6j0ani4lmkq5uf92nhavp6ir4cn0k', 'Fender Special Edition Deluxe Ash Telecaster Maple Fretboard Butterscotch Blonde', '1650.00', '0.00', 10, 2, '', '', 1510401590, 0, '::1'),
(5, 'v2rm0i26qc6qpd9mls3eigjohe6chvdr', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510402337, 0, '::1'),
(6, 'n4mc28c7s4l1k6n3b5f5a1phq5st2elu', 'Fender FA-100 Dreadnought Acoustic Guitar Pack Natural', '1599.00', '0.00', 7, 1, '', '', 1600599503, 0, '::1'),
(7, 'cnhtkmbfigut7ivddv1i3nhgkkes9ep4', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 1, '', 'big', 1600599641, 0, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

CREATE TABLE `store_categories` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_url` varchar(250) NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `cat_title`, `cat_url`, `parent_cat_id`, `priority`) VALUES
(1, 'Guitars', 'Guitars', 0, 1),
(2, 'Fender Guitars', 'Fender-Guitars', 1, 1),
(4, 'SHowroom', 'SHowroom', 0, 8),
(5, 'FX Padels', 'FX-Padels', 0, 5),
(6, 'Pickups', 'Pickups', 0, 2),
(7, 'Technology', 'Technology', 0, 3),
(8, 'Flok Instruments', 'Flok-Instruments', 0, 7),
(9, 'Accesories', 'Accesories', 0, 4),
(11, 'Ibanez Guitars', 'Ibanez-Guitars', 1, 2),
(12, 'Jackson Guitars', 'Jackson-Guitars', 0, 6),
(13, 'BC Rich', 'BC-Rich', 1, 3),
(14, 'Pickups', 'Pickups', 6, 1),
(15, 'Stringed Folk Instuments', 'Stringed-Folk-Instuments', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_cat_assign`
--

CREATE TABLE `store_cat_assign` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_cat_assign`
--

INSERT INTO `store_cat_assign` (`id`, `cat_id`, `item_id`) VALUES
(4, 2, 13),
(5, 2, 12),
(3, 2, 1),
(6, 2, 9),
(7, 2, 5),
(8, 2, 11),
(9, 2, 8),
(10, 2, 3),
(11, 2, 6),
(12, 2, 14),
(13, 2, 15),
(14, 2, 16),
(15, 2, 17),
(16, 2, 19),
(18, 11, 14),
(19, 15, 7),
(20, 2, 7),
(21, 11, 3),
(22, 2, 10),
(23, 2, 18),
(24, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE `store_items` (
  `id` int(11) NOT NULL,
  `item_title` varchar(250) NOT NULL,
  `item_url` varchar(250) NOT NULL,
  `item_price` decimal(7,2) NOT NULL,
  `item_description` text NOT NULL,
  `was_price` decimal(7,2) NOT NULL,
  `big_pic` varchar(250) NOT NULL,
  `small_pic` varchar(250) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `item_title`, `item_url`, `item_price`, `item_description`, `was_price`, `big_pic`, `small_pic`, `status`) VALUES
(3, 'Fender Acoustic Guitars', 'Fender-Acoustic-Guitars', '1044.00', 'Here is the description of Cool Gold Watch.<div><br></div><div><strong xss=\"removed\">Lorem Ipsum</strong><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></div><div><span xss=\"removed\"><br></span></div><div><strong xss=\"removed\">Lorem Ipsum</strong><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></div><div><span xss=\"removed\"><br></span></div><div><span xss=\"removed\"><strong xss=\"removed\">Lorem Ipsum</strong><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div><span xss=\"removed\"><span xss=\"removed\"><strong xss=\"removed\">Lorem Ipsum</strong><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></span></div>', '1185.00', '0961712021_gtr_frt_001_rr.jpg', '0961712021_gtr_frt_001_rr.jpg', 1),
(11, 'Fender Special Edition HH Maple Fingerboard Standard Telecaster Sea Foam Pearl', 'Fender-Special-Edition-HH-Maple-Fingerboard-Standard-Telecaster-Sea-Foam-Pearl', '1699.00', '<span xss=\"removed\">Inspired by the Pacific Ocean, the lustrous FSR Standard Telecaster HH Sea Foam Pearl is a tribute to the Telecaster guitar’s origin in California. With its unique aesthetic style, this is the perfect instrument for the stage—the one-of-a-kind finish shines under the spotlight with the glow of a moonlight ocean. Its exceptional style, thick voice and easy playability are sure to please those who like their music like the sea—mysterious and deep</span><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div>', '1766.00', 'download_(8).png', 'download_(8).png', 1),
(12, 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', 'Fender-California-Series-Sonoran-SCE-Cutaway-Dreadnought-Acoustic-Electric-Guitar', '1299.00', '<span xss=\"removed\">Cowabunga! Grab your board shorts and your California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar, head on down to Laguna to play some tunes and ride the waves. This dreadnought beauty from Fender\'s California Series will have you admiring its cool.</span><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><font face=\"Open Sans, Arial, sans-serif\"><span xss=\"removed\">Lorem Ipsum</span></font><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"> Strat guitar headstock, soft C-shaped maple neck and hip checkerboard binding \'til the sun goes down. Other cool features on the Sonoran SCE include a vintage-inspired pickguard design, rosewood fingerboard and scalloped bracing. Perfect for Fender enthusiasts, fans of vintage-style guitars, and guitarists who want a different look and vibe</span><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><font face=\"Open Sans, Arial, sans-serif\"><span xss=\"removed\">Lorem Ipsum</span></font><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div></div>', '1599.00', 'download_(9).png', 'download_(9).png', 1),
(5, 'Fender FA-135CE Cutaway Concert', 'Fender-FA-135CE-Cutaway-Concert', '1922.00', '<div xss=\"removed\"><span xss=\"removed\">The Fender FA-135CE Cutaway Concert Acoustic-Electric Guitar is built on the concert-style platform for a sleek, modern design. The laminated spruce top features X-bracing for bright, punchy tone, ideal for lead guitar. The neck is nato, and the back and sides are laminated basswood-both tone woods known for letting the mid and high frequencies sing out.</span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div>', '2111.00', 'download.png', 'download.png', 1),
(6, 'Fenders', 'Fenders', '800.00', 'Here is the DUmmy Text about this desc...', '750.00', 'download_(5)1.png', 'download_(5)1.png', 1),
(7, 'Fender FA-100 Dreadnought Acoustic Guitar Pack Natural', 'Fender-FA-100-Dreadnought-Acoustic-Guitar-Pack-Natural', '1599.00', '<span xss=\"removed\" xss=removed>The Fender FA-100 Fender Acoustic Guitar Pack includes the FA-100 Dreadnought Acoustic which has everything from the exclusive Fender headstock, bridge, and pickguard shape, to the forward-mounted strap button, and comes with a 6 mm padded gig bag. This budget-conscious acoustic delivers the tone of more expensive instruments. So get ready and start playing now.</span><div xss=\"removed\" xss=removed><span xss=\"removed\"><br></span></div><div xss=\"removed\" xss=removed><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\" xss=removed><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\" xss=removed><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\" xss=removed><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\" xss=removed><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\" xss=removed><ul xss=removed><li xss=removed><font face=\"Arial, Verdana\"><span xss=removed>Description - </span></font>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li></ul></div>', '1699.00', '5d54e5e9e44c306c6ae1dffde0853593--music-instruments-bass-guitars.jpg', '5d54e5e9e44c306c6ae1dffde0853593--music-instruments-bass-guitars.jpg', 1),
(8, 'Fender Standard Stratocaster Electric Guitar with Maple Fretboard', 'Fender-Standard-Stratocaster-Electric-Guitar-with-Maple-Fretboard', '2399.00', '<span xss=\"removed\">The Fender Standard Stratocaster Electric Guitar is the guitar design that changed the world. This model offers legendary Fender tone with classic styling for those on a budget. It has an alder body that\'s contoured to be comfortable during long sessions, whether you\'re standing or sitting. Its maple neck is super-comfy with a modern C shape.</span>', '2599.00', 'download_(3).png', 'download_(3).png', 1),
(9, 'Fender Standard Telecaster Electric Guitar', 'Fender-Standard-Telecaster-Electric-Guitar', '1489.00', '<span xss=\"removed\">The Fender Standard Telecaster Electric Guitar features the best of the old and the new: a fast-action gloss maple neck, cast/sealed machine heads, 2 classic single-coil pickups, and a 6-saddle string-thru-body bridge. Since its introduction in the early \'50s, guitarists in all musical genres have relied on the Fender Telecaster guitar for its powerful tone and smooth playability. Timeless. </span>', '1568.00', 'fender-american-standard-telecaster-mn-natural_1_GIT0023950-000.jpg', 'fender-american-standard-telecaster-mn-natural_1_GIT0023950-000.jpg', 1),
(10, 'Fender Special Edition Deluxe Ash Telecaster Maple Fretboard Butterscotch Blonde', 'Fender-Special-Edition-Deluxe-Ash-Telecaster-Maple-Fretboard-Butterscotch-Blonde', '1650.00', '<span xss=\"removed\">The Fender Special Edition Deluxe Ash Telecaster features the best of the old and the new: a butterscotch blonde finish, a fast-action maple neck, cast/sealed machine heads, two classic single-coil pickups, and a 3-barrel string-thru-body bridge. Since its introduction in the early \'50s, guitarists in all musical genres have relied on the Fender Telecaster guitar for its powerful tone and smooth playability. Case sold separately.</span><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div>', '1799.00', 'download_(7).png', 'download_(7).png', 1),
(13, 'Fender Yamaha F335 Acoustic Guitar  Natural', 'Fender-Yamaha-F335-Acoustic-Guitar-Natural', '1159.00', '<div xss=\"removed\"><br></div><div xss=\"removed\"><span xss=\"removed\">Yamaha\'s F335 gives you that classic dreadnought shape and sound at a price point that won\'t break your bank. The F335\'s tonewood combination includes a laminate spruce top, rosewood fingerboard and bridge, and meranti back and sides. Gold die-cast tuners provide smooth and accurate tuning while a tortoiseshell pickguard gives a bit more style. Case sold separately.</span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div>', '1259.00', 'download_(10).png', 'download_(10).png', 1),
(14, 'Fender American Standard Stratocaster Electric Guitar with Rosewood Fingerboard', 'Fender-American-Standard-Stratocaster-Electric-Guitar-with-Rosewood-Fingerboard', '1299.00', '<span xss=\"removed\" xss=removed>The American Standard Stratocaster is the same great best-selling, go-to guitar it has always been, and now it\'s upgraded with aged plastic parts and full-sounding Fender Custom Shop Fat \'50s pickups. This latest iteration of the time-honored classic is the very essence of Strat tone and remains a beauty to see, hear and feel.</span><div xss=removed><br></div><div xss=removed><span xss=removed>Lorem Ipsum</span><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</span><span xss=removed>, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></div><div xss=removed><div xss=removed><br></div><br xss=\"removed\"><span xss=\"removed\" xss=removed>Features include hand-rolled fingerboard edges, Custom Shop Fat \'50s pickups, staggered tuners, improved bridge with bent steel saddles and copper-infused high-mass block for increased resonance and sustain, tinted neck, high-gloss maple or rosewood fretboard, satin neck back for smooth playability, thin-finish undercoat that lets the body breathe and improves resonance. Comes with Fender Tolex case.</span></div><div xss=removed><span xss=\"removed\" xss=removed><br></span></div><div xss=removed><span xss=\"removed\" xss=removed><span xss=removed>Lorem Ipsum</span><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div>', '1199.00', 'download_(3)1.png', 'download_(3)1.png', 1),
(15, 'Fender Special Edition Stratocaster HSS Electric Guitar', 'Fender-Special-Edition-Stratocaster-HSS-Electric-Guitar', '1124.00', '<span xss=\"removed\">If you\'re the kind of Strat player who wants more punch out of the bridge position, this distinctive Fender Standard HSS Stratocaster is made for you. It\'s got that classic look and feel that only a Strat can deliver, with the added muscle of a bridge humbucker, so you can go from glassy single-coil tones to heavyweight growl and scream with the flip of a switch. This special Strat features a cool look with candy red burst finish and black pickguard.</span><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div>', '1485.00', 'download_(4)1.png', 'download_(4)1.png', 1),
(16, 'Fender Classic Series \'50s Stratocaster Electric Guitar', 'Fender-Classic-Series-50s-Stratocaster-Electric-Guitar', '1481.00', '<span itemprop=\"brand\" class=\"brand\" xss=\"removed\">Fender</span><span xss=\"removed\"> Classic Series \'50s Stratocaster Electric Guitar</span><div><span xss=\"removed\">If you\'re the kind of Strat player who wants more punch out of the bridge position, this distinctive Fender Standard HSS Stratocaster is made for you. It\'s got that classic look and feel that only a Strat can deliver, with the added muscle of a bridge humbucker, so you can go from glassy single-coil tones to heavyweight growl and scream with the flip of a switch. This special Strat features a cool look with candy red burst finish and black pickguard.</span></div>', '1766.00', 'download_(5).png', 'download_(5).png', 1),
(17, 'Fender Modern Player Telecaster Thinline Deluxe Electric Guitar', 'Fender-Modern-Player-Telecaster-Thinline-Deluxe-Electric-Guitar', '1849.00', '<span xss=\"removed\">The Fender Modern Player Telecaster Thinline-throughout its history, Fender has always made a special point of welcoming new players to the family by offering entry-level instruments of remarkable </span><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\">The Fender Modern Player Telecaster Thinline-throughout its history, Fender has always made a special point of welcoming new players to the family by offering entry-level instruments of remarkable </span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\">Lorem Ipsum</span><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\">The Fender Modern Player Telecaster Thinline-throughout its history, Fender has always made a special point of welcoming new players to the family by offering entry-level instruments of remarkable </span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\">The Fender Modern Player Telecaster Thinline-throughout its history, Fender has always made a special point of welcoming new players to the family by offering entry-level instruments of remarkable </span></div>', '2188.00', 'download_(6).png', 'download_(6).png', 1),
(18, 'Fender Deluxe Stratocaster Maple Fingerboard', 'Fender-Deluxe-Stratocaster-Maple-Fingerboard', '1399.00', '<span xss=\"removed\">A tonally versatile guitar with time-honored Fender style and sound, the Deluxe Strat has a few tricks up its sleeve. Special switching unlocks extra pickup combinations for those moments you find you...</span><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\">A tonally versatile guitar with time-honored Fender style and sound, the Deluxe Strat has a few tricks up its sleeve. Special switching unlocks extra pickup combinations for those moments you find you...</span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><font face=\"Open Sans, Arial, sans-serif\"><span xss=\"removed\">Lorem Ipsum</span></font><span xss=\"removed\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=\"removed\"><span xss=\"removed\"><span xss=\"removed\"><br></span></span></div><div xss=\"removed\"><span xss=\"removed\">A tonally versatile guitar with time-honored Fender style and sound, the Deluxe Strat has a few tricks up its sleeve. Special switching unlocks extra pickup combinations for those moments you find you...</span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\">A tonally versatile guitar with time-honored Fender style and sound, the Deluxe Strat has a few tricks up its sleeve. Special switching unlocks extra pickup combinations for those moments you find you...</span></div>', '1655.00', 'download_(7)1.png', 'download_(7)1.png', 1),
(19, 'Fender Artist Series Yngwie Malmsteen Stratocaster Electric Guitar', 'Fender-Artist-Series-Yngwie-Malmsteen-Stratocaster-Electric-Guitar', '1599.00', '<span xss=\"removed\" xss=removed>The Fender Yngwie Malmsteen Stratocaster has been updated to be more like his current number-one Fender! Updates include a White /Black/White pickguard, bullet truss rod nut and machine screw neck mou..</span><div xss=removed><span xss=\"removed\"><br></span></div><div xss=removed><span xss=\"removed\">The Fender Yngwie Malmsteen Stratocaster has been updated to be more like his current number-one Fender! Updates include a White /Black/White pickguard, bullet truss rod nut and machine screw neck mou..</span></div><div xss=removed><span xss=\"removed\"><br></span></div><div xss=removed><span xss=\"removed\"><br></span></div><div xss=removed><span xss=\"removed\"><font face=\"Open Sans, Arial, sans-serif\"><span xss=removed>Lorem Ipsum</span></font><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></span></div><div xss=removed><span xss=\"removed\"><br></span></div><div xss=removed><span xss=\"removed\">The Fender Yngwie Malmsteen Stratocaster has been updated to be more like his current number-one Fender! Updates include a White /Black/White pickguard, bullet truss rod nut and machine screw neck mou..</span></div><div xss=removed><span xss=\"removed\"><br></span></div><div xss=removed><span xss=\"removed\" xss=removed>The Fender Yngwie Malmsteen Stratocaster has been updated to be more like his current number-one Fender! Updates include a White /Black/White pickguard, bullet truss rod nut and machine screw neck mou..</span></div>', '1699.00', 'download_(8)1.png', 'download_(8)1.png', 1),
(20, 'Fender Jimi Hendrix Start in Black', 'Fender-Jimi-Hendrix-Start-in-Black', '1200.00', '<span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><div><span xss=\"removed\"><br></span></div><div><span xss=\"removed\"><br></span></div><div><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span></div><div><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span></div><div><span xss=\"removed\"><br></span></div><div><span xss=\"removed\"><br></span></div><div><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span><span xss=\"removed\">Here is the Description About this Items. </span></div>', '1400.00', '7e8264e78e464367fe37a2e31984418b--american-standard-stratocaster-fender-american-standard.jpg', '7e8264e78e464367fe37a2e31984418b--american-standard-stratocaster-fender-american-standard.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_item_colors`
--

CREATE TABLE `store_item_colors` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `color` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_colors`
--

INSERT INTO `store_item_colors` (`id`, `item_id`, `color`) VALUES
(11, 12, 'Blue'),
(7, 3, 'Blue'),
(12, 3, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_sizes`
--

CREATE TABLE `store_item_sizes` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `size` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_sizes`
--

INSERT INTO `store_item_sizes` (`id`, `item_id`, `size`) VALUES
(4, 12, 'big'),
(5, 12, 'medium');

-- --------------------------------------------------------

--
-- Table structure for table `store_orders`
--

CREATE TABLE `store_orders` (
  `id` int(11) NOT NULL,
  `order_ref` varchar(6) NOT NULL,
  `date_created` int(11) NOT NULL,
  `paypal_id` int(11) NOT NULL,
  `session_id` varchar(64) NOT NULL,
  `opened` tinyint(1) NOT NULL,
  `order_status` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `mc_gross` decimal(7,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_orders`
--

INSERT INTO `store_orders` (`id`, `order_ref`, `date_created`, `paypal_id`, `session_id`, `opened`, `order_status`, `shopper_id`, `mc_gross`) VALUES
(1, 'AEU55N', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 1, 2, 2, '0.01'),
(2, 'DD3GSP', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 1, 3, 2, '0.01'),
(3, 'BGPNHT', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(4, 'J7KYLS', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(5, 'H1CFHX', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(6, 'LBYD1F', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(7, 'NPRIE6', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(8, 'YBB46Z', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(9, '69MTTG', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(10, 'V9UXDC', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(11, '91OYO0', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(12, '0NNOXB', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(13, 'IJVJTP', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(14, 'FXOCIC', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(15, 'UMXNPQ', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(16, '7WSSUI', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(17, '6KSHPB', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(18, 'V1ETLF', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(19, '4X6TXC', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(20, 'WJNGSP', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(21, 'MHSDUH', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(22, 'HPHRCZ', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(23, '9LME3Q', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(24, 'T87SQM', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(25, 'ZQCM86', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(26, 'EE2LXI', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(27, 'YTXKAL', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(28, 'EFLI5P', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(29, 'JB3O2K', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(30, 'CSTBKD', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(31, 'MKU09M', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(32, '3AK2FC', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(33, 'VCJHQC', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(34, 'GMISW1', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(35, 'PAHWG9', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(36, 'BRIVR9', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01'),
(37, '9KSZYY', 1510054608, 1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 0, 1, 2, '0.01');

-- --------------------------------------------------------

--
-- Table structure for table `store_order_status`
--

CREATE TABLE `store_order_status` (
  `id` int(11) NOT NULL,
  `status_title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_order_status`
--

INSERT INTO `store_order_status` (`id`, `status_title`) VALUES
(1, 'Pending'),
(2, 'Order is Currently Being Processed'),
(3, 'Goods Dispatched'),
(6, 'Order Received');

-- --------------------------------------------------------

--
-- Table structure for table `store_shoppertrack`
--

CREATE TABLE `store_shoppertrack` (
  `id` int(11) NOT NULL,
  `session_id` varchar(64) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `tax` decimal(7,2) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_color` varchar(70) NOT NULL,
  `item_size` varchar(70) NOT NULL,
  `date_added` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `ip_address` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_shoppertrack`
--

INSERT INTO `store_shoppertrack` (`id`, `session_id`, `item_title`, `price`, `tax`, `item_id`, `item_qty`, `item_color`, `item_size`, `date_added`, `shopper_id`, `ip_address`) VALUES
(1, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 2, '::1'),
(2, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 2, '::1'),
(3, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(4, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(5, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(6, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(7, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(8, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(9, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(10, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(11, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(12, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(13, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(14, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(15, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(16, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(17, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(18, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(19, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(20, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(21, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(22, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(23, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(24, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(25, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(26, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(27, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(28, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(29, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(30, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(31, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(32, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(33, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(34, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(35, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(36, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1'),
(37, '0ae4g3pgfp094hs5r0bad035c3kq5g4d', 'Fender California Series Sonoran SCE Cutaway Dreadnought Acoustic-Electric Guitar', '1299.00', '0.00', 12, 2, '', 'big', 1510048169, 0, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `webpages`
--

CREATE TABLE `webpages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_keywords` text NOT NULL,
  `page_description` text NOT NULL,
  `page_headline` varchar(255) NOT NULL,
  `page_content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webpages`
--

INSERT INTO `webpages` (`id`, `page_title`, `page_url`, `page_keywords`, `page_description`, `page_headline`, `page_content`) VALUES
(1, 'The HomePage', '', 'Some Keywords', 'Here is the Content for the page ', 'Page Headline', '<h1>Homepage</h1><div><br></div>Here is the content of the page <span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><div><span xss=\"removed\"><br></span></div><div><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span></div><div><span xss=\"removed\"><br></span></div><div><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span><span xss=\"removed\">Here is the content of the page </span></div><div><br></div><div><span xss=\"removed\"><br></span></div>'),
(2, 'Contactus', 'contactus', 'Contact Us', 'Contact Us Page Description', ' Contact Page', '<h1><b>Contact Us</b></h1><div><b><br></b></div><div><b><br></b></div><div><b><br></b></div>'),
(4, 'About-US', 'About-US', 'About Us', 'About Us', 'About Us', '<font face=\"Arial, Verdana\"><span xss=\"removed\">About Us</span></font>'),
(5, 'Refund Policy', 'Refund-Policy', 'Refund Policy', 'Refund Policy', 'Refund Policy', '<font face=\"Arial, Verdana\"><span xss=removed>Refund Policy</span></font>'),
(6, 'How to find something', 'How-to-find-something', 'How to find something', 'How to find something', 'How to find something', '<font face=\"Arial, Verdana\"><span xss=removed>How to find something</span></font>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backlist`
--
ALTER TABLE `backlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btm_nav`
--
ALTER TABLE `btm_nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_blocks`
--
ALTER TABLE `homepage_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_offers`
--
ALTER TABLE `homepage_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_galleries`
--
ALTER TABLE `item_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_cookies`
--
ALTER TABLE `site_cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_accounts`
--
ALTER TABLE `store_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_basket`
--
ALTER TABLE `store_basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_categories`
--
ALTER TABLE `store_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_cat_assign`
--
ALTER TABLE `store_cat_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_colors`
--
ALTER TABLE `store_item_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_sizes`
--
ALTER TABLE `store_item_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_orders`
--
ALTER TABLE `store_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_order_status`
--
ALTER TABLE `store_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_shoppertrack`
--
ALTER TABLE `store_shoppertrack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webpages`
--
ALTER TABLE `webpages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backlist`
--
ALTER TABLE `backlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `btm_nav`
--
ALTER TABLE `btm_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=581;

--
-- AUTO_INCREMENT for table `homepage_blocks`
--
ALTER TABLE `homepage_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homepage_offers`
--
ALTER TABLE `homepage_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `item_galleries`
--
ALTER TABLE `item_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paypal`
--
ALTER TABLE `paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_cookies`
--
ALTER TABLE `site_cookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store_accounts`
--
ALTER TABLE `store_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `store_basket`
--
ALTER TABLE `store_basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store_categories`
--
ALTER TABLE `store_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `store_cat_assign`
--
ALTER TABLE `store_cat_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `store_item_colors`
--
ALTER TABLE `store_item_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `store_item_sizes`
--
ALTER TABLE `store_item_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_orders`
--
ALTER TABLE `store_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `store_order_status`
--
ALTER TABLE `store_order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `store_shoppertrack`
--
ALTER TABLE `store_shoppertrack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `webpages`
--
ALTER TABLE `webpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
