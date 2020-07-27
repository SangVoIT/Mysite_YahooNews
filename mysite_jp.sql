-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-07-24 06:05:12
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.2.30

DROP DATABASE IF EXISTS mysite;
CREATE DATABASE mysite;
USE mysite;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `mysite`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `loginid` text NOT NULL,
  `password` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `rule_cd` text NOT NULL,
  `display_name` int(11) NOT NULL,
  `email` int(11),
  `create_date` date,
  `create_id` int(11),
  `update_date` date,
  `update_id` int(11),
  `delete_flg` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `account`(`id`, `loginid`, `password`, `first_name`, `last_name`, `display_name`, `rule_cd`, `email`, `delete_flg`) 
VALUES ( 1, 'admin01', '12345', 'SANG', 'VO',    'admin01', '1', '12345@gmail.com', 0), 
		(2, 'admin02', '12345', '陽翔', '秋鹿',  'admin02', '1', '12345@gmail.com', 0), 
		(3, 'admin03', '12345', '陽葵', '愛山',  'admin03', '1', '12345@gmail.com', 0), 
		(4, 'user01',  '12345', '新',   '阿内',  'user 01', '0', '12345@gmail.com', 0), 
		(5, 'user02',  '12345', '杏',   '青石',  'user 02', '0', '12345@gmail.com', 0), 
		(6, 'user03',  '12345', '紬',   '青石',  'user 03', '0', '12345@gmail.com', 0);

-- --------------------------------------------------------
--
-- テーブルの構造 `news_code`
--
CREATE TABLE `news_type` (
  `type_cd` varchar(5) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `num_of_news` int(11),
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `create_id` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_id` int(11) DEFAULT NULL,
  `delete_flg` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `news_type`(`type_cd`, `type_name`, `num_of_news`, `delete_flg`) 
VALUES ('0001', 'トップ', 0, 0), 
		('0002', '国内', 0, 0), 
		('0003', '経済', 0, 0), 
		('0004', 'IT', 0, 0), 
		('0005', '科学', 0, 0),
		('0006', 'ランキング', 0, 0);

-- --------------------------------------------------------
--
-- テーブルの構造 `news_source`
--
CREATE TABLE `news_source` (
  `source_cd` varchar(5) NOT NULL,
  `source_name` varchar(255) NOT NULL,
  `num_of_news` int(11),
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `create_id` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_id` int(11) DEFAULT NULL,
  `delete_flg` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `news_source`(`source_cd`, `source_name`, `num_of_news`, `delete_flg`) 
VALUES ('0001', 'ABEMA TIMES', 0, 0), 
		('0002', 'FRIDAY', 0, 0), 
		('0003', 'クランクイン！', 0, 0), 
		('0004', 'doda', 0, 0), 
		('0005', 'AERA dot.', 0, 0),
		('0006', 'LIMO', 0, 0);


-- --------------------------------------------------------
--
-- テーブルの構造 `news_infor`
--
CREATE TABLE `news_infor` (
  `id` int(11) NOT NULL,
  `news_type` varchar(5) NOT NULL,
  `news_source` varchar(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cotent` text NOT NULL,
  `image` longtext,
  `view_number` int(11),
  `vote_star` int(11),
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `create_id` int(11) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_id` int(11) DEFAULT NULL,
  `delete_flg` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `news_infor` (`id`, `news_type`, `news_source`, `title`, `cotent`, `image`, `view_number`, `vote_star`, `create_date`, `create_id`, `update_date`, `update_id`, `delete_flg`) VALUES
(1, '0001', '0001', '東京都で新たに360人台の感染を確認 初の300人超え', '関係者によると、東京都できょう新たに360人台の新型コロナウイルスへの感染者が確認された。1日での感染者数が300人を超えるのは初となる。これまで最も多かったのは今月17日の293人だった。（ANNニュース）', 'default_1.png', 10, 1, '2020-07-23', 0, null, 0, 0),
(2, '0001', '0004', '高橋ユウ、「最近よく顔をつかんでくる」長男との仲睦まじい姿に反響「癒される光景」', 'モデルでタレントの高橋ユウが23日、自身のInstagramを更新。今年1月に生まれた息子との仲睦まじい姿を公開した。

【映像】高橋ユウ、長男との仲睦まじい様子

　今回、高橋は「最近よく顔をつかんでくる」とコメントを添え、離乳食を始めたばかりの長男と見つめ合う写真を投稿。そして「命は尊い、儚い、でも強い。この子の命をずっとずっと守ります」と、子どもの成長を願っての親心をつづりつつ、「与えてくれたものを大切に、繋げていきたい。それがある限り、その人は生き続ける。無理に気持ちに整理をつかせなくていい。思い出を大切にします。そして沢山ありがとう、と春馬君に伝えました ゆっくり、のびのびと」と、18日に亡くなった三浦春馬さんへのメッセージも明かした。', 'default_1.png', 10, 1, '2020-07-23', 0, null, 0, 0),
(3, '0002', '0002', 'へずまりゅうの両親が胸中を吐露「それでもこの地で生きていくしかない」', 'これまで、へずまは自身のユーチューブチャンネルで、有名ユーチューバーに対して動画の共演を迫り無理やり押しかける「凸撃」（とつげき）を繰り返してきた。凸撃先から弁護士を通じて警告書を送られることもあり、訴訟も複数抱えているという。また沖縄では昨年焼失した首里城の再建を願う寄せ書きに落書きをするなど、悪質な迷惑行為を続けてきた。

　今年の5月には、「店の商品、会計前に食ってやったぜー」というタイトルをつけて動画を投稿。愛知県内のスーパーで会計前の魚の切り身を食べる姿を公開していた。その後、店から通報があり、7月11日に窃盗の容疑で逮捕された。

　『週刊女性』は世間を騒がせ続ける男のルーツを知るために、山口県にあるへずまの実家を訪ねた。そこには、憔悴しきった様子の両親の姿が――。

父親はショックのあまり職場復帰できず
「逮捕されるまで、息子がユーチューバーをやっていたことさえ知りませんでした」
　
　そう語るのは、へずまの父親。「メディアの取材に応じるのはこの1度限り」と断った上で、取材に応じてくれた。

「山口県から東京へ上京していたことさえ聞いていなかったんです。最近は県内で居酒屋のバイトをしながら、新しい就職先を探していると言っていました」
　
　両親が初めて息子の本当の姿を知ったのは、今回の逮捕のニュースだったという。

「最後に帰ってきたのは6月の終わり。その後、連絡がまったくつかなくなり、心配で警察に相談しようか考えていた矢先の出来事でした」
　
　へずまは7月上旬から、新型コロナウイルスに感染しながらマスクもせずに県をまたぐ移動を繰り返した。山口県知事からは「なんてことをしてくれたのか」と名指しで批判。立ち寄り先の飲食店や観光地で休業が相次ぎ、県にはへずまと接触して感染を心配した人の相談が700件以上も殺到したという。

　さらに、逮捕後もマスク着用を拒み、警察官も感染し、移送先の拘置所でもコロナを撒き散らした。
　
　息子の傍若無人な迷惑行為を知った両親は青ざめる。

「これだけ人様に迷惑をかけた。実家が特定されて、いたずら被害に遭うかもしれません。隣近所や職場には“あれはうちの息子です”と謝罪して回りました」
　
　ショックのあまり、父親は逮捕報道から10日間過ぎた今も職場復帰できていないという。

「夫婦で涙も枯れるほど泣きましたが、私たちにも生活があります。たとえ周囲に白い目で見られようが、この土地に根を張って生きていくしか生きる術（すべ）はないんです」', 'default_2.png', 10, 2, '2020-07-23', 0, null, 0, 0),
(4, '0003', '0003', '週刊女性PRIME', '「悩みすぎて、首を吊ることも考えました……」
　
　沈痛な思いを打ち明けるのは、あの“迷惑系ユーチューバー”の両親だ。
　
　息子の名は、原田将大（しょうた）容疑者（29歳）。「へずまりゅう」（以下、へずま）の名でユーチューブに投稿を続け、理不尽な迷惑行為を続けている人物である。', 'default_2.png', 10, 3, '2020-07-23', 0, null, 0, 0),
(5, '0001', '0001', '元歌舞伎町ホストのユーチューバーが同居女性を刺殺したヤバイ背景', '「早く、早く来て！　助けてください！」

異様な通報だった。７月15日朝７時ごろ、わずか４分間の間に女性が悲痛な叫び声をあげながら４回も110番。警察官が現場の東京・板橋区のマンションに駆けつけると、女性は玄関で血だらけになり倒れていたーー。', 'default_1.png', 10, 4, '2020-07-23', 0, null, 0, 0),
(6, '0002', '0002', '新垣結衣、笑顔で手を振る姿にファンもメロメロ「かわいすぎる」', '女優の新垣結衣が所属するレプロエンタテインメントの公式ツイッターが20日に更新。新垣がベッドに座り、カメラに向かって笑顔で手を振る姿に、ファンからは「ほんとに可愛い」「かわいすぎる」などの声があがっている。
', 'default_1.png', 10, 5, '2020-07-23', 0, null, 0, 0);


-- --------------------------------------------------------
--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `news_infor`
--
ALTER TABLE `news_infor`
  ADD PRIMARY KEY (`id`);


--
-- テーブルのインデックス `news_type`
--
ALTER TABLE `news_type`
  ADD PRIMARY KEY (`type_cd`);
  
--
-- テーブルのインデックス `news_source`
--
ALTER TABLE `news_source`
  ADD PRIMARY KEY (`source_cd`);
  
--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルのAUTO_INCREMENT `news_infor`
--
ALTER TABLE `news_infor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;


--
-- ダンプしたテーブルのFOREIGN KEY
--
ALTER TABLE news_infor
    ADD CONSTRAINT fk_foreign_news_type
    FOREIGN KEY (news_type)
    REFERENCES news_type(type_cd);
	
ALTER TABLE news_infor
    ADD CONSTRAINT fk_foreign_news_source
    FOREIGN KEY (news_source)
    REFERENCES news_source(source_cd);
	

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
