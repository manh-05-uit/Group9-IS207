CREATE DATABASE play_music;
USE play_music;

CREATE TABLE Album (
  MaAlbum char(5) NOT NULL,
  TenAlbum varchar(100),
  Picture varchar(200),
  Banner varchar(200),
  GioiThieu text,
  CONSTRAINT pk_album PRIMARY KEY (MaAlbum)
);

CREATE TABLE BaiHat (
  MaBaiHat char(5) NOT NULL,
  TenBH varchar(100),
  Picture varchar(200),
  Audio varchar(200),
  SoLuotPhat int,
  MaAlbum char(5),
  CONSTRAINT pk_baihat PRIMARY KEY (MaBaiHat)
);

CREATE TABLE BaiHat_BXH (
  MaBaiHat char(5) NOT NULL,
  MaBXH char(5) NOT NULL,
  CONSTRAINT pk_bt_bxh PRIMARY KEY (MaBaiHat, MaBXH)
);

CREATE TABLE BaiHat_CaSi (
  MaBaiHat char(5) NOT NULL,
  MaCaSi char(5) NOT NULL,
  CONSTRAINT pk_bt_cs PRIMARY KEY (MaBaiHat, MaCaSi)
);

CREATE TABLE BaiHat_TheLoai (
  MaBaiHat char(5) NOT NULL,
  MaTheLoai char(5) NOT NULL,
  CONSTRAINT pk_bt_tl PRIMARY KEY (MaBaiHat, MaTheLoai)
);

CREATE TABLE BangXepHang (
  MaBXH char(5) NOT NULL,
  TenBXH varchar(50),
  Picture varchar(200),
  Banner varchar(200),
  GioiThieu text,
  CONSTRAINT pk_bxh PRIMARY KEY (MaBXH)
);

CREATE TABLE CaSi (
  MaCaSi char(5) NOT NULL,
  TenCaSi varchar(50),
  Picture varchar(200),
  Banner varchar(200),
  GioiThieu text,
  CONSTRAINT pk_casi PRIMARY KEY (MaCaSi)
);

CREATE TABLE LichSu (
  MaUsr int NOT NULL,
  MaBaiHat char(5) NOT NULL,
  Ngay datetime NOT NULL,
  CONSTRAINT pk_ls PRIMARY KEY (MaUsr, MaBaiHat, Ngay)
);

CREATE TABLE TheLoai (
  MaTheLoai char(5) NOT NULL,
  TenTheLoai varchar(100),
  Color char(7),
  Banner varchar(200),
  GioiThieu text,
  CONSTRAINT pk_theloai  PRIMARY KEY (MaTheLoai)
);

CREATE TABLE Usr (
  MaUsr int AUTO_INCREMENT,
  Username varchar(50),
  Password varchar(50),
  Role varchar(5),
  Avatar varchar(200),
  HoTen varchar(100),
  GioiTinh varchar(10),
  NgaySinh date,
  CONSTRAINT pk_usr PRIMARY KEY (MaUsr)
);

INSERT INTO Usr (Username, Password, Role, Avatar, HoTen, GioiTinh, NgaySinh) VALUES
('admin1_manh', 'admin1_12345', 'admin', '/play-music/media/image/avatar/a1.png', 'Nguyễn Tấn Mạnh', 'Nam', '2005-06-03');

CREATE TABLE Usr_Album (
  MaUsr int NOT NULL,
  MaAlbum char(5) NOT NULL,
  CONSTRAINT pk_us_al PRIMARY KEY (MaUsr, MaAlbum)
);

CREATE TABLE Usr_BaiHat (
  MaUsr int NOT NULL,
  MaBaiHat char(5) NOT NULL,
  CONSTRAINT pk_us_bh PRIMARY KEY (MaUsr, MaBaiHat)
);

CREATE TABLE Usr_CaSi (
  MaUsr int NOT NULL,
  MaCaSi char(5) NOT NULL,
  CONSTRAINT pk_us_cs PRIMARY KEY (MaUsr, MaCaSi)
);

ALTER TABLE BaiHat
  ADD CONSTRAINT fk_baihat FOREIGN KEY (MaAlbum) REFERENCES Album (MaAlbum);

ALTER TABLE BaiHat_BXH
  ADD CONSTRAINT fk_baihat_bxh_mbh FOREIGN KEY (MaBaiHat) REFERENCES BaiHat (MaBaiHat),
  ADD CONSTRAINT fk_baihat_bxh_mbxh FOREIGN KEY (MaBXH) REFERENCES BangXepHang (MaBXH);

ALTER TABLE BaiHat_CaSi
  ADD CONSTRAINT fk_bh_cs_mbh FOREIGN KEY (MaBaiHat) REFERENCES BaiHat (MaBaiHat),
  ADD CONSTRAINT fk_bh_cs_mcs FOREIGN KEY (MaCaSi) REFERENCES CaSi (MaCaSi);

ALTER TABLE BaiHat_TheLoai
  ADD CONSTRAINT fk_bh_tl_mbh FOREIGN KEY (MaBaiHat) REFERENCES BaiHat (MaBaiHat),
  ADD CONSTRAINT fk_bh_tl_mtl FOREIGN KEY (MaTheLoai) REFERENCES TheLoai (MaTheLoai);

ALTER TABLE LichSu
  ADD CONSTRAINT fk_ls_mbh FOREIGN KEY (MaBaiHat) REFERENCES BaiHat (MaBaiHat),
  ADD CONSTRAINT fk_ls_mus FOREIGN KEY (MaUsr) REFERENCES Usr (MaUsr);

ALTER TABLE Usr_Album
  ADD CONSTRAINT fk_us_al_mal FOREIGN KEY (MaAlbum) REFERENCES Album (MaAlbum),
  ADD CONSTRAINT fk_us_al_mus FOREIGN KEY (MaUsr) REFERENCES Usr (MaUsr);

ALTER TABLE Usr_BaiHat
  ADD CONSTRAINT fk_us_bh_mbh FOREIGN KEY (MaBaiHat) REFERENCES BaiHat (MaBaiHat),
  ADD CONSTRAINT fk_us_bh_mus FOREIGN KEY (MaUsr) REFERENCES Usr (MaUsr);

ALTER TABLE Usr_CaSi
  ADD CONSTRAINT fk_us_cs_mcs FOREIGN KEY (MaCaSi) REFERENCES CaSi (MaCaSi),
  ADD CONSTRAINT fk_us_cs_mus FOREIGN KEY (MaUsr) REFERENCES Usr (MaUsr);
