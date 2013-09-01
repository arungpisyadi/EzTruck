CREATE TABLE user (
    user_id int(3) not null auto_increment,
    user_name varchar(255) not null,
    user_pass varchar(255) not null,
    add_user enum('N', 'Y') not null default 'N',
    edit_user enum('N', 'Y') not null default 'N',
    del_user enum('N', 'Y') not null default 'N',
    add_kary enum('N', 'Y') not null default 'N',
    edit_kary enum('N', 'Y') not null default 'N',
    del_kary enum('N', 'Y') not null default 'N',
    add_truk enum('N', 'Y') not null default 'N',
    edit_truk enum('N', 'Y') not null default 'N',
    del_truk enum('N', 'Y') not null default 'N',
    add_inv enum('N', 'Y') not null default 'N',
    edit_inv enum('N', 'Y') not null default 'N',
    del_inv enum('N', 'Y') not null default 'N',
    add_cust enum('N', 'Y') not null default 'N',
    edit_cust enum('N', 'Y') not null default 'N',
    del_cust enum('N', 'Y') not null default 'N',
    add_buy enum('N', 'Y') not null default 'N',
    edit_buy enum('N', 'Y') not null default 'N',
    del_buy enum('N', 'Y') not null default 'N',
    add_part enum('N', 'Y') not null default 'N',
    edit_part enum('N', 'Y') not null default 'N',
    del_part enum('N', 'Y') not null default 'N',
    add_kont enum('N', 'Y') not null default 'N',
    edit_kont enum('N', 'Y') not null default 'N',
    del_kont enum('N', 'Y') not null default 'N',
    add_sup enum('N', 'Y') not null default 'N',
    edit_sup enum('N', 'Y') not null default 'N',
    del_sup enum('N', 'Y') not null default 'N',
    add_kwit enum('N', 'Y') not null default 'N',
    edit_kwit enum('N', 'Y') not null default 'N',
    del_kwit enum('N', 'Y') not null default 'N',
    add_notes enum('N', 'Y') not null default 'N',
    edit_notes enum('N', 'Y') not null default 'N',
    del_notes enum('N', 'Y') not null default 'N',
    primary key (user_id)
)  ENGINE=MyISAM;

INSERT INTO user(user_id,user_name,user_pass,add_user,edit_user,del_user,add_kary,edit_kary,del_kary,add_truk,edit_truk,del_truk,add_inv,edit_inv,del_inv,add_cust,edit_cust,del_cust,add_buy,edit_buy,del_buy,add_part,edit_part,del_part,add_kont,edit_kont,del_kont,add_sup,edit_sup,del_sup,add_kwit,edit_kwit,del_kwit,add_notes,edit_notes,del_notes) VALUES (001,'admin','admin','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y');

CREATE  TABLE karyawan (

  `kary_id` INT NOT NULL ,

  `kary_nama_1` VARCHAR(45) NOT NULL ,

  `kary_nama_2` VARCHAR(45) NOT NULL ,

  `kary_alamat_1` VARCHAR(45) NULL ,

  `kary_alamat_2` VARCHAR(45) NULL ,

  `kary_tgl_lahir` DATE NOT NULL ,

  `kary_no_ktp` VARCHAR(45) NOT NULL ,

  `kary_ktp_aktif` DATE NOT NULL ,

  `kary_no_sim` VARCHAR(45) NOT NULL ,

  `kary_jenis_sim` VARCHAR(45) NOT NULL ,

  `kary_sim_aktif` DATE NOT NULL ,

  `kary_telp` VARCHAR(45) NOT NULL ,

  `kary_hp` VARCHAR(45) NOT NULL ,

  PRIMARY KEY (`kary_id`) )

ENGINE = MyISAM

COMMENT = 'data karyawan';
CREATE  TABLE customer (

  `cust_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,

  `cust_name` VARCHAR(255) NOT NULL ,

  `cust_init` VARCHAR(45) NOT NULL ,

  `cust_cp` VARCHAR(45) NOT NULL ,

  `cust_add_1` VARCHAR(45) NOT NULL ,

  `cust_add_2` VARCHAR(45) NULL ,

  `cust_telp_1` VARCHAR(45) NOT NULL ,

  `cust_telp_2` VARCHAR(45) NULL ,

  `cust_email` VARCHAR(45) NULL ,

  PRIMARY KEY (`cust_id`) )

ENGINE = MyISAM;
CREATE  TABLE truck (

  `truk_id` INT NOT NULL AUTO_INCREMENT ,

  `truk_merk` VARCHAR(45) NULL ,

  `truk_tipe` VARCHAR(45) NULL ,

  `truk_no_polisi` VARCHAR(45) NULL ,

  `truk_no_rangka` VARCHAR(45) NULL ,

  `truk_no_mesin` VARCHAR(45) NULL ,

  `truk_ins` VARCHAR(45) NULL ,

  `truk_no_ins` VARCHAR(45) NULL ,

  `truk_ins_jtempo` VARCHAR(45) NULL ,

  PRIMARY KEY (`truk_id`) )

ENGINE = MyISAM;
CREATE  TABLE suplier (

  `suplier_id` INT NOT NULL AUTO_INCREMENT ,

  `suplier_name` VARCHAR(45) NOT NULL ,

  `suplier_cp` VARCHAR(45) NULL ,

  `suplier_telp_1` VARCHAR(45) NOT NULL ,

  `suplier_telp_2` VARCHAR(45) NULL ,

  `suplier_fax` VARCHAR(45) NULL ,

  PRIMARY KEY (`suplier_id`) )

ENGINE = MyISAM;
CREATE  TABLE order_main (

  `order_id` INT NOT NULL AUTO_INCREMENT ,

  `cust_id` INT NOT NULL ,

  `order_tipe` VARCHAR(45) NULL ,

  `order_rute_dari` VARCHAR(45) NULL ,

  `order_rute_tujuan` VARCHAR(45) NULL ,

  `order_barang_nama` VARCHAR(255) NOT NULL ,

  `order_barang_jumlah` VARCHAR(45) NOT NULL ,

  `order_barang_satuan` VARCHAR(45) NOT NULL ,

  `order_biaya_satuan` INT NULL ,

  `order_biaya_total` VARCHAR(45) NOT NULL ,

  PRIMARY KEY (`order_id`) ,

  UNIQUE INDEX `cust_id_UNIQUE` (`cust_id` ASC) )

ENGINE = MyISAM;
CREATE  TABLE do_id (

  `do_id` INT NOT NULL AUTO_INCREMENT ,

  `do_date` DATE NOT NULL ,

  PRIMARY KEY (`do_id`) )

ENGINE = MyISAM;
CREATE  TABLE do_temp (

  `do_id` INT NOT NULL ,

  `do_no_urut` INT NOT NULL AUTO_INCREMENT ,

  `order_id` INT NOT NULL ,

  `cust_id` INT NOT NULL ,

  PRIMARY KEY (`do_no_urut`) ,

  UNIQUE INDEX `do_no_urut_UNIQUE` (`do_no_urut` ASC) )

ENGINE = MyISAM;
CREATE  TABLE do_main (

  `do_id` INT NOT NULL ,

  `do_no_urut` INT NULL ,

  `order_id` INT NOT NULL ,

  `cust_id` INT NOT NULL ,

  `do_arah` VARCHAR(45) NOT NULL ,

  `kary_id` INT NOT NULL ,

  PRIMARY KEY (`do_id`) )

ENGINE = MyISAM;
CREATE  TABLE kontrak (

  `kontrak_id` INT NOT NULL AUTO_INCREMENT ,

  `cust_id` INT NOT NULL ,

  `kontrak_barang` VARCHAR(255) NULL ,

  `kontrak_tipe` VARCHAR(255) NULL ,

  `kontrak_satuan` VARCHAR(45) NULL ,

  `kontrak_tarif` INT NULL ,

  PRIMARY KEY (`kontrak_id`) ,

  UNIQUE INDEX `kontrak_id_UNIQUE` (`kontrak_id` ASC) )

ENGINE = MyISAM;
CREATE  TABLE invoice (

  `inv_id` INT NOT NULL AUTO_INCREMENT ,

  `order_id` INT NOT NULL ,

  `cust_id` INT NOT NULL ,

  `inv_tag` INT NOT NULL ,

  PRIMARY KEY (`inv_id`) )

ENGINE = MyISAM;

CREATE  TABLE order_status (

  `order_id` INT NOT NULL ,

  `order_status` VARCHAR(45) NULL ,

  `order_info` VARCHAR(45) NULL ,

  `order_pen` INT NULL ,

  PRIMARY KEY (`order_id`) )

ENGINE = MyISAM;

CREATE  TABLE invoice_status (

  `inv_id` INT NOT NULL ,

  `inv_status` ENUM('P','NP') NOT NULL ,

  `order_id` INT NOT NULL ,

  `order_pen` INT NULL ,

  `order_pen_note` LONGTEXT NULL ,

  PRIMARY KEY (`inv_id`) )

ENGINE = MyISAM;

CREATE  TABLE inkaso (

  `kwit_id` INT NOT NULL ,

  `kwit_no_urut` INT NOT NULL ,

  `inv_id` INT NOT NULL ,

  `kwit_date` DATE NOT NULL ,

  `kwit_tagihan` INT NOT NULL ,

  `kwit_pot` INT NULL ,

  `kwit_pen` INT NULL ,

  `kwit_byr` INT NOT NULL ,

  PRIMARY KEY (`kwit_id`) )

ENGINE = MyISAM;

CREATE  TABLE virtual_control (

  `truk_id` INT NOT NULL ,

  `truk_status` ENUM('R','M','U','O') NULL ,

  `truk_arah` ENUM('B','P') NULL ,

  `truk_cur_act` VARCHAR(45) NULL ,

  `truk_pos` VARCHAR(45) NULL ,

  PRIMARY KEY (`truk_id`) )

ENGINE = MyISAM;

CREATE  TABLE truk_kategori (

  `truk_kategori_id` INT NOT NULL AUTO_INCREMENT ,

  `truk_kategori_name` VARCHAR(45) NULL ,

  `truk_kategori_desc` VARCHAR(255) NULL ,

  PRIMARY KEY (`truk_kategori_id`) )

ENGINE = MyISAM;

CREATE  TABLE inv_temp (

  `inv_id` INT NOT NULL ,

  `inv_no_urut` INT NOT NULL AUTO_INCREMENT ,

  `order_id` INT NOT NULL ,

  `order_biaya_total` INT NOT NULL ,

  `inv_total_tagihan` INT NOT NULL ,

  PRIMARY KEY (`inv_no_urut`) )

ENGINE = MyISAM;

CREATE  TABLE part (

  `part_id` INT NOT NULL AUTO_INCREMENT ,

  `part_name` VARCHAR(45) NULL ,

  `part_stock` INT NULL ,

  `part_harga_beli` INT NULL ,

  `part_harga_jual` INT NULL ,

  `part_nick` VARCHAR(45) NULL ,

  PRIMARY KEY (`part_id`) )

ENGINE = MyISAM;

CREATE  TABLE beli (

  `beli_id` INT NOT NULL ,

  `beli_no_urut` VARCHAR(45) NOT NULL ,

  `beli_nama_brg` VARCHAR(45) NOT NULL ,

  `beli_jumlah_brg` INT NOT NULL ,

  `beli_hrg_satuan` INT NOT NULL ,

  `beli_hrg_total` INT NOT NULL ,

  `suplier_id` INT NOT NULL ,

  `beli_tempo` DATE NOT NULL ,

  `beli_tgl` DATE NOT NULL ,

  PRIMARY KEY (`beli_id`) )

ENGINE = MyISAM;

CREATE  TABLE beli_temp (

  `beli_no_urut` INT NOT NULL ,

  `beli_nama_brg` VARCHAR(45) NOT NULL ,

  `beli_jumlah_brg` INT NOT NULL ,

  `beli_hrg_satuan` INT NOT NULL ,

  `beli_hrg_total` INT NOT NULL ,

  `suplier_id` INT NOT NULL ,

  PRIMARY KEY (`beli_no_urut`) )

ENGINE = MyISAM;

CREATE  TABLE beli_id (

  `beli_id` INT NOT NULL AUTO_INCREMENT ,

  `supliler_id` INT NOT NULL ,

  `beli_total` INT NOT NULL ,

  PRIMARY KEY (`beli_id`) )

ENGINE = MyISAM;

CREATE  TABLE income (

  `inc_id` INT NOT NULL AUTO_INCREMENT ,

  `inc_desc` VARCHAR(45) NOT NULL ,

  `inc_ref` INT NOT NULL ,

  `inc_ammount` INT NOT NULL ,

  PRIMARY KEY (`inc_id`) )

ENGINE = MyISAM;

CREATE  TABLE payroll (

  `gaji_id` INT NOT NULL AUTO_INCREMENT ,

  `kary_id` INT NULL ,

  `gaji_paid` INT NULL ,

  `gaji_pot` INT NULL ,

  `gaji_thp` INT NULL ,

  `gaji_bulan` VARCHAR(45) NULL ,

  `gaji_tahun` INT NULL ,

  PRIMARY KEY (`gaji_id`) )

ENGINE = MyISAM;

CREATE  TABLE outcome (

  `out_id` INT NOT NULL AUTO_INCREMENT ,

  `out_desc` VARCHAR(45) NULL ,

  `out_ref` INT NULL ,

  `out_ammount` INT NULL ,

  `out_date` DATE NULL ,

  `out_cat` VARCHAR(45) NULL ,

  `out_bulan` VARCHAR(45) NULL ,

  PRIMARY KEY (`out_id`) )

ENGINE = MyISAM;

CREATE  TABLE truck_main (

  `truk_main_id` INT NOT NULL ,

  `truk_id` INT NOT NULL ,

  `part_id` INT NULL ,

  `truk_main_desc` VARCHAR(45) NULL ,

  `truk_main_cost` INT NULL ,

  `kary_id` INT NULL ,

  PRIMARY KEY (`truk_main_id`) )

ENGINE = MyISAM;

CREATE  TABLE inv_id (

  `inv_id` INT NOT NULL AUTO_INCREMENT ,

  `inv_date` DATE NOT NULL ,

  PRIMARY KEY (`inv_id`) )

ENGINE = MyISAM;

CREATE  TABLE version (

  `main_version` INT NOT NULL ,

  `sub_version` INT NULL ,

  `ch_version` INT NULL )

ENGINE = MyISAM;

CREATE  TABLE company (

  `company_name` VARCHAR(255) NOT NULL ,

  `company_addr_1` VARCHAR(255) NULL ,

  `company_addr_2` VARCHAR(255) NULL ,

  `company_telp_1` VARCHAR(45) NULL ,

  `company_telp_2` VARCHAR(45) NULL ,

  `company_fax` VARCHAR(45) NULL ,

  `company_email` VARCHAR(45) NULL ,

  `company_website` VARCHAR(255) NULL )

ENGINE = MyISAM;

CREATE  TABLE license (

  `idlicense` INT NOT NULL ,

  `customer` VARCHAR(45) NULL ,

  `ser_no` VARCHAR(15) NULL ,

  `type` VARCHAR(45) NULL ,

  PRIMARY KEY (`idlicense`) )

ENGINE = MyISAM;


ALTER TABLE customer CHANGE COLUMN `cust_id` `cust_id` INT(10) UNSIGNED NOT NULL DEFAULT 1100000  ;
ALTER TABLE user ADD COLUMN `user_stat` VARCHAR(45) NULL  AFTER `del_notes` ;
ALTER TABLE income ADD COLUMN `inc_date` DATE NOT NULL  AFTER `inc_ammount` , CHANGE COLUMN `inc_ref` `inc_ref` INT(11) NULL  ;
ALTER TABLE income ADD COLUMN `inc_cat` VARCHAR(45) NOT NULL  AFTER `inc_date` ;
ALTER TABLE income ADD COLUMN `inc_bulan` VARCHAR(45) NULL  AFTER `inc_cat` ;
ALTER TABLE beli_temp CHANGE COLUMN `beli_no_urut` `beli_no_urut` INT(11) NOT NULL AUTO_INCREMENT  ;
ALTER TABLE beli CHANGE COLUMN `beli_no_urut` `beli_no_urut` INT NOT NULL  ;
ALTER TABLE invoice ADD COLUMN `inv_date` DATE NOT NULL  AFTER `inv_tag` , ADD COLUMN `inv_due_date` DATE NULL  AFTER `inv_date` ;
ALTER TABLE invoice CHANGE COLUMN `inv_id` `inv_id` INT(11) NOT NULL  ;
ALTER TABLE invoice ADD COLUMN `inv_no_urut` INT NOT NULL  AFTER `inv_due_date` ;
ALTER TABLE karyawan ADD COLUMN `kary_pos` VARCHAR(45) NOT NULL  AFTER `kary_hp` ;
ALTER TABLE truck CHANGE COLUMN `truk_id` `truk_id` INT(11) NOT NULL DEFAULT 7100000  ;
ALTER TABLE income CHANGE COLUMN `inc_id` `inc_id` INT(11) NOT NULL DEFAULT 2100000  ;
ALTER TABLE inkaso CHANGE COLUMN `kwit_id` `kwit_id` INT(11) NOT NULL DEFAULT 2200000  ;
ALTER TABLE do_id CHANGE COLUMN `do_id` `do_id` INT(11) NOT NULL DEFAULT 3200000  ;
ALTER TABLE beli_id CHANGE COLUMN `beli_id` `beli_id` INT(11) NOT NULL DEFAULT 4200000  ;
ALTER TABLE inv_id CHANGE COLUMN `inv_id` `inv_id` INT(11) NOT NULL DEFAULT 5100000  ;
ALTER TABLE karyawan CHANGE COLUMN `kary_id` `kary_id` INT(11) NOT NULL DEFAULT 6100000  ;
ALTER TABLE kontrak CHANGE COLUMN `kontrak_id` `kontrak_id` INT(11) NOT NULL DEFAULT 4100000  ;
ALTER TABLE order_main CHANGE COLUMN `order_id` `order_id` INT(11) NOT NULL DEFAULT 3100000  ;
ALTER TABLE outcome CHANGE COLUMN `out_id` `out_id` INT(11) NOT NULL DEFAULT 2200000  ;
ALTER TABLE part CHANGE COLUMN `part_id` `part_id` INT(11) NOT NULL DEFAULT 7200000  ;
ALTER TABLE payroll CHANGE COLUMN `gaji_id` `gaji_id` INT(11) NOT NULL DEFAULT 6200000  ;
ALTER TABLE suplier CHANGE COLUMN `suplier_id` `suplier_id` INT(11) NOT NULL DEFAULT 1200000  ;
ALTER TABLE do_main ADD COLUMN `truk_id` INT NULL  AFTER `kary_id` ;
ALTER TABLE company CHANGE COLUMN `company_name` `company_name` VARCHAR(255) NULL  ;
ALTER TABLE virtual_control ADD COLUMN `do_id` INT NULL  AFTER `truk_pos` , ADD COLUMN `cust_id` INT NULL  AFTER `do_id` , ADD COLUMN `kary_id` INT NULL  AFTER `cust_id` , CHANGE COLUMN `truk_status` `truk_status` VARCHAR(45) NULL DEFAULT 'READY'  , CHANGE COLUMN `truk_arah` `truk_arah` VARCHAR(45) NULL DEFAULT 'BERANGKAT'  , CHANGE COLUMN `truk_cur_act` `truk_cur_act` VARCHAR(45) NULL DEFAULT 'NOTHING'  , CHANGE COLUMN `truk_pos` `truk_pos` VARCHAR(45) NULL  ;



INSERT INTO company (
`company_name` ,
`company_addr_1` ,
`company_addr_2` ,
`company_telp_1` ,
`company_telp_2` ,
`company_fax` ,
`company_email` ,
`company_website`
)
VALUES (
'MTCore Solut-e', 'Jalan Kyai Mojo Nomor 37, Srondol Kulon', 'Banyumanik, Semarang 50263', '+6224-91081477', NULL , '+6224-91081477', 'reg2@mtcore.co.id', 'http://mtcore.co.id'
);

INSERT INTO license (
`idlicense` ,
`customer` ,
`ser_no` ,
`type`
)
VALUES (
'55242145', 'MTCORE', '554MTC225120501', 'FREE TRIAL'
);

INSERT INTO version (
`main_version` ,
`sub_version` ,
`ch_version`
)
VALUES (
'1', '2', '105'
);

ALTER TABLE user CHANGE COLUMN `add_user` `add_user` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_user` `edit_user` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_user` `del_user` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_kary` `add_kary` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_kary` `edit_kary` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_kary` `del_kary` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_truk` `add_truk` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_truk` `edit_truk` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_truk` `del_truk` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_inv` `add_inv` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_inv` `edit_inv` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_inv` `del_inv` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_cust` `add_cust` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_cust` `edit_cust` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_cust` `del_cust` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_buy` `add_buy` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_buy` `edit_buy` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_buy` `del_buy` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_part` `add_part` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_part` `edit_part` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_part` `del_part` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_kont` `add_kont` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_kont` `edit_kont` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_kont` `del_kont` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_sup` `add_sup` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_sup` `edit_sup` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_sup` `del_sup` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_kwit` `add_kwit` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_kwit` `edit_kwit` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_kwit` `del_kwit` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `add_notes` `add_notes` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `edit_notes` `edit_notes` VARCHAR(45) NOT NULL DEFAULT 'N'  , CHANGE COLUMN `del_notes` `del_notes` VARCHAR(45) NOT NULL DEFAULT 'N'  ;
ALTER TABLE invoice_status CHANGE COLUMN `inv_status` `inv_status` VARCHAR(45) NOT NULL  ;
ALTER TABLE truck ADD COLUMN `truk_kat` VARCHAR(45) NULL  AFTER `truk_ins_jtempo` ;

CREATE  TABLE `eztruck11`.`emp_note` (

  `emp_note_id` INT NOT NULL ,

  `kary_id` INT NULL ,

  `note_isi` LONGTEXT NULL ,

  `note_date` DATE NULL ,

  PRIMARY KEY (`emp_note_id`) )

ENGINE = MyISAM;
ALTER TABLE `eztruck11`.`virtual_control` CHANGE COLUMN `do_id` `order_id` INT(11) NULL DEFAULT NULL  ;
ALTER TABLE `eztruck11`.`karyawan` ADD COLUMN `user_id` INT NULL  AFTER `kary_pos` ;



