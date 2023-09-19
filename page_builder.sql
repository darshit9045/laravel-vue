-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: page_builder
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `feature_image` varchar(255) NOT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1 = Published, 2 = Draft, 3 = Trash',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'Lipsum generator: Lorem Ipsum - All the facts','lipsum-generator-lorem-ipsum-all-the-facts','<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>','lipsum-generator-lorem-ipsum-all-the-facts-20230508114118.svg','1, 2','1','test','Lorem Ipsum',NULL,1,1,'1','2023-04-20 06:04:41','2023-06-01 01:34:10'),(2,'Lipsum generator: Lorem Ipsum All the facts','lipsum-generator-lorem-ipsum-all-the-facts-1','<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>\r\n<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n</div>\r\n<div>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n</div>','lipsum-generator-lorem-ipsum-all-the-facts-1-20230508114111.svg','1, 2, 3','1, 2','test','Lorem Ipsum',NULL,1,8,'1','2023-04-20 06:06:18','2023-05-17 06:52:30'),(3,'You Are Not Just Talented, You Are Spiritually Gifted','you-are-not-just-talented-you-are-spiritually-gifted','<div>\n<h3><em>&ldquo;I want to make a difference in the world.&rdquo;</em></h3>\n<p>And I am not that special for saying that. Most of us want to leave an imprint on the world that makes it better. Sure, maybe our ambitions are vastly different. Some of us dream of influencing the WHOLE world while some of us see OUR world as the people we aim to influence. Nevertheless, all of us want to make a good difference. And that&rsquo;s a good thing! God wants that for us too.</p>\n<blockquote>\n<p><em>For we are God&rsquo;s handiwork, created in Christ Jesus to do good works, which God prepared in advance for us to do.</em>&nbsp;(<a href=\"https://biblia.com/bible/niv/Eph%202.10\" data-purpose=\"bible-reference\" data-version=\"niv\" data-reference=\"Eph 2.10\">Ephesians 2:10, NIV</a>)</p>\n</blockquote>\n<p>It is not unique to Christianity to talk about the ways in which we are wired. Whether we are talking about our innate personality, our cultivated talents, or our developing passions, we all are interested in seeing how we can make a difference in the world.</p>\n<blockquote>\n<p><em>&ldquo;God never wastes anything. He would not give you abilities, interests, talents, gifts, personality, and life experiences unless he intended to use them for his glory.&rdquo;</em>&nbsp;&ndash; Rick Warren</p>\n</blockquote>\n<p>Yet there is a difference between all of those things and the ways in which we are spiritually gifted.</p>\n<h3>You are not just&nbsp;<em>talented</em>, you are&nbsp;<em>spiritually</em>&nbsp;<em>gifted</em>. Gifted by the capital &ldquo;S&rdquo; Spirit.</h3>\n<p>Look at what Paul says.</p>\n<blockquote>\n<p><em>Now about&nbsp;<strong>the gifts of the Spirit</strong>, brothers and sisters, I do not want you to be uninformed&hellip;&nbsp;<sup>4&nbsp;</sup><strong>There are different kinds of gifts, but the same Spirit distributes them</strong>.&nbsp;<sup>5&nbsp;</sup>There are different kinds of service, but the same Lord.&nbsp;<sup>6&nbsp;</sup>There are different kinds of working, but in all of them and in everyone it is the same God at work.</em></p>\n<p><em><sup>7&nbsp;</sup>Now to each one the manifestation of the Spirit is given for the common good.&nbsp;<sup>8&nbsp;</sup>To one there is given through the Spirit a message of wisdom, to another a message of knowledge by means of the same Spirit,&nbsp;<sup>9&nbsp;</sup>to another faith by the same Spirit, to another gifts of healing by that one Spirit,&nbsp;<sup>10&nbsp;</sup>to another miraculous powers, to another prophecy, to another distinguishing between spirits, to another speaking in different kinds of tongues,&nbsp;<sup>r</sup>&nbsp;and to still another the interpretation of tongues.&nbsp;<sup>11&nbsp;</sup>All these are the work of one and the same Spirit, and he distributes them to each one, just as he determines.</em>&nbsp;(<a href=\"https://biblia.com/bible/niv/1%20Cor%2012.1\" data-purpose=\"bible-reference\" data-version=\"niv\" data-reference=\"1 Cor 12.1\">1 Corinthians 12:1</a>,&nbsp;<a href=\"https://biblia.com/bible/niv/1%20Corinthians%2012.4-11\" data-purpose=\"bible-reference\" data-version=\"niv\" data-reference=\"1 Corinthians 12.4-11\">4-11</a>, NIV)</p>\n</blockquote>\n<p>We are not talking about &ldquo;spiritual&rdquo; as some nebulous, impersonal energy. Rather, spiritual gifts come exclusively from the Holy Spirit. He is the source and sustenance of spiritual gifts. Having the Holy Spirit is a necessary prerequisite to unleashing our spiritual gifts.</p>\n<p>Each of us is purposed to make a contribution in this life that echoes into eternity. This means that we each have an assignment, and we each need to see and accept that assignment if we are going to fulfill the calling of our lives. You and I can talk circles around purpose all day, but at the end of the day there is something crucial to understand.</p>\n<h3>We are&nbsp;<em>united</em>&nbsp;in purpose and&nbsp;<em>unique</em>&nbsp;in calling.</h3>\n<p>There is&nbsp;<em>unity</em>&nbsp;in our singular purpose to glorify God and enjoy him forever (shoutout to the credible&nbsp;<em>Westminster Catechism</em>). We are teammates, working together to enact God&rsquo;s plan of redemption in the world. Yet, we are&nbsp;<em>unique</em>&nbsp;in our calling. Our calling is the unique way in which God has wired us, equipped us, and assigned us to contribute to and advance his kingdom. This is not limited to our spiritual gifts, but it certainly includes them! And even in 1 Corinthians 12, Paul is not exhausting all the spiritual gifts, but using a few as an example to serve his point about how the body of Christ (you, me,&nbsp;<em>we</em>) works together.</p>\n<blockquote>\n<p><em>&ldquo;For those who lead and have a tendency toward pride and self-sufficiency, it may be humbling to know that God wants them to depend on and be built up by others with different gifts. For others, though, this will mean accepting what God has given them and then living and working in the community for the benefit of the body, knowing that this is their God-given and Spirit-enabled duty to the body. Just as there is no place for pride, so there is no place for false humility.&rdquo;</em>&nbsp;(Paul Gardner,&nbsp;<em>1 Corinthians</em>, Zondervan Exegetical Commentary on the New Testament, 554.)</p>\n</blockquote>\n<p>Our spiritual gifts are an essential part of our contribution to the kingdom of God. They are one of the primary ways the gospel works itself in our lives as we serve others. But how can we walk in them if we are not aware of them?</p>\n<h3>We need to know our Holy Spirit-given gifts if we want to walk in our full purpose and potential.</h3>\n<p>Here are four action steps to take from here.</p>\n<ul>\n<li><strong>First</strong>, take our&nbsp;<a href=\"https://newbreak.church/spiritual-gifts/\"><strong>spiritual gifts test by clicking HERE</strong></a>. It is not infallible, but it is a good tool to help you consider how God&rsquo;s empowering presence (Holy Spirit) wants to work in and through you.</li>\n<li><strong>Second</strong>, talk to some other Christians who you respect and who know you well. Ask them what spiritual gifts they see in you. Do not underestimate how someone else can see in you what you might not see in yourself!</li>\n<li><strong>Third</strong>, study biblical passages on these things. You may have noticed we did not unpack the spiritual gifts in this blog post. It would take quite some time to do so! Plus, let&rsquo;s give you some homework and ownership here. Pick up some commentaries on 1 Corinthians and read how scholars shed light on what Paul is saying about spiritual gifts (especially 1 Corinthians 12-14). The&nbsp;<a href=\"https://www.christianbook.com/corinthians-zondervan-exegetical-commentary-new-testament/paul-gardner/9780310243694/pd/243690\">Zondervan Exegetical Commentary on 1 Corinthians</a>&nbsp;is phenomenal, though at times it can be geared toward an academic audience. If you need a more lay-level commentary try the&nbsp;<a href=\"https://www.amazon.com/1-Corinthians-NIV-Application-Commentary/dp/0310484901/ref=sr_1_1?crid=2TZI7QH1CO4S0&amp;keywords=1+corinthians+niv+application+commentary&amp;qid=1675800424&amp;sprefix=1+corinthians+niv+application+commentary%2Caps%2C134&amp;sr=8-1\">NIV Application Commentary on 1 Corinthians</a>&nbsp;or&nbsp;<a href=\"https://www.amazon.com/Corinthians-You-Gods-Word/dp/1784986232/ref=sr_1_17_sspa?crid=DWALOLXQUY5&amp;keywords=zent+1+corinthians&amp;qid=1675800244&amp;sprefix=zecnt+1+corinthians%2Caps%2C448&amp;sr=8-17-spons&amp;psc=1&amp;spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUExRk5MVThIMlNQNkdWJmVuY3J5cHRlZElkPUEwNTc1MTgwMkhDTFRRWFMwVVhLOCZlbmNyeXB0ZWRBZElkPUEwNTk1OTc2MjFaMUwxUVJHNTlQMyZ3aWRnZXROYW1lPXNwX210ZiZhY3Rpb249Y2xpY2tSZWRpcmVjdCZkb05vdExvZ0NsaWNrPXRydWU=\">1 Corinthians For You</a>.</li>\n<li><strong>Fourth</strong>, but not least, put your spiritual gifts into practice!</li>\n</ul>\n<h3>The Holy Spirit does not give you these gifts for them to be like a trophy on a shelf. They are meant to be used for the sake of others!</h3>\n<p>As we read what Paul said:</p>\n<blockquote>\n<p><em>Now to each one the manifestation of the Spirit is given&nbsp;<strong>for the common good</strong>.&nbsp;</em>(<a href=\"https://biblia.com/bible/niv/1%20Cor%2012.7\" data-purpose=\"bible-reference\" data-version=\"niv\" data-reference=\"1 Cor 12.7\">1 Corinthians 12:7, NIV</a>)</p>\n</blockquote>\n<p>You want to make a difference in the world, right? Learn and use your spiritual gifts!</p>\n</div>\n<p>&nbsp;</p>','you-are-not-just-talented-you-are-spiritually-gifted-20230508114102.svg','2, 3','1, 2',NULL,NULL,NULL,1,9,'1','2023-04-20 06:11:34','2023-05-22 07:28:42'),(4,'A Look at Magento E-commerce Development Services!','the-future-of-online-retail-a-look-at-magento-e-commerce-development-services','<p>Regardless of the size of their company, eCommerce retailers utilize Magento extensively, making it one of the industry&rsquo;s top platforms. Businesses must keep up with the latest trends and technologies to stay ahead of the competition. With its robust features, flexibility, and scalability, Magento is an ideal choice for businesses of all sizes.</p>\r\n<p>Let us take a closer look at the future of online retail and the critical role that Magento e-commerce development services play in it.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>Mobile commerce is on the rise</strong>.</h3>\r\n<p>More and more people are using their smartphones to make purchases online. This trend will only continue in the coming years, and businesses must be prepared for it. Magento offers a mobile-friendly e-commerce platform that allows businesses to reach customers on the go.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>Personalization is key</strong></h3>\r\n<p>Customers today want personalized experiences when they shop online. They want to feel like the products and services they are purchasing are explicitly tailored to them. Magento offers a range of personalization features that allow businesses to create customized experiences for their customers.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>Social media is becoming more critical</strong>.</h3>\r\n<p>Social media is a powerful marketing tool that businesses must use to their advantage. Magento offers integration with popular social media platforms like Facebook and Twitter, allowing companies to reach a wider audience and engage with customers more personally.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>AI and machine learning is the future</strong>.</h3>\r\n<p>Artificial intelligence and machine learning are changing the way we shop online. These technologies are already used to personalize the shopping experience, recommend products, and improve customer service. Magento e-commerce development services can help businesses take advantage of these cutting-edge technologies.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>The importance of sustainability</strong></h3>\r\n<p>More and more consumers are concerned about the environmental impact of their purchases. They want to support businesses that are committed to sustainability. Magento e-commerce development services can help businesses to create sustainable e-commerce platforms that meet the needs of both customers and the planet.</p>\r\n<p>&nbsp;</p>\r\n<p>In conclusion, the future of online retail looks bright, and Magento&rsquo;s e-commerce development services will play a crucial role in shaping it. We at&nbsp;<a href=\"https://adorncommerce.com/ecommerce-development-services/\">Adorn Commerce</a> can provide you with the best technology at any level of your business, regardless of the size of your retail store or your plans to scale it up with Magento. We are skilled at creating specialized eCommerce solutions for every online store. Reach us by sending an email to info@adorncommerce.com if you have any questions. We will be more than happy to assist you.</p>','the-future-of-online-retail-a-look-at-magento-e-commerce-development-services-20230508114049.svg','1, 3','1',NULL,NULL,NULL,1,5,'1','2023-04-21 04:04:23','2023-05-22 07:28:41'),(5,'The Best Bootstrap Examples','the-best-bootstrap-examples','<div class=\"container\">&nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"row\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-6\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-6\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp;\r\n<div>&nbsp; &nbsp;</div>\r\n&nbsp; &nbsp;\r\n<div class=\"container\">&nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"row\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-4\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-4\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-4\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp;\r\n<div>&nbsp; &nbsp;</div>\r\n&nbsp; &nbsp;\r\n<div class=\"container\">&nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"row\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-3\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-3\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-3\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-3\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp;\r\n<div>&nbsp; &nbsp;</div>\r\n&nbsp; &nbsp;\r\n<div class=\"container\">&nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"row\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-2\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-2\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-2\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-2\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-2\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-2\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp;\r\n<div>&nbsp; &nbsp;</div>\r\n&nbsp; &nbsp;\r\n<div class=\"container\">&nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"row\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n<div class=\"example col-md-1\">Content</div>\r\n&nbsp; &nbsp; &nbsp; &nbsp;</div>\r\n&nbsp; &nbsp;</div>\r\n<div class=\"dropdown\">&nbsp; <button id=\"dropdownMenuButton\" class=\"btn btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> &nbsp; &nbsp; Dropdown example &nbsp; </button> &nbsp;\r\n<div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">&nbsp; &nbsp; <a class=\"dropdown-item\" href=\"#\">Action</a> &nbsp; &nbsp; <a class=\"dropdown-item\" href=\"#\">Another action</a> &nbsp; &nbsp; <a class=\"dropdown-item\" href=\"#\">Something else here</a> &nbsp;</div>\r\n</div>\r\n<nav class=\"navbar navbar-default\">&nbsp;\r\n<div class=\"container-fluid\">&nbsp; &nbsp;\r\n<div class=\"navbar-header\">&nbsp; &nbsp; &nbsp; <a class=\"navbar-brand\" href=\"#\">Site Name</a> &nbsp; &nbsp;</div>\r\n&nbsp; &nbsp;\r\n<ul class=\"nav navbar-nav\">\r\n<li>&nbsp; &nbsp; &nbsp;</li>\r\n<li class=\"active\"><a href=\"#\">Home</a></li>\r\n<li>&nbsp; &nbsp; &nbsp;</li>\r\n<li><a href=\"#\">Page 1</a></li>\r\n<li>&nbsp; &nbsp; &nbsp;</li>\r\n<li><a href=\"#\">Page 2</a></li>\r\n<li>&nbsp; &nbsp; &nbsp;</li>\r\n<li><a href=\"#\">Page 3</a></li>\r\n<li>&nbsp; &nbsp;</li>\r\n</ul>\r\n&nbsp;</div>\r\n</nav><form>&nbsp;\r\n<div class=\"form-group\">&nbsp; &nbsp; <label for=\"exampleInputEmail1\">Email address</label> &nbsp; &nbsp; <input id=\"exampleInputEmail1\" class=\"form-control\" type=\"email\" placeholder=\"Email\"> &nbsp;</div>\r\n&nbsp;\r\n<div class=\"form-group\">&nbsp; &nbsp; <label for=\"exampleInputPassword1\">Password</label> &nbsp; &nbsp; <input id=\"exampleInputPassword1\" class=\"form-control\" type=\"password\" placeholder=\"Password\"> &nbsp;</div>\r\n&nbsp;\r\n<div class=\"form-group\">&nbsp; &nbsp; <label for=\"exampleInputFile\">File input</label> &nbsp; &nbsp; <input id=\"exampleInputFile\" type=\"file\"> &nbsp; &nbsp;\r\n<p class=\"help-block\">Example block-level help text here.</p>\r\n&nbsp;</div>\r\n&nbsp;\r\n<div class=\"checkbox\">&nbsp; &nbsp; <label> &nbsp; &nbsp; &nbsp; <input type=\"checkbox\"> Check me out &nbsp; &nbsp; </label> &nbsp;</div>\r\n&nbsp; <button class=\"btn btn-default\" type=\"submit\">Submit</button></form></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>','the-best-bootstrap-examples-20230502062305.jpg','2','2','test','Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.','<p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>',1,2,'3','2023-05-02 00:53:05','2023-05-22 07:29:20');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Test','test','2023-04-19 03:56:35','2023-04-19 03:56:35'),(2,'Entertainment','entertainment','2023-04-20 01:01:08','2023-04-20 01:01:08'),(3,'Technology','technology','2023-04-20 01:01:18','2023-04-20 01:17:03');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = Failed, 1 = Success',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Contact Form Mail','{\"msg\":{\"_token\":\"b31JN7mhZ1r9Sltcjj3D2Pme4weRmwtWRK4doR6Z\",\"full_name\":\"Shehbaz Badi\",\"email\":\"shehbaz.adorncommerce+test@gmail.com\",\"select\":\"1\",\"check_box\":[\"C\",\"D\"],\"message\":\"Test msg\",\"radio\":\"Y\",\"Submit\":\"Submit\"},\"attachment\":{\"test\":\"test-20230428120332.png\"}}','1','2023-04-28 06:33:32','2023-04-28 06:33:37'),(2,'Contact Form Mail','{\"msg\":{\"_token\":\"b31JN7mhZ1r9Sltcjj3D2Pme4weRmwtWRK4doR6Z\",\"full_name\":\"Krupesh Gevariya\",\"email\":\"krupesh.adorncommerce@gmail.com\",\"select\":\"2\",\"check_box\":[\"A\",\"B\",\"C\"],\"message\":\"Test Message\",\"radio\":\"Y\",\"Submit\":\"Submit\"},\"attachment\":{\"test\":\"test-20230428120454.jpg\"}}','1','2023-04-28 06:34:54','2023-04-28 06:35:00'),(3,'Contact Form Mail','{\"msg\":{\"_token\":\"b31JN7mhZ1r9Sltcjj3D2Pme4weRmwtWRK4doR6Z\",\"full_name\":\"Sylvester Roman\",\"email\":\"cytujy@mailinator.com\",\"select\":\"3\",\"check_box\":[\"A\",\"B\"],\"message\":\"Et provident incidu\",\"radio\":\"N\",\"Submit\":\"Submit\"},\"attachment\":{\"test\":\"test-20230428120604.jpg\"}}','1','2023-04-28 06:36:04','2023-04-28 06:36:09'),(4,'Contact Form Mail','{\"msg\":{\"_token\":\"b31JN7mhZ1r9Sltcjj3D2Pme4weRmwtWRK4doR6Z\",\"full_name\":\"Krupesh Gevariya\",\"email\":\"krupesh.adorncommerce@gmail.com\",\"select\":\"1\",\"check_box\":[\"A\",\"B\",\"C\"],\"message\":\"What is Lorem Ipsum?\\r\\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\\r\\n\\r\\nWhy do we use it?\\r\\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"radio\":\"Y\",\"Submit\":\"Submit\"},\"attachment\":{\"test\":\"test-20230428123153.pdf\"}}','1','2023-04-28 07:01:53','2023-04-28 07:01:58'),(5,'Contact Form Mail','{\"msg\":{\"_token\":\"b31JN7mhZ1r9Sltcjj3D2Pme4weRmwtWRK4doR6Z\",\"full_name\":\"Rhonda Holman\",\"email\":\"xuty@mailinator.com\",\"select\":\"2\",\"check_box\":[\"A\",\"B\"],\"message\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. \\r\\n\\r\\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"radio\":\"N\",\"Submit\":\"Submit\"},\"attachment\":[]}','1','2023-04-28 07:07:06','2023-04-28 07:07:11'),(6,'Contact Form Mail','{\"msg\":{\"_token\":\"b31JN7mhZ1r9Sltcjj3D2Pme4weRmwtWRK4doR6Z\",\"full_name\":\"test\",\"email\":\"shehbaz.adorncommerce@gmail.com\",\"select\":\"2\",\"check_box\":[\"C\",\"D\"],\"message\":\"Message\",\"Submit\":\"Submit\"},\"attachment\":[]}','1','2023-04-28 07:07:43','2023-04-28 07:07:48'),(7,'Contact Form Mail','{\"msg\":{\"_token\":\"b31JN7mhZ1r9Sltcjj3D2Pme4weRmwtWRK4doR6Z\",\"full_name\":\"Blaine Carver\",\"email\":\"gucutije@mailinator.com\",\"select\":\"1\",\"check_box\":[\"A\",\"C\"],\"message\":\"Nemo ullam minus ad\",\"radio\":\"N\",\"Submit\":\"Submit\"},\"attachment\":[]}','1','2023-04-28 07:09:35','2023-04-28 07:09:40'),(8,'Contact Form Mail','{\"msg\":{\"_token\":\"b31JN7mhZ1r9Sltcjj3D2Pme4weRmwtWRK4doR6Z\",\"full_name\":\"Gil Coffey\",\"email\":\"jecys@mailinator.com\",\"select\":\"3\",\"check_box\":[\"A\",\"B\",\"C\",\"D\"],\"message\":\"Minima ipsum fugiat\",\"radio\":\"N\",\"Submit\":\"Submit\"},\"attachment\":[]}','1','2023-04-28 07:16:04','2023-04-28 07:16:09'),(9,'Contact Form Mail','{\"msg\":{\"_token\":\"cNMQXO0m2Xe60e8hfG1wIrUlNApkZiS7gfN8Zmal\",\"full_name\":\"Shehbaz\",\"email\":\"shehbaz.adorncommerce@gmail.com\",\"select\":\"2\",\"check_box\":[\"A\",\"B\"],\"message\":\"This is the test message\",\"radio\":\"Y\",\"Submit\":\"Submit\"},\"attachment\":{\"test\":\"test-20230503110145.jpg\"}}','1','2023-05-03 05:31:45','2023-05-03 05:31:50'),(10,'Contact Form Mail','{\"msg\":{\"_token\":\"cNMQXO0m2Xe60e8hfG1wIrUlNApkZiS7gfN8Zmal\",\"full_name\":\"Shehbaz\",\"email\":\"shehbaz.adorncommerce@gmail.com\",\"select\":\"2\",\"check_box\":[\"A\",\"B\"],\"message\":\"This is the test message\",\"radio\":\"Y\",\"Submit\":\"Submit\"},\"attachment\":{\"test\":\"test-20230503110151.jpg\"}}','1','2023-05-03 05:31:51','2023-05-03 05:31:55'),(11,'Contact Form Mail','{\"msg\":{\"_token\":\"ppyk4deGJ9u3WZ6YZwQS09BYG7i3hhvx0JgQ5Ki2\",\"full_name\":\"Erica Elliott\",\"email\":\"fomad@mailinator.com\",\"select\":\"2\",\"check_box\":[\"A\",\"D\"],\"message\":\"Ab ducimus quidem m\",\"radio\":\"Y\",\"Submit\":\"Submit\"},\"attachment\":{\"test\":\"test-20230510072536.svg\"}}','1','2023-05-10 01:55:36','2023-05-10 01:55:40'),(12,'Contact Form Mail','{\"msg\":{\"_token\":\"h7esN7hoIwglcNBsLonZMmcIwVpwFfKA79SytVGK\",\"full_name\":\"Kelly Clarke\",\"email\":\"coduvuhi@mailinator.com\",\"select\":\"2\",\"check_box\":[\"C\",\"D\"],\"message\":\"Aut assumenda tempor\",\"radio\":\"Y\",\"Submit\":\"Submit\"},\"attachment\":{\"test\":\"test-20230511054016.jpg\"}}','1','2023-05-11 00:10:16','2023-05-11 00:10:23');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `options` text DEFAULT NULL,
  `required` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1 = required',
  `custom_attr` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` VALUES (1,'Full Name','text',NULL,'1',NULL,'2023-04-28 04:42:56','2023-04-28 04:42:56'),(2,'Email','Email',NULL,'1',NULL,'2023-04-28 04:42:56','2023-04-28 04:42:56'),(3,'Select','Select','1, 2 , 3','0',NULL,'2023-04-28 04:42:56','2023-04-28 04:42:56'),(4,'Check Box','Checkbox','A, B, C, D','0',NULL,'2023-04-28 04:42:56','2023-04-28 04:42:56'),(5,'Test','File',NULL,'0',NULL,'2023-04-28 04:42:56','2023-04-28 04:42:56'),(6,'Message','textarea',NULL,'0',NULL,'2023-04-28 04:42:56','2023-04-28 04:42:56'),(7,'Radio','Radio','Y, N','0',NULL,'2023-04-28 04:42:56','2023-04-28 04:42:56');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'3-20230516130135.svg','3','3',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(2,'5-20230516130135.svg','5','5',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(3,'9-20230516130135.svg','9','9',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(4,'8-20230516130135.svg','8','8',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(5,'10-20230516130135.svg','10','10',NULL,3,'2023-05-16 07:31:35','2023-05-16 07:34:22'),(6,'7-20230516130135.svg','7','7',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(7,'2-20230516130135.svg','2','2',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(8,'12-20230516130135.svg','12','12',NULL,3,'2023-05-16 07:31:35','2023-05-16 07:34:09'),(9,'13-20230516130135.svg','13','13',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(10,'6-20230516130135.svg','6','6',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(11,'11-20230516130135.svg','11','11',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(12,'4-20230516130135.svg','4','4',NULL,NULL,'2023-05-16 07:31:35','2023-05-16 07:31:35'),(13,'1-20230516130135.svg','1','1',NULL,3,'2023-05-16 07:31:35','2023-05-16 07:33:55'),(16,'category-02-20230517055757.png','category-02','category-02',NULL,NULL,'2023-05-17 00:27:57','2023-05-17 00:27:57'),(17,'category-01-20230517055757.png','category-01','category-01',NULL,NULL,'2023-05-17 00:27:57','2023-05-17 00:27:57');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_categories`
--

DROP TABLE IF EXISTS `gallery_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_categories`
--

LOCK TABLES `gallery_categories` WRITE;
/*!40000 ALTER TABLE `gallery_categories` DISABLE KEYS */;
INSERT INTO `gallery_categories` VALUES (1,'Products','products','2023-05-01 00:51:13','2023-05-01 00:56:15'),(2,'Infrastructure','infrastructure','2023-05-01 00:51:33','2023-05-01 00:51:33'),(3,'Celebration','celebration','2023-05-01 00:51:42','2023-05-01 00:51:42'),(5,'Team Activities','team-activities','2023-05-01 00:58:30','2023-05-01 00:58:30');
/*!40000 ALTER TABLE `gallery_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `is_primary` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1=Primary',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=InActive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Heade Menu','{\"Home\":\"home\",\"About US\":\"about-us\",\"Blog\":\"blog\",\"Gallery\":\"gallery\",\"Contact\":\"contact\"}','1','1','2023-04-14 06:58:19','2023-05-22 07:40:05'),(2,'Footer','{\"About\":\"about-us\",\"FAQs\":\"faqs\",\"Gallery\":\"gallery\",\"Blog\":\"blog\"}','0','1','2023-04-14 06:59:32','2023-05-09 05:12:21'),(3,'Menu 2','{\"Home\":\"home\",\"About US\":\"about-us\",\"FAQs\":\"faqs\",\"Sitemap\":\"sitemap.xml\"}','0','1','2023-04-17 06:50:06','2023-05-09 05:10:51'),(4,'Menu 3','{\"Hire Magento Developers\":\"hire-magento-developers\",\"About US\":\"about-us\"}','0','1','2023-04-17 06:50:35','2023-04-17 06:50:35');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(9,'2023_03_29_171116_create_pages_table',2),(10,'2023_04_11_102812_update_pages',2),(11,'2023_04_12_115827_create_settings_table',2),(12,'2023_04_14_101407_create_menus_table',3),(15,'2023_04_19_063023_create_categories_table',4),(16,'2023_04_19_063816_create_tags_table',4),(17,'2023_04_20_070517_create_blogs_table',5),(19,'2023_04_26_055119_create_testimonials_table',6),(20,'2023_04_26_100047_create_shortcodes_table',7),(21,'2023_04_27_051314_create_sliders_table',8),(23,'2023_04_27_121932_create_forms_table',9),(24,'2023_04_28_114029_create_contacts_table',10),(25,'2023_05_01_055227_create_gallery_categories_table',11),(26,'2023_05_01_063446_create_galleries_table',12),(27,'2023_05_03_125113_update_setting_table',13),(28,'2023_05_04_131135_create_popups_table',14),(29,'2023_05_26_073423_create_user_activities_table',15),(31,'2023_05_26_074426_add_activity_to_user_activities_table',16),(32,'2023_07_26_055434_create_products_table',17),(33,'2023_08_16_060605_add_theme_to_page_table',18),(34,'2023_08_25_094826_create_realestates_table',19);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `parent_page` varchar(255) DEFAULT NULL,
  `theme` varchar(255) NOT NULL DEFAULT '1',
  `publice_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Home','home','<p>@slider(main)</p>\r\n<section>\r\n<div class=\" container-lg pt-5 pb-5 text-center\">\r\n<div class=\"title\">\r\n<h2 class=\"pb-2\">Inspiration <strong>Collection</strong></h2>\r\n<p class=\"mx-auto pb-5 text-secondary fa-sm\" style=\"width: 35%;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-4 col-sm-12 text-center\">\r\n<div class=\"border border-secondary p-3\">\r\n<div class=\"icon-demo mb-4  p-3 py-6\" style=\"font-size: 10em;\" role=\"img\" aria-label=\"Card text - large preview\"><img class=\"mx-auto d-block w-25\" src=\"{{asset(\'/images/system/excellence-honor-icon.svg\')}}\" alt=\"...\"></div>\r\n<h3 class=\"fs-5 fw-bold\">Lorem Ipsum</h3>\r\n<p class=\"text-secondary fa-sm\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-12 text-center\">\r\n<div class=\"border border-secondary p-3\">\r\n<div class=\"icon-demo mb-4  p-3 py-6\" style=\"font-size: 10em;\" role=\"img\" aria-label=\"Card text - large preview\"><img class=\"mx-auto d-block w-25\" src=\"{{asset(\'/images/system/excellence-honor-icon.svg\')}}\" alt=\"...\"></div>\r\n<h3 class=\"fs-5 fw-bold\">Lorem Ipsum</h3>\r\n<p class=\"text-secondary fa-sm\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-12 text-center\">\r\n<div class=\"border border-secondary p-3\">\r\n<div class=\"icon-demo mb-4  p-3 py-6\" style=\"font-size: 10em;\" role=\"img\" aria-label=\"Card text - large preview\"><img class=\"mx-auto d-block w-25\" src=\"{{asset(\'/images/system/excellence-honor-icon.svg\')}}\" alt=\"...\"></div>\r\n<h3 class=\"fs-5 fw-bold\">Lorem Ipsum</h3>\r\n<p class=\"text-secondary fa-sm\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"bg-secondary\">\r\n<div class=\" container-lg\">\r\n<div class=\"row  d-flex align-items-center justify-content-center pt-5 pb-5 \">\r\n<div class=\"col-md-6 col-sm-12 \">\r\n<div class=\"\">\r\n<div class=\"text-dark\">\r\n<h2 class=\"pb-2\">Lorem Ipsum <strong>Collection</strong></h2>\r\n<p class=\"w-75 text-secondary fa-sm\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,</p>\r\n<ul class=\"list-group list-unstyled \">\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n</ul>\r\n<a class=\"btn btn-lg btn-dark mt-4\" href=\"#\">Learn more</a></div>\r\n</div>\r\n</div>\r\n<div class=\"col-md-6 col-sm-12 text-center\">\r\n<div class=\"w-100 d-flex align-items-center justify-content-end \"><img class=\"d-block w-100\" src=\"{{asset(\'/images/system/home12-network.svg\')}}\" alt=\"...\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"\">\r\n<div class=\"container-lg\">\r\n<div class=\"row  d-flex align-items-center justify-content-center pt-5 pb-5 \">\r\n<div class=\"col-md-6 col-sm-12 text-center\">\r\n<div class=\"w-100 d-flex align-items-center justify-content-end \"><img class=\"d-block w-100\" src=\"{{asset(\'/images/system/portfolio-1.svg\')}}\" alt=\"...\"></div>\r\n</div>\r\n<div class=\"col-md-6 col-sm-12 ps-5\">\r\n<div class=\"\">\r\n<div class=\"text-dark\">\r\n<h2 class=\"pb-2\">Lorem Ipsum <strong>Collection</strong></h2>\r\n<p class=\"w-75 text-secondary fa-sm\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,</p>\r\n<ul class=\"list-group list-unstyled \">\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n</ul>\r\n<a class=\"btn btn-lg btn-dark mt-4\" href=\"#\">Learn more</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"bg-secondary our-clients\">\r\n<div class=\"container-lg pt-5 pb-5 text-center\">\r\n<div class=\"title\">\r\n<h2 class=\"pb-2\">What Our <strong>Collection</strong></h2>\r\n<p class=\"mx-auto pb-5 text-secondary fa-sm\" style=\"width: 35%;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n</div>\r\n@testimonial(slider)</div>\r\n</section>\r\n<section class=\"blog-section\">\r\n<div class=\"container-lg pt-5 pb-5\">\r\n<div class=\"title text-center\">\r\n<h2 class=\"pb-2\">Latest News and <strong>Articles</strong></h2>\r\n</div>\r\n@get_blog(3)</div>\r\n</section>','20230413085609.png','Lorem ipsum is placeholder text commonly used in the graphic','Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.','test, home','Public',NULL,'1','2023-05-08 11:40:04',NULL,'2023-04-13 03:26:09','2023-05-08 06:10:04'),(2,'About US','about-us','<div class=\"contact-banner\" aria-label=\"breadcrumb\">\r\n<div class=\"text-center mt-3\">\r\n<ol class=\"breadcrumb d-flex justify-content-center mb-3 fw-bold\">\r\n<li class=\"breadcrumb-item active\"><a class=\"text-dark\" href=\"{{route(\'page.home\')}}\">Home</a></li>\r\n<li class=\"breadcrumb-item\" style=\"color: #b97c3b;\" aria-current=\"page\">About Us</li>\r\n</ol>\r\n<h1 style=\"font-size: 50px; font-weight: bold;\">About Us</h1>\r\n</div>\r\n</div>\r\n<section class=\"about-us\">\r\n<div class=\"container-lg\">\r\n<div class=\"row  d-flex align-items-center justify-content-center pt-5 pb-5 \">\r\n<div class=\"col-md-6 col-sm-12 text-center\">\r\n<div class=\"w-100 d-flex align-items-center justify-content-end \"><img class=\"d-block w-100\" src=\"{{asset(\'/images/about-us.svg\')}}\" alt=\"...\"></div>\r\n</div>\r\n<div class=\"col-md-6 col-sm-12 ps-5\">\r\n<div class=\"\">\r\n<div class=\"text-dark\">\r\n<h2 class=\"pb-2\">Lorem Ipsum <strong>Collection</strong></h2>\r\n<p class=\"w-75 text-secondary fa-sm\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,</p>\r\n<ul class=\"list-group list-unstyled \">\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n</ul>\r\n<a class=\"btn btn-lg btn-dark mt-4\" href=\"#\">Learn more</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"Our-Vision\">\r\n<div class=\"container-lg\">\r\n<div class=\"pt-5 pb-5 \">\r\n<div class=\"col-md-12 col-sm-12 text-start\">\r\n<div class=\"\">\r\n<div class=\"text-dark\">\r\n<h2 class=\"pb-2\">Our <strong>Vision</strong></h2>\r\n<p class=\"w-75 text-secondary fa-sm\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem <br>Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an <br>unknown printer took a galley of type and scrambled it to make a type specimen book.<br>It has survived not only five centuries,</p>\r\n<ul class=\"list-group list-unstyled \">\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n<li class=\"fw-bold pt-2 pb-2\">Lorem Ipsum is simply dummy text</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"who-we-are\">\r\n<div class=\"container-lg\">\r\n<div class=\"row  d-flex align-items-center justify-content-center pt-5 pb-0 \">\r\n<div class=\"col-lg-6 col-sm-6 text-center\">\r\n<div class=\"w-100 d-flex align-items-center justify-content-end \"><img class=\"d-block w-100\" src=\"{{asset(\'/images/who-we-are.svg\')}}\" alt=\"...\"></div>\r\n</div>\r\n<div class=\"col-lg-6 col-sm-6\">\r\n<div class=\"\">\r\n<div class=\"text-dark\">\r\n<h2 class=\"pb-2\">Who Are <strong>We?</strong></h2>\r\n<p class=\"w-75 text-secondary fa-sm\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset</p>\r\n<p class=\"w-75 text-secondary fa-sm\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"our-team\" style=\"background-color: #f5f5f5;\">\r\n<div class=\" container-lg pt-5 pb-5 text-center\">\r\n<div class=\"title\">\r\n<h2 class=\"pb-2 text-start\">Our <strong>Teams</strong></h2>\r\n<p class=\"mx-auto pb-2 text-secondary fa-sm text-start\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been <br>the industry\'s</p>\r\n</div>\r\n<div class=\"row col-lg-12\">\r\n<div class=\"col-lg-4 col-sm-4 text-center\">\r\n<div class=\"icon-demo mb-4  p-3 py-6\"><img class=\"mx-auto d-block w-100\" src=\"{{asset(\'/images/team-1.svg\')}}\" alt=\"...\"></div>\r\n<div class=\" text-center\">\r\n<h3 class=\"fs-5 fw-bold\">Lorem Ipsum</h3>\r\n<p class=\"text-secondary fa-sm\">Lorem Ipsum</p>\r\n</div>\r\n</div>\r\n<div class=\"col-lg-4 col-sm-4 text-center\">\r\n<div class=\"icon-demo mb-4  p-3 py-6\"><img class=\"mx-auto d-block w-100\" src=\"{{asset(\'/images/team-1.svg\')}}\" alt=\"...\"></div>\r\n<div class=\" text-center\">\r\n<h3 class=\"fs-5 fw-bold\">Lorem Ipsum</h3>\r\n<p class=\"text-secondary fa-sm\">Lorem Ipsum</p>\r\n</div>\r\n</div>\r\n<div class=\"col-lg-4 col-sm-4 text-center\">\r\n<div class=\"icon-demo mb-4  p-3 py-6\"><img class=\"mx-auto d-block w-100\" src=\"{{asset(\'/images/team-1.svg\')}}\" alt=\"...\"></div>\r\n<div class=\" text-center\">\r\n<h3 class=\"fs-5 fw-bold\">Lorem Ipsum</h3>\r\n<p class=\"text-secondary fa-sm\">Lorem Ipsum</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>',NULL,NULL,NULL,NULL,'Public',NULL,'1','2023-05-15 09:10:06',NULL,'2023-04-13 03:26:47','2023-05-15 03:40:06'),(3,'FAQs','faqs','<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n<p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>\r\n<h3>Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>\r\n<h3>1914 translation by H. Rackham</h3>\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>\r\n<h3>Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3>\r\n<p>\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p>\r\n<h3>1914 translation by H. Rackham</h3>\r\n<p>\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>\r\n<p>==========================================================================</p>\r\n<p>@slider(home)</p>',NULL,'Frequently Asked Questions',NULL,NULL,'Public',NULL,'1','2023-05-09 11:14:21',NULL,'2023-04-13 03:27:08','2023-05-09 05:44:21'),(4,'Hire Magento Developers','hire-magento-developers','<p>@import url(\'https://adorncommerce.com/wp-content/cache/min/1/42b694f187fb7626d3991cb13f3ff6d4.css\');</p>\r\n<div id=\"content\" class=\"site-content\">\r\n<div id=\"primary\" class=\"content-area\"><main id=\"main\" class=\"site-main\">\r\n<div class=\"main-page-title\">\r\n<div class=\"adorn-page-title\">\r\n<p>==========================================================================</p>\r\n<p>@slider(home)</p>\r\n<h1>Hire Magento Developers</h1>\r\n<div class=\"breadcrumbs\"><a href=\"../../\">Home</a> Hire Magento Developers</div>\r\n</div>\r\n</div>\r\n<section class=\"spacing gray-bg\">\r\n<div class=\"wrap-content\">\r\n<div class=\"cms-content\">\r\n<div class=\"full-data-box hire-step\" style=\"background: url(\'../../wp-content/uploads/2022/05/border.svg\')no-repeat;\">\r\n<ul class=\"magento-step\">\r\n<li>Discuss project requirement</li>\r\n<li class=\"wider-box two\">We will send you our relevant developers CVs</li>\r\n<li class=\"three\">Arrange an interview with our developer</li>\r\n<li class=\"wider-box four\">Select hiring model</li>\r\n<li class=\"magento-step-btn\"><a href=\"../../free-consultation\">Start the rollercoaster project</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"spacing pricing-table\">\r\n<div class=\"wrap-content\">\r\n<div class=\"cms-content\">\r\n<div class=\"full-data-box\">\r\n<div class=\"main-title\">\r\n<div class=\"section-title\">\r\n<h2>Engagement Models to Hire Magento Developers</h2>\r\n</div>\r\n</div>\r\n<figure><img class=\"alignnone size-medium wp-image-2179 entered lazyloaded\" src=\"../../wp-content/uploads/2022/06/adron-pricing.png\" sizes=\"(max-width: 1300px) 100vw, 1300px\" srcset=\"https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing.png 1300w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-600x263.png 600w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-300x132.png 300w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-1024x449.png 1024w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-768x337.png 768w\" alt=\"pricing-table\" width=\"1300\" height=\"570\" data-lazy-srcset=\"https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing.png 1300w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-600x263.png 600w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-300x132.png 300w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-1024x449.png 1024w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-768x337.png 768w\" data-lazy-sizes=\"(max-width: 1300px) 100vw, 1300px\" data-lazy-src=\"/wp-content/uploads/2022/06/adron-pricing.png\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-medium wp-image-2179\" src=\"../../wp-content/uploads/2022/06/adron-pricing.png\" sizes=\"(max-width: 1300px) 100vw, 1300px\" srcset=\"https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing.png 1300w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-600x263.png 600w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-300x132.png 300w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-1024x449.png 1024w, https://adorncommerce.com/wp-content/uploads/2022/06/adron-pricing-768x337.png 768w\" alt=\"pricing-table\" width=\"1300\" height=\"570\" data-mce-src=\"../../wp-content/uploads/2022/06/adron-pricing.png\"></noscript></figure>\r\n<div class=\"CTA-button\">\r\n<div class=\"action\"><a class=\"button\" title=\"FREE CONSULTATION\" href=\"../../free-consultation/\">GET FREE CONSULTATION</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\" spacing our-benefits our-services\">\r\n<div class=\"wrap-content\">\r\n<div class=\"section-title\">\r\n<h2>Our Add-on Values and Benefits</h2>\r\n</div>\r\n<div class=\"cols cols3\">\r\n<div class=\"col\">\r\n<div class=\"service-box our-service-box\">\r\n<figure><img class=\"alignnone size-full wp-image-1923 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/flexible-environment.svg\" alt=\"flexible-environment\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/flexible-environment.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-1923\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/flexible-environment.svg\" alt=\"flexible-environment\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/flexible-environment.svg\"></noscript></figure>\r\n<h4>Flexible environment</h4>\r\n<p>Hire dedicated magento developer of your own wish. You can choose and test a developer before<br>hiring and can also call at your corporate office.</p>\r\n</div>\r\n</div>\r\n<div class=\"col\">\r\n<div class=\"service-box our-service-box\">\r\n<figure><img class=\"alignnone size-full wp-image-1924 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/No-hidden-cost.svg\" alt=\"No-hidden-cost\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/No-hidden-cost.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-1924\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/No-hidden-cost.svg\" alt=\"No-hidden-cost\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/No-hidden-cost.svg\"></noscript></figure>\r\n<h4>No hidden cost</h4>\r\n<p>We charge what we said. No other after development charges or initializing charges are made to<br>you. We believe in earning trust from our clients.</p>\r\n</div>\r\n</div>\r\n<div class=\"col\">\r\n<div class=\"service-box our-service-box\">\r\n<figure><img class=\"alignnone size-full wp-image-1926 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/nda-security.svg\" alt=\"nda-security\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/nda-security.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-1926\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/nda-security.svg\" alt=\"nda-security\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/nda-security.svg\"></noscript></figure>\r\n<h4>NDA security</h4>\r\n<p>If you need us to do any legal document signing, we are ready. We will agree for all necessary<br>provisions to protect your idea and project.</p>\r\n</div>\r\n</div>\r\n<div class=\"col\">\r\n<div class=\"service-box our-service-box\">\r\n<figure><img class=\"alignnone size-full wp-image-1935 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/source-code-protection.svg\" alt=\"source-code-protection\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/source-code-protection.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-1935\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/source-code-protection.svg\" alt=\"source-code-protection\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/source-code-protection.svg\"></noscript></figure>\r\n<h4>Source code protection</h4>\r\n<p>Your code is your property. We do not disclose to anyone and once the project is completed, we<br>deliver you the whole project code.</p>\r\n</div>\r\n</div>\r\n<div class=\"col\">\r\n<div class=\"service-box our-service-box\">\r\n<figure><img class=\"alignnone size-full wp-image-1928 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/qa-tested.svg\" alt=\"qa-tested\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/qa-tested.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-1928\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/qa-tested.svg\" alt=\"qa-tested\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/qa-tested.svg\"></noscript></figure>\r\n<h4>QA tested and on time delivery</h4>\r\n<p>We work in a process where proper testing is done and also work overtime if the deadline is<br>short. Our QA team works in parallel with developers.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"hire-developer-section alignnone size-full wp-image-2017\" style=\"background: url(/wp-content/uploads/2022/05/background-2.svg;\">\r\n<div class=\"full-data-box wrap-content\">\r\n<div class=\"section-title\">\r\n<div class=\"short-name\">Hire Developers</div>\r\n<h2>Why Hire Magento Developers from Adorn Commerce?</h2>\r\n</div>\r\n<div class=\"hire-developer\">\r\n<div class=\"hire-list\">\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2040 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/house-team.svg\" alt=\"house-team\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/house-team.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2040\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/house-team.svg\" alt=\"house-team\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/house-team.svg\"></noscript></figure>\r\n</div>\r\n<h4>A dedicated in-house team of qualified developers</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2049 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/communicate.svg\" alt=\"communicate\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/communicate.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2049\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/communicate.svg\" alt=\"communicate\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/communicate.svg\"></noscript></figure>\r\n</div>\r\n<h4>Direct communicate with our skilled resources</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2051 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/cost-effective.svg\" alt=\"cost-effective\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/cost-effective.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2051\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/cost-effective.svg\" alt=\"cost-effective\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/cost-effective.svg\"></noscript></figure>\r\n</div>\r\n<h4>Cost-effective development</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2054 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/on-time-delivery.svg\" alt=\"on-time-delivery\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/on-time-delivery.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2054\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/on-time-delivery.svg\" alt=\"on-time-delivery\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/on-time-delivery.svg\"></noscript></figure>\r\n</div>\r\n<h4>Guaranteed On Time Delivery.</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2040 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/delivered-projects.svg\" alt=\"delivered projects\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/delivered-projects.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2040\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/delivered-projects.svg\" alt=\"delivered projects\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/delivered-projects.svg\"></noscript></figure>\r\n</div>\r\n<h4>Successfully delivered projects records.</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2040 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/developer-available.svg\" alt=\"developer-available\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/developer-available.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2040\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/developer-available.svg\" alt=\"developer-available\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/developer-available.svg\"></noscript></figure>\r\n</div>\r\n<h4>A spare developer available in case of any emergency</h4>\r\n</div>\r\n</div>\r\n<div class=\"mobile-photo\">\r\n<figure><img class=\"alignnone size-full wp-image-2045 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/mobile-photo.png\" alt=\"mobile-photo\" width=\"312\" height=\"633\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/mobile-photo.png\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2045\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/mobile-photo.png\" alt=\"mobile-photo\" width=\"312\" height=\"633\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/mobile-photo.png\"></noscript></figure>\r\n</div>\r\n<div class=\"hire-list\">\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2040 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/result-oriented.svg\" alt=\"result-oriented\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/result-oriented.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2040\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/result-oriented.svg\" alt=\"result-oriented\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/result-oriented.svg\"></noscript></figure>\r\n</div>\r\n<h4>Result oriented development approach</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2049 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/daily-stand.svg\" alt=\"daily-stand\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/daily-stand.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2049\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/daily-stand.svg\" alt=\"daily-stand\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/daily-stand.svg\"></noscript></figure>\r\n</div>\r\n<h4>Daily stand up meeting via Skype, Email, Zoom, Google meet up, etc.</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2051 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/business.svg\" alt=\"business\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/business.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2051\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/business.svg\" alt=\"business\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/business.svg\"></noscript></figure>\r\n</div>\r\n<h4>Get business oriented strategy</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2040 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/performance.svg\" alt=\"performance\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/performance.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2040\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/performance.svg\" alt=\"performance\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/performance.svg\"></noscript></figure>\r\n</div>\r\n<h4>Performance, Security &amp; Optimized Speed Security</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2040 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/flexible-customizable.svg\" alt=\"flexible-customizable\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/flexible-customizable.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2040\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/flexible-customizable.svg\" alt=\"flexible-customizable\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/flexible-customizable.svg\"></noscript></figure>\r\n</div>\r\n<h4>Flexible engagement models</h4>\r\n</div>\r\n<div class=\"hire-box\">\r\n<div class=\"hire-icon\">\r\n<figure><img class=\"alignnone size-full wp-image-2040 entered lazyloaded\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/24-support.svg\" alt=\"24-support\" data-lazy-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/24-support.svg\" data-ll-status=\"loaded\"><noscript><img class=\"alignnone size-full wp-image-2040\" src=\"https://adorncommerce.com/wp-content/uploads/2022/05/24-support.svg\" alt=\"24-support\" data-mce-src=\"https://adorncommerce.com/wp-content/uploads/2022/05/24-support.svg\"></noscript></figure>\r\n</div>\r\n<h4>24/7 Professional support and maintenance services</h4>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</main><!-- #main --></div>\r\n<!-- #primary --></div>','20230413120308.png',NULL,NULL,NULL,'Public',NULL,'1','2023-05-09 11:13:39',NULL,'2023-04-13 06:26:43','2023-05-09 05:43:39'),(5,'Blog','blog','<h1>Default Page!</h1>',NULL,NULL,NULL,NULL,'Public',NULL,'1','2023-04-21 09:34:45',NULL,'2023-04-21 04:04:23','2023-04-21 04:04:23'),(6,'gallery','gallery','<div class=\"contact-banner\">\r\n<div class=\"text-center mt-3\">\r\n<ol class=\"breadcrumb d-flex justify-content-center mb-3\" style=\"font-weight: 600;\">\r\n<li class=\"breadcrumb-item active\"><a class=\"text-dark\" href=\"#\">Home</a></li>\r\n<li class=\"breadcrumb-item\" style=\"color: #b97c3b;\" aria-current=\"page\">Portfolio</li>\r\n</ol>\r\n<h1 style=\"font-size: 50px; font-weight: bold;\">Portfolio</h1>\r\n</div>\r\n</div>\r\n<p>@gallery()</p>',NULL,NULL,NULL,NULL,'Public',NULL,'1','2023-05-16 13:19:17',NULL,'2023-05-01 06:34:32','2023-05-16 07:49:17'),(7,'Contact','contact','<div class=\"contact-banner\">\r\n<div class=\"text-center mt-3\">\r\n<ol class=\"breadcrumb d-flex justify-content-center mb-3\" style=\"font-weight: 600;\">\r\n<li class=\"breadcrumb-item active\"><a class=\"text-dark\" href=\"#\">Home</a></li>\r\n<li class=\"breadcrumb-item\" style=\"color: #b97c3b;\" aria-current=\"page\">contact us</li>\r\n</ol>\r\n<h1 style=\"font-size: 50px; font-weight: bold;\">Contact Us</h1>\r\n</div>\r\n</div>\r\n<section class=\"\">\r\n<div class=\"container-lg\">\r\n<div class=\"align-items-center justify-content-center pt-5 pb-5\"><!-- <div class=\"col-md-12 col-sm-12 text-center\"> -->\r\n<div class=\"row align-items-center w-100\" style=\"justify-content: space-between; margin: 0 auto;\"><!--Grid column-->\r\n<div class=\"col-sm-12 col-lg-6  mb-md-0 mb-5 bg-secondary p-5\">\r\n<h2 class=\"pb-4\" style=\"text-align: left;\">Contact Us</h2>\r\n@contact_form() <!--Grid column--> <!--Grid column-->\r\n<div class=\"col-sm-12 col-lg-5  mb-md-0 mb-5 p-5\">\r\n<h2 style=\"font-weight: bold; margin-bottom: 20px; padding-top: 30px;\">Get In Touch</h2>\r\n<p style=\"color: #999999; font-size: 16px;\">Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry.</p>\r\n<ul class=\"list-unstyled mb-0\">\r\n<li class=\"d-flex \">\r\n<div style=\"padding-right: 20px;\"><img src=\"{{asset(\'images/contact/Tell_With_Us.svg\')}}\"></div>\r\n<div>\r\n<p style=\"margin-bottom: 5px; font-weight: bold;\">Tell With Us</p>\r\n<p class=\"mb-0\">+91 123456789</p>\r\n</div>\r\n</li>\r\n<li class=\"d-flex pt-5 pb-5 align-items-center\">\r\n<div style=\"padding-right: 20px;\"><img src=\"{{asset(\'images/contact/quick_mail.svg\')}}\"></div>\r\n<div>\r\n<p style=\"margin-bottom: 5px; font-weight: bold;\">Quick Email</p>\r\n<p class=\"mb-0\">lorem.com@gmail.com</p>\r\n</div>\r\n</li>\r\n<li class=\"d-flex align-items-center\">\r\n<div style=\"padding-right: 20px;\"><img src=\"{{asset(\'images/contact/address.svg\')}}\"></div>\r\n<div>\r\n<p style=\"margin-bottom: 5px; font-weight: bold;\">Address</p>\r\n<p class=\"mb-0\">Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry.</p>\r\n</div>\r\n</li>\r\n</ul>\r\n</div>\r\n<!--Grid column--></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<!--Section: Contact v.2-->\r\n<div class=\"container-fluid\">\r\n<div class=\"map-responsive\"><iframe style=\"border: 0;\" src=\"https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France\" width=\"100%\" height=\"400\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></div>\r\n</div>',NULL,NULL,NULL,NULL,'Public',NULL,'1','2023-05-10 07:21:12',NULL,'2023-05-10 00:36:20','2023-05-10 01:51:12'),(8,'Test','test','<div id=\"Languages\"><a href=\"http://hy.lipsum.com/\">Հայերեն</a>&nbsp;<a href=\"http://sq.lipsum.com/\">Shqip</a>&nbsp;<span class=\"ltr\" dir=\"ltr\"><a href=\"http://ar.lipsum.com/\">‫العربية</a></span>&nbsp;<a href=\"http://bg.lipsum.com/\">Български</a>&nbsp;<a href=\"http://ca.lipsum.com/\">Catal&agrave;</a>&nbsp;<a href=\"http://cn.lipsum.com/\">中文简体</a>&nbsp;<a href=\"http://hr.lipsum.com/\">Hrvatski</a>&nbsp;<a href=\"http://cs.lipsum.com/\">Česky</a>&nbsp;<a href=\"http://da.lipsum.com/\">Dansk</a>&nbsp;<a href=\"http://nl.lipsum.com/\">Nederlands</a>&nbsp;<a class=\"zz\" href=\"http://www.lipsum.com/\">English</a>&nbsp;<a href=\"http://et.lipsum.com/\">Eesti</a>&nbsp;<a href=\"http://ph.lipsum.com/\">Filipino</a>&nbsp;<a href=\"http://fi.lipsum.com/\">Suomi</a>&nbsp;<a href=\"http://fr.lipsum.com/\">Fran&ccedil;ais</a>&nbsp;<a href=\"http://ka.lipsum.com/\">ქართული</a>&nbsp;<a href=\"http://de.lipsum.com/\">Deutsch</a>&nbsp;<a href=\"http://el.lipsum.com/\">&Epsilon;&lambda;&lambda;&eta;&nu;&iota;&kappa;ά</a>&nbsp;<span class=\"ltr\" dir=\"ltr\"><a href=\"http://he.lipsum.com/\">‫עברית</a></span>&nbsp;<a href=\"http://hi.lipsum.com/\">हिन्दी</a>&nbsp;<a href=\"http://hu.lipsum.com/\">Magyar</a>&nbsp;<a href=\"http://id.lipsum.com/\">Indonesia</a>&nbsp;<a href=\"http://it.lipsum.com/\">Italiano</a>&nbsp;<a href=\"http://lv.lipsum.com/\">Latviski</a>&nbsp;<a href=\"http://lt.lipsum.com/\">Lietuvi&scaron;kai</a>&nbsp;<a href=\"http://mk.lipsum.com/\">македонски</a>&nbsp;<a href=\"http://ms.lipsum.com/\">Melayu</a>&nbsp;<a href=\"http://no.lipsum.com/\">Norsk</a>&nbsp;<a href=\"http://pl.lipsum.com/\">Polski</a>&nbsp;<a href=\"http://pt.lipsum.com/\">Portugu&ecirc;s</a>&nbsp;<a href=\"http://ro.lipsum.com/\">Rom&acirc;na</a>&nbsp;<a href=\"http://ru.lipsum.com/\">Pyccкий</a>&nbsp;<a href=\"http://sr.lipsum.com/\">Српски</a>&nbsp;<a href=\"http://sk.lipsum.com/\">Slovenčina</a>&nbsp;<a href=\"http://sl.lipsum.com/\">Sloven&scaron;čina</a>&nbsp;<a href=\"http://es.lipsum.com/\">Espa&ntilde;ol</a>&nbsp;<a href=\"http://sv.lipsum.com/\">Svenska</a>&nbsp;<a href=\"http://th.lipsum.com/\">ไทย</a>&nbsp;<a href=\"http://tr.lipsum.com/\">T&uuml;rk&ccedil;e</a>&nbsp;<a href=\"http://uk.lipsum.com/\">Українська</a>&nbsp;<a href=\"http://vi.lipsum.com/\">Tiếng Việt</a></div>\r\n<h1>Lorem Ipsum</h1>\r\n<h4>\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"</h4>\r\n<h5>\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"</h5>','20230601065333.png','test page','test','test2, test3, tes4, test','Public',NULL,'1','2023-06-01 06:55:15',NULL,'2023-06-01 01:23:33','2023-06-01 01:25:15'),(9,'Test 2','test-2','<p>This is test 2</p>','20230816090017.png',NULL,NULL,NULL,'Public',NULL,'2','2023-08-16 09:00:17',NULL,'2023-08-16 03:30:17','2023-08-16 03:30:17'),(10,'Home - Realestate','home-realestate','<div>@realestate_slider(realestatehome)</div>\r\n<section id=\"stats\" class=\"stats\">\r\n<div class=\"container position-relative aos-init aos-animate\" data-aos=\"fade-up\" data-aos-delay=\"100\">\r\n<div class=\"row gy-4\">\r\n<div class=\"col-lg-3 col-md-6\">\r\n<div class=\"stats-item text-center w-100 h-100\"><!-- WYSIWYG: Keep this content together --> <span class=\"purecounter\" data-purecounter-start=\"0\" data-purecounter-end=\"232\" data-purecounter-duration=\"0\">20</span>\r\n<p>Years</p>\r\n<p>hands on experience</p>\r\n</div>\r\n</div>\r\n<!-- End Stats Item -->\r\n<div class=\"col-lg-3 col-md-6\">\r\n<div class=\"stats-item text-center w-100 h-100\"><!-- WYSIWYG: Keep this content together --> <span class=\"purecounter\" data-purecounter-start=\"0\" data-purecounter-end=\"521\" data-purecounter-duration=\"0\">158</span>\r\n<p>lacs</p>\r\n<p>SQ FT OF CONSTRUCTION</p>\r\n</div>\r\n</div>\r\n<!-- End Stats Item -->\r\n<div class=\"col-lg-3 col-md-6\">\r\n<div class=\"stats-item text-center w-100 h-100\"><span class=\"purecounter\" data-purecounter-start=\"0\" data-purecounter-end=\"1453\" data-purecounter-duration=\"0\">8000+</span>\r\n<p>units</p>\r\n</div>\r\n</div>\r\n<!-- End Stats Item -->\r\n<div class=\"col-lg-3 col-md-6\">\r\n<div class=\"stats-item text-center w-100 h-100\"><span class=\"purecounter\" data-purecounter-start=\"0\" data-purecounter-end=\"32\" data-purecounter-duration=\"0\">50+</span>\r\n<p>RESIDENTIAL AND COMMERCIAL PROPERTY</p>\r\n</div>\r\n</div>\r\n<!-- End Stats Item --></div>\r\n</div>\r\n</section>\r\n<div class=\"row align-items-stretch justify-content-between features-item space about-company\">\r\n<div class=\"col-lg-6 d-flex align-items-center features-img-bg aos-init aos-animate\" data-aos=\"zoom-out\"><img class=\"img-fluid\" src=\"{{ asset(\'/realestate/images/office-buildings.png\') }}\" alt=\"\"></div>\r\n<div class=\"col-lg-6 d-flex justify-content-center flex-column aos-init aos-animate bg-img\" data-aos=\"fade-up\">\r\n<div class=\"heading-before d-flex align-items-center pb-4\">ABOUT COMPANY</div>\r\n<h3>Building Lifestyle Trends since 1960</h3>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,</p>\r\n<a class=\"btn btn-get-started align-self-start\" href=\"#\">Get Started</a></div>\r\n</div>','20230816102643.png',NULL,NULL,NULL,'Public',NULL,'2','2023-08-25 07:30:40',NULL,'2023-08-16 04:56:43','2023-08-25 02:00:40');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `popups`
--

DROP TABLE IF EXISTS `popups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `popups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `show_in` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = All Page, 1 = Home Page',
  `show_once` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = Every Time, 1 = Once',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 = InActive, 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `popups`
--

LOCK TABLES `popups` WRITE;
/*!40000 ALTER TABLE `popups` DISABLE KEYS */;
INSERT INTO `popups` VALUES (1,'Test','2311_Black_Friday-20230505064741.png',NULL,'1','1','0','2023-05-05 01:17:41','2023-08-09 04:38:29'),(2,'Test 2','Libido-Stimulate-20230505071942.jpg','<h3>This is a test popup!</h3>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>','0','0','0','2023-05-05 01:49:42','2023-05-10 01:21:20'),(3,'Test 3','MBA-20230505123544.svg',NULL,'0','0','0','2023-05-05 07:05:44','2023-05-05 07:14:20');
/*!40000 ALTER TABLE `popups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_title` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `purchase_url` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_gallery` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realestates`
--

DROP TABLE IF EXISTS `realestates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realestates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `layout` text DEFAULT NULL,
  `specification` text DEFAULT NULL,
  `surrounding` text DEFAULT NULL,
  `video_iframe` varchar(255) DEFAULT NULL,
  `map_iframe` varchar(255) DEFAULT NULL,
  `feature_image` varchar(255) NOT NULL,
  `banner_images` varchar(255) DEFAULT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realestates`
--

LOCK TABLES `realestates` WRITE;
/*!40000 ALTER TABLE `realestates` DISABLE KEYS */;
/*!40000 ALTER TABLE `realestates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1=Active, 0=InActive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site_title','Lorem Ipsum','1','2023-04-13 03:24:55','2023-04-13 03:24:55'),(2,'tagline','Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...','1','2023-04-13 03:24:55','2023-04-28 07:13:58'),(4,'search_engine_visibility','1','1','2023-04-13 03:24:55','2023-04-13 03:24:55'),(5,'header_logo','logo-20230508092438.svg','1','2023-04-13 03:24:55','2023-05-08 03:54:38'),(6,'footer_logo','footer-logo-20230508092438.svg','1','2023-04-13 03:29:24','2023-05-08 03:54:38'),(7,'home_page','10','1','2023-04-13 05:07:29','2023-08-17 01:50:33'),(8,'site_icon','site-icon-20230413113934.png','1','2023-04-13 05:58:07','2023-04-13 06:09:34'),(11,'header_content','{\"PromoLine\":[\"What is Lorem Ipsum?\"],\"Social\":{\"facebook\":\"https:\\/\\/facebook.com\",\"instagram\":null,\"whatsapp\":\"https:\\/\\/www.whatsapp.com\\/\",\"twitter\":null,\"pinterest\":null,\"youtube\":null,\"telegram\":\"https:\\/\\/telegram.org\\/\",\"phone\":\"917428723247\",\"email\":\"test@gmail.com\"}}','1','2023-04-14 04:21:24','2023-08-17 00:59:25'),(14,'header_layout','header','1','2023-04-17 01:50:46','2023-04-18 03:33:16'),(15,'footer_content','{\"menu\":[\"2\",\"3\"],\"address\":\"<p class=\\\"text-left\\\">Li.502, The Print Rooms&nbsp;<br>164-180 union street <br>SE1 0LH London<\\/p>\",\"copyright\":\"<div class=\\\"footer-copyright\\\">\\r\\n<div class=\\\"wrap\\\">\\r\\n<div class=\\\"copyright-section\\\">&copy; 2023 Company, Inc. All rights reserved<\\/div>\\r\\n<\\/div>\\r\\n<\\/div>\"}','1','2023-04-17 06:58:45','2023-08-17 00:59:49'),(16,'footer_layout','footer','1','2023-04-18 01:27:05','2023-04-18 04:50:27'),(17,'admin_email','shehbaz.adorncommerce@gmail.com','1','2023-04-28 07:13:11','2023-04-28 07:13:58'),(18,'contact_email','shehbaz.adorncommerce+laravel@gmail.com','1','2023-05-03 04:29:22','2023-05-03 04:46:52'),(19,'custom_css','.contact-banner {background-image: url(\"@app_url/images/Contact.svg\"); background-repeat: no-repeat; background-size: cover; background-position: center center; height:auto;padding:130px 0;} \r\n.pagination-custom .page-item.active .page-link {background-color: #b97c3b !important; border-color: #b97c3b !important; }\r\n .pagination-custom .page-link {color: #000;}\r\n.pagination-custom .page-link:hover {color: #b97c3b;}\r\n.pagination-custom .pagination li {padding-right: 8px;padding-left: 8px;}\r\n.pagination-custom .pagination li .page-link {border: none;font-weight: 600;} \r\n.pagination-custom nav .d-none p {display:none;} \r\n.Our-Vision {padding: 25px;background: url(/images/OurVision.svg);background-repeat: no-repeat;background-size: auto;text-align:center;background-position: center;}\r\n.our-team .container-lg .row .col-lg-4, .our-team .container-lg .row .col-lg-4 .icon-demo {position: relative;}\r\n.our-team .container-lg .row .col-lg-4  .text-center { position: absolute;bottom: -50px;left: 50%;transform: translate(-50%, -50%);background-color: white;padding: 15px 0;width: 60%;}\r\n.our-team .container-lg .row .col-lg-4  .text-center h3 {color: black;}\r\n.our-team .container-lg .row .col-lg-4  .text-center p {color: #8B8B8B;margin-bottom: 10px;} \r\n\r\n/*Gallery Page */\r\n\r\n.gallery-main img { max-width: 100%; } .pagination-custom .page-item.active .page-link { background-color: #b97c3b; border-color: #b97c3b; } .pagination-custom .page-link { color: #000; } .pagination-custom .page-link:hover { color: #b97c3b; } .pagination-custom .pagination li { padding-right: 8px; padding-left: 8px; } .pagination-custom .pagination li .page-link { border: none; font-weight: 600; } .tab-main .nav-item button { color: #000; font-size: 19px; } .tab-main .nav-item button.active { border: 1px solid black; background: none; color: #000; } .tab-main .nav-item button { padding: 10px; border: 1px solid transparent; }','1','2023-05-03 08:04:27','2023-05-16 07:49:51'),(20,'header_js','<script>console.log(\'This is a header JS\');</script>','0','2023-05-04 00:42:50','2023-05-10 06:32:18'),(21,'footer_js','<script>console.log(\'This is a footer JS\');</script>','0','2023-05-04 00:42:50','2023-05-04 01:16:56'),(22,'gdpr','<b>Notice: </b> We use cookies to provide necessary website functionality, improve your experience and analyze our traffic. By using our website, you agree to our Privacy Policy and our Cookies Policy.','1','2023-05-04 01:00:20','2023-05-04 01:36:51'),(23,'theme','2','1','2023-05-08 01:00:26','2023-08-24 05:16:23');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shortcodes`
--

DROP TABLE IF EXISTS `shortcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shortcodes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `value` varchar(150) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shortcodes`
--

LOCK TABLES `shortcodes` WRITE;
/*!40000 ALTER TABLE `shortcodes` DISABLE KEYS */;
INSERT INTO `shortcodes` VALUES (1,'Test Shortcode','<div>\r\n<div>\r\n<h2><a href=\"https://loremipsum.io/#what-is-lorem-ipsum\">What&nbsp;<em>is</em>&nbsp;Lorem Ipsum?</a></h2>\r\n<p>From its medieval origins to the digital era, learn everything there is to know about the ubiquitous&nbsp;<em>lorem ipsum</em> passage.</p>\r\n</div>\r\n</div>\r\n<div>\r\n<figure>\r\n<figcaption>\r\n<h4>MAGAZINE LAYOUT WITH LOREM IPSUM</h4>\r\n</figcaption>\r\n</figure>\r\n<div>\r\n<h3>HISTORY, PURPOSE AND USAGE</h3>\r\n<p><em>Lorem ipsum</em>, or&nbsp;<em>lipsum</em>&nbsp;as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s&nbsp;<em>De Finibus Bonorum et Malorum</em>&nbsp;for use in a type specimen book. It usually begins with:</p>\r\n<blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&rdquo;</blockquote>\r\n</div>\r\n</div>','test',NULL,'2023-04-26 05:30:30','2023-04-26 05:48:46'),(2,'CS','<p>In particular, the garbled words of&nbsp;<em>lorem ipsum</em>&nbsp;bear an unmistakable resemblance to sections 1.10.32&ndash;33 of Cicero\'s work, with the most notable passage excerpted below:</p>\r\n<blockquote>&ldquo;Neque porro quisquam est, qui&nbsp;<em>dolorem ipsum</em>&nbsp;quia&nbsp;<em>dolor sit amet, consectetur, adipisci velit, sed</em>&nbsp;quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.&rdquo;</blockquote>\r\n<p>A 1914 English translation by&nbsp;<a title=\"Wikipedia &ndash; Lorem Ipsum English Translation\" href=\"https://en.wikipedia.org/wiki/Lorem_ipsum#English_translation\" target=\"_blank\" rel=\"noopener\">Harris Rackham</a>&nbsp;reads:</p>\r\n<blockquote>&ldquo;Nor is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but occasionally circumstances occur in which toil and pain can procure him some great pleasure.&rdquo;</blockquote>\r\n<p>McClintock\'s eye for detail certainly helped narrow the whereabouts of&nbsp;<em>lorem ipsum\'s</em>&nbsp;origin, however, the &ldquo;how and when&rdquo; still remain something of a mystery, with competing theories and timelines.</p>','cs',NULL,'2023-04-26 05:50:03','2023-04-26 05:56:49');
/*!40000 ALTER TABLE `shortcodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `slides` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'Home','home','Basic','[{\"img\":\"home-20230427093839-0.png\",\"text\":\"<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;<\\/p>\"},{\"img\":\"home-20230427111833-1.jpg\",\"text\":\"<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;<\\/p>\"},{\"img\":\"home-20230427093839-2.jpg\",\"text\":\"<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;<\\/p>\"},{\"img\":\"home-20230427093839-3.png\",\"text\":\"<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;<\\/p>\"},{\"img\":\"home-20230427111833-4.png\",\"text\":\"<p>Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;<\\/p>\"},{\"img\":\"home-20230427115345-5.jpg\",\"text\":\"<p>Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;<\\/p>\"},{\"img\":\"home-20230427115345-6.png\",\"text\":\"<p>Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;<\\/p>\"},{\"img\":\"home-20230427115345-7.jpg\",\"text\":\"<p>Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;<\\/p>\"}]',NULL,'2023-04-27 04:08:39','2023-04-27 06:30:08'),(2,'Test','test','Basic','[{\"img\":\"test-20230427112110-0.jpg\",\"text\":null},{\"img\":\"test-20230427112110-1.jpg\",\"text\":null},{\"img\":\"test-20230427112110-2.png\",\"text\":null},{\"img\":\"test-20230427112110-3.png\",\"text\":null},{\"img\":\"test-20230427112110-4.png\",\"text\":null}]',NULL,'2023-04-27 05:51:10','2023-04-27 05:51:35'),(3,'Main','main','Animate','[{\"img\":\"main-20230508104051-0.svg\",\"text\":\"<h1 class=\\\"fw-bold mb-5 ls-6\\\">Lorem Ipsum<\\/h1>\\r\\n<p class=\\\"w-50 mx-auto text-secondary fa-sm\\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,<\\/p>\\r\\n<p><a class=\\\"btn btn-lg btn-dark mt-4\\\" href=\\\"#\\\">Learn more<\\/a><\\/p>\"},{\"img\":\"main-20230508104051-1.svg\",\"text\":\"<h1 class=\\\"fw-bold mb-5 ls-6\\\">Lorem Ipsum<\\/h1>\\r\\n<p class=\\\"w-50 mx-auto text-secondary fa-sm\\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,<\\/p>\\r\\n<p><a class=\\\"btn btn-lg btn-dark mt-4\\\" href=\\\"#\\\">Learn more<\\/a><\\/p>\"}]',NULL,'2023-04-27 06:28:24','2023-05-08 05:10:51'),(4,'RealEstate Main','realestatehome','RealEstate','[{\"img\":\"realestatehome-20230824112731-0.png\",\"text\":\"<div class=\\\"carousel-caption\\\">\\r\\n<h3>New York<\\/h3>\\r\\n<p>We love the Big Apple!<\\/p>\\r\\n<\\/div>\"},{\"img\":\"realestatehome-20230824112731-1.png\",\"text\":\"<div class=\\\"carousel-caption\\\">\\r\\n<h3>New York<\\/h3>\\r\\n<p>We love the Big Apple!<\\/p>\\r\\n<\\/div>\"},{\"img\":\"realestatehome-20230824112731-2.png\",\"text\":\"<div class=\\\"carousel-caption\\\">\\r\\n<h3>New York<\\/h3>\\r\\n<p>We love the Big Apple!<\\/p>\\r\\n<\\/div>\"}]',NULL,'2023-08-24 05:57:31','2023-08-24 05:57:31');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Tag1','tag1','2023-04-20 01:16:02','2023-04-20 01:16:02'),(2,'Tag2','tag2','2023-04-20 01:16:07','2023-04-20 01:16:07');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'John Deo','I enjoyed working with Prashant & AdronCommerce team, they are professional & 100% dedicated to their work and committed to assigned projects. Lorem ipsum may be used as a placeholder before final copy is available.','John Deo-20230508113141.svg',NULL,'2023-04-26 01:30:02','2023-05-08 06:01:41'),(2,'Hiram Fields','I enjoyed working with Prashant & AdronCommerce team, they are professional & 100% dedicated to their work and committed to assigned projects. Lorem ipsum may be used as a placeholder before final copy is available.','Hiram Fields-20230508113154.svg',NULL,'2023-04-26 01:36:54','2023-05-08 06:01:54'),(3,'Reagan Sloan','I enjoyed working with Prashant & AdronCommerce team, they are professional & 100% dedicated to their work and committed to assigned projects. Lorem ipsum may be used as a placeholder before final copy is available.','Reagan Sloan-20230508113204.svg',NULL,'2023-04-26 04:04:33','2023-05-08 06:02:04'),(4,'Olivia Vega','I enjoyed working with Prashant & AdronCommerce team, they are professional & 100% dedicated to their work and committed to assigned projects. Lorem ipsum may be used as a placeholder before final copy is available.','Olivia Vega-20230508113213.svg',NULL,'2023-04-26 04:05:07','2023-05-08 06:02:13'),(5,'Maile Marshall','I enjoyed working with Prashant & AdronCommerce team, they are professional & 100% dedicated to their work and committed to assigned projects. Lorem ipsum may be used as a placeholder before final copy is available.','Maile Marshall-20230508113221.svg',NULL,'2023-04-26 04:06:10','2023-05-08 06:02:21'),(6,'Violet Skinner','I enjoyed working with Prashant & AdronCommerce team, they are professional & 100% dedicated to their work and committed to assigned projects. Lorem ipsum may be used as a placeholder before final copy is available.','Violet Skinner-20230508113229.svg',NULL,'2023-04-26 04:07:12','2023-05-08 06:02:29');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_activities`
--

DROP TABLE IF EXISTS `user_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `login_time` timestamp NULL DEFAULT NULL,
  `logout_time` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_activities_user_id_foreign` (`user_id`),
  CONSTRAINT `user_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_activities`
--

LOCK TABLES `user_activities` WRITE;
/*!40000 ALTER TABLE `user_activities` DISABLE KEYS */;
INSERT INTO `user_activities` VALUES (1,1,'2023-05-26 03:12:46',NULL,'127.0.0.1','2023-05-26 02:12:57','2023-05-26 02:12:57','login'),(2,1,'2023-05-26 04:12:46',NULL,'127.0.0.1','2023-05-26 04:12:46','2023-05-26 04:12:46','login'),(3,1,'2023-05-26 04:28:44',NULL,'127.0.0.1','2023-05-26 04:28:44','2023-05-26 04:28:44','login'),(4,1,NULL,'2023-05-26 04:29:01','127.0.0.1','2023-05-26 04:29:01','2023-05-26 04:29:01','logout'),(5,1,'2023-05-26 05:20:49',NULL,'127.0.0.1','2023-05-26 05:20:49','2023-05-26 05:20:49','login'),(6,1,NULL,'2023-05-26 05:46:10','127.0.0.1','2023-05-26 05:46:10','2023-05-26 05:46:10','logout'),(7,1,'2023-05-26 05:46:16',NULL,'127.0.0.1','2023-05-26 05:46:16','2023-05-26 05:46:16','login'),(8,1,NULL,'2023-05-26 05:46:21','127.0.0.1','2023-05-26 05:46:21','2023-05-26 05:46:21','logout'),(9,1,'2023-05-26 05:46:24',NULL,'127.0.0.1','2023-05-26 05:46:24','2023-05-26 05:46:24','login'),(10,1,NULL,'2023-05-26 05:46:26','127.0.0.1','2023-05-26 05:46:26','2023-05-26 05:46:26','logout'),(11,1,'2023-05-26 05:46:29',NULL,'127.0.0.1','2023-05-26 05:46:29','2023-05-26 05:46:29','login'),(12,1,NULL,'2023-05-26 05:46:31','127.0.0.1','2023-05-26 05:46:31','2023-05-26 05:46:31','logout'),(13,1,'2023-05-26 05:46:41',NULL,'127.0.0.1','2023-05-26 05:46:41','2023-05-26 05:46:41','login'),(14,1,NULL,'2023-05-26 05:46:43','127.0.0.1','2023-05-26 05:46:43','2023-05-26 05:46:43','logout'),(15,1,'2023-05-28 23:51:28',NULL,'127.0.0.1','2023-05-28 23:51:28','2023-05-28 23:51:28','login'),(16,1,'2023-05-29 05:04:00',NULL,'127.0.0.1','2023-05-29 05:04:00','2023-05-29 05:04:00','login'),(17,1,'2023-05-29 23:39:53',NULL,'127.0.0.1','2023-05-29 23:39:53','2023-05-29 23:39:53','login'),(18,1,'2023-05-30 04:33:42',NULL,'127.0.0.1','2023-05-30 04:33:42','2023-05-30 04:33:42','login'),(19,1,'2023-05-31 05:54:37',NULL,'127.0.0.1','2023-05-31 05:54:37','2023-05-31 05:54:37','login'),(20,1,'2023-05-31 06:28:18',NULL,'127.0.0.1','2023-05-31 06:28:18','2023-05-31 06:28:18','login'),(21,1,'2023-06-01 00:23:45',NULL,'127.0.0.1','2023-06-01 00:23:45','2023-06-01 00:23:45','login'),(22,1,'2023-06-01 04:04:10',NULL,'127.0.0.1','2023-06-01 04:04:10','2023-06-01 04:04:10','login'),(23,1,'2023-06-02 00:46:24',NULL,'127.0.0.1','2023-06-02 00:46:24','2023-06-02 00:46:24','login'),(24,1,'2023-06-04 23:20:02',NULL,'127.0.0.1','2023-06-04 23:20:02','2023-06-04 23:20:02','login'),(25,1,'2023-06-05 03:55:39',NULL,'127.0.0.1','2023-06-05 03:55:39','2023-06-05 03:55:39','login'),(26,1,'2023-06-09 00:21:46',NULL,'127.0.0.1','2023-06-09 00:21:46','2023-06-09 00:21:46','login'),(27,1,'2023-06-09 06:32:05',NULL,'127.0.0.1','2023-06-09 06:32:05','2023-06-09 06:32:05','login'),(28,1,'2023-06-11 23:35:36',NULL,'127.0.0.1','2023-06-11 23:35:36','2023-06-11 23:35:36','login'),(29,1,'2023-06-12 06:17:38',NULL,'127.0.0.1','2023-06-12 06:17:38','2023-06-12 06:17:38','login'),(30,1,'2023-06-13 00:17:07',NULL,'127.0.0.1','2023-06-13 00:17:07','2023-06-13 00:17:07','login'),(31,1,'2023-06-14 04:30:58',NULL,'127.0.0.1','2023-06-14 04:30:58','2023-06-14 04:30:58','login'),(32,1,'2023-06-15 03:25:43',NULL,'127.0.0.1','2023-06-15 03:25:43','2023-06-15 03:25:43','login'),(33,1,'2023-06-16 00:53:59',NULL,'127.0.0.1','2023-06-16 00:53:59','2023-06-16 00:53:59','login'),(34,1,'2023-06-16 05:16:35',NULL,'127.0.0.1','2023-06-16 05:16:35','2023-06-16 05:16:35','login'),(35,1,'2023-06-19 00:06:18',NULL,'127.0.0.1','2023-06-19 00:06:18','2023-06-19 00:06:18','login'),(36,1,'2023-06-19 03:40:04',NULL,'127.0.0.1','2023-06-19 03:40:04','2023-06-19 03:40:04','login'),(37,1,'2023-06-19 23:35:14',NULL,'127.0.0.1','2023-06-19 23:35:14','2023-06-19 23:35:14','login'),(38,1,'2023-06-20 01:49:50',NULL,'127.0.0.1','2023-06-20 01:49:50','2023-06-20 01:49:50','login'),(39,1,'2023-06-20 04:26:45',NULL,'127.0.0.1','2023-06-20 04:26:45','2023-06-20 04:26:45','login'),(40,1,'2023-06-21 00:26:47',NULL,'127.0.0.1','2023-06-21 00:26:47','2023-06-21 00:26:47','login'),(41,1,'2023-06-22 03:49:37',NULL,'127.0.0.1','2023-06-22 03:49:37','2023-06-22 03:49:37','login'),(42,1,'2023-07-23 23:46:57',NULL,'127.0.0.1','2023-07-23 23:46:57','2023-07-23 23:46:57','login'),(43,1,'2023-08-09 02:09:59',NULL,'127.0.0.1','2023-08-09 02:09:59','2023-08-09 02:09:59','login'),(44,1,'2023-08-10 00:57:40',NULL,'127.0.0.1','2023-08-10 00:57:40','2023-08-10 00:57:40','login'),(45,1,'2023-08-10 23:47:57',NULL,'127.0.0.1','2023-08-10 23:47:57','2023-08-10 23:47:57','login'),(46,1,'2023-08-11 02:08:11',NULL,'127.0.0.1','2023-08-11 02:08:11','2023-08-11 02:08:11','login'),(47,1,'2023-08-11 05:03:18',NULL,'127.0.0.1','2023-08-11 05:03:18','2023-08-11 05:03:18','login'),(48,1,'2023-08-14 00:06:58',NULL,'127.0.0.1','2023-08-14 00:06:58','2023-08-14 00:06:58','login'),(49,1,'2023-08-15 23:58:39',NULL,'127.0.0.1','2023-08-15 23:58:39','2023-08-15 23:58:39','login'),(50,1,'2023-08-16 04:56:58',NULL,'127.0.0.1','2023-08-16 04:56:58','2023-08-16 04:56:58','login'),(51,1,'2023-08-17 00:18:54',NULL,'127.0.0.1','2023-08-17 00:18:54','2023-08-17 00:18:54','login'),(52,1,'2023-08-24 03:27:27',NULL,'127.0.0.1','2023-08-24 03:27:27','2023-08-24 03:27:27','login'),(53,1,'2023-08-25 00:04:42',NULL,'127.0.0.1','2023-08-25 00:04:42','2023-08-25 00:04:42','login'),(54,1,'2023-08-25 05:08:53',NULL,'127.0.0.1','2023-08-25 05:08:53','2023-08-25 05:08:53','login');
/*!40000 ALTER TABLE `user_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','shehbaz.adorncommerce@gmail.com',NULL,'$2y$10$4PoJL/WglHwkSBeZIBE3BeeeVoZAz5HLIuCwwxfNg9OtkWH1EHdRa',0,'jmYsaaKhp2CFX3uVb1mh1oJI5w3cYOtg67CKz32d7lpaGQmSswg0IjGzVHV2','2023-04-11 00:49:19','2023-05-09 04:59:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-25 16:27:29
