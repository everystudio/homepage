


DROP TABLE IF EXISTS `ms_aqb_chara`;
CREATE TABLE `ms_aqb_chara` (
  `id` int(10) unsigned NOT NULL COMMENT 'キャラクターのID',

  `name` varchar(64) DEFAULT NULL COMMENT 'ゲームで利用する名前',
  `full_name` varchar(64) DEFAULT NULL COMMENT 'フルネーム',

  `sex` tinyint DEFAULT NULL COMMENT '性別',
  `birthday` datetime NOT NULL COMMENT '誕生日',
  `postalnumber` varchar(7) DEFAULT NULL COMMENT '郵便番号',

  `prefecture` tinyint DEFAULT NULL COMMENT '都道府県',
  `municipality` varchar(16) DEFAULT NULL COMMENT '市区町村',

  `address01` varchar(255) DEFAULT NULL COMMENT '住所その1(町域)',
  `address02` varchar(255) DEFAULT NULL COMMENT '住所その2(番地)',
  `address03` varchar(255) DEFAULT NULL COMMENT '住所その3(建物の名前など)',

  `phone_number` varchar(12) DEFAULT NULL COMMENT '電話番号',
  `driver_license` tinyint NOT NULL COMMENT '運転免許(0:持ってない 1:持っている)',

  `secret_question` int(10) unsigned NOT NULL COMMENT '秘密の質問(番号)',
  `secret_answer` varchar(255) DEFAULT NULL COMMENT '秘密の質問の回答',
  `auto_login_key` varchar(255) DEFAULT NULL COMMENT '自動ログイン用',

  `lastlogin`  datetime  DEFAULT '1970-01-01 00:00:00',
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY (`uid`),
  UNIQUE KEY (`mail_address`),

  KEY index1 ( `uid` )

) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `changeMail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `changeMail` (
  `id` int(10) unsigned NOT NULL COMMENT 'personalInfoのid',
  `mail_address_new` varchar(255) NOT NULL COMMENT '変更後のメールアドレス',
  `token` varchar(255) NOT NULL COMMENT '確認用トークン',
  `password` varchar(255) NOT NULL COMMENT '変更後のメールアドレス',

  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,

  PRIMARY KEY (`id`),
  UNIQUE KEY (`mail_address_new`)


) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
















