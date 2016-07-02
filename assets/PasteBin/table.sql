CREATE TABLE IF NOT EXISTS `Paste_Bin` (
  `id` decimal(21,0) NOT NULL,
  `google_id` decimal(21,0) NOT NULL,
  `date` varchar(60) NOT NULL,
  `text` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;