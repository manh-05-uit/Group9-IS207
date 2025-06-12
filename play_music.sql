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

INSERT INTO Album (MaAlbum, TenAlbum, Picture, Banner, GioiThieu) VALUES
('AB001', 'M-TP', '/play-music/media/image/album/picture/mtp.png', '/play-music/media/image/album/banner/mtp.png', 'Nguyễn Thanh Tùng, thường được biết đến với nghệ danh Sơn Tùng M-TP, là một nam ca sĩ kiêm nhạc sĩ sáng tác bài hát, nhà sản xuất thu âm, rapper và diễn viên người Việt Nam.'),
('AB002', 'Orange', '/play-music/media/image/album/picture/orange.png', '/play-music/media/image/album/banner/orange.png', 'Khương Hoàn Mỹ, thường được biết đến với nghệ danh Orange, là một nữ ca sĩ kiêm nhạc sĩ sáng tác ca khúc người Việt Nam. Cô bắt đầu được biết đến rộng rãi với ca khúc \"Người lạ ơi\".'),
('AB003', 'Dễ thương', '/play-music/media/image/album/picture/cute.png', '/play-music/media/image/album/banner/cute.png', '\"Đáng yêu\" (dễ thương, xinh xắn) là một tính từ miêu tả những gì có khả năng gây ra cảm giác yêu thích, thiện cảm, hoặc tình cảm tích cực ở người khác. Nó thường được dùng để mô tả sự vật, sự việc, con người, hay động vật có vẻ ngoài hoặc tính cách khiến người ta cảm thấy thích thú, dễ mến.'),
('AB004', 'Chill', '/play-music/media/image/album/picture/chill.png', '/play-music/media/image/album/banner/chill.png', 'Thư giãn (tiếng Anh là \"relax\") là một trạng thái tâm sinh lý, trong đó cơ thể và tâm trí được thả lỏng, giảm bớt căng thẳng và lo âu, mang lại cảm giác thoải mái và dễ chịu.'),
('AB005', 'Nhạc 8x 9x', '/play-music/media/image/album/picture/8x9x.png', '/play-music/media/image/album/banner/8x9x.png', 'Nhạc Việt 8X 9X\" là cách gọi chung cho các ca khúc nhạc Việt phổ biến và được ưa chuộng trong giai đoạn từ thập niên 1980 đến 1990. Những ca khúc này thường được gắn liền với kỷ niệm và cảm xúc của thế hệ 8X và 9X, những người sinh ra và lớn lên trong thời kỳ đó.'),
('AB006', 'Nhạc Tết', '/play-music/media/image/album/picture/tet.png', '/play-music/media/image/album/banner/tet.png', 'Nhạc Tết Việt Nam là những bản nhạc gắn liền với mùa xuân, Tết cổ truyền của Việt Nam. Nhạc Tết thường mang âm hưởng vui tươi, rộn ràng, thể hiện niềm vui sum vầy, hạnh phúc và hy vọng về một năm mới. Các bài hát này có thể là những sáng tác mới hoặc những bài hát truyền thống đã trở thành kinh điển.'),
('AB007', 'Nhạc Kpop', '/play-music/media/image/album/picture/kpop.png', '/play-music/media/image/album/banner/kpop.png', 'K-pop, viết tắt của cụm từ tiếng Anh Korean popular music tức nhạc pop tiếng Hàn hay nhạc pop Hàn Quốc, là một thể loại âm nhạc bắt nguồn từ Hàn Quốc như một phần của văn hóa Hàn Quốc.');

CREATE TABLE BaiHat (
  MaBaiHat char(5) NOT NULL,
  TenBH varchar(100),
  Picture varchar(200),
  Audio varchar(200),
  SoLuotPhat int,
  MaAlbum char(5),
  CONSTRAINT pk_baihat PRIMARY KEY (MaBaiHat)
);

INSERT INTO BaiHat (MaBaiHat, TenBH, Picture, Audio, SoLuotPhat, MaAlbum) VALUES
('BH001', 'Ai Biết', '/play-music/media/image/hit/picture/ai-biet-wean.png', '/play-music/media/audio/hit/ai-biet-wean.mp3', 15, 'AB007'),
('BH002', 'Bạc phận', '/play-music/media/image/hit/picture/bac-phan-jack-kicm.png', '/play-music/media/audio/hit/bac-phan-jack-kicm.mp3', 23, 'AB007'),
('BH003', 'Billionare', '/play-music/media/image/hit/picture/billionaire-babymonster.png', '/play-music/media/audio/hit/billionaire-babymonster.mp3', 48, 'AB001'),
('BH004', 'Buông đôi tay nhau ra', '/play-music/media/image/hit/picture/buong-doi-tay-nhau-ra-sontungmtp.png', '/play-music/media/audio/hit/buong-doi-tay-nhau-ra-sontungmtp.mp3', 75, 'AB001'),
('BH005', 'Chắc ai đó sẽ về thôi', '/play-music/media/image/hit/picture/chac-ai-do-se-ve-thoi-sontungmtp.png', '/play-music/media/audio/hit/chac-ai-do-se-ve-thoi-sontungmtp.mp3', 63, 'AB001'),
('BH006', 'Chăm hoa', '/play-music/media/image/hit/picture/cham-hoa-mono.png', '/play-music/media/audio/hit/cham-hoa-mono.mp3', 36, 'AB002'),
('BH007', 'Chỉ một đêm nữa thôi', '/play-music/media/image/hit/picture/chi-mot-dem-nua-thoi-mck-tlinh.png', '/play-music/media/audio/hit/chi-mot-dem-nua-thoi-mck-tlinh.mp3', 2, 'AB002'),
('BH008', 'Có em', '/play-music/media/image/hit/picture/co-em-madihu-lowg.png', '/play-music/media/audio/hit/co-em-madihu-lowg.mp3', 10, 'AB002'),
('BH009', 'Đi giữa trời rực rỡ', '/play-music/media/image/hit/picture/di-giua-troi-ruc-ro-ngolanhuong.png', '/play-music/media/audio/hit/di-giua-troi-ruc-ro-ngolanhuong.mp3', 7, 'AB002'),
('BH010', 'Đừng kết thúc hôm nay', '/play-music/media/image/hit/picture/dung-ket-thuc-hom-nay-orange-ducphuc.png', '/play-music/media/audio/hit/dung-ket-thuc-hom-nay-orange-ducphuc.mp3', 13, 'AB002'),
('BH011', 'Exit sign', '/play-music/media/image/hit/picture/exit-sign-hieuthuhai.png', '/play-music/media/audio/hit/exit-sign-hieuthuhai.mp3', 15, 'AB003'),
('BH012', 'Gọi tên em đi', '/play-music/media/image/hit/picture/goi-ten-em-di-parsg.png', '/play-music/media/audio/hit/goi-ten-em-di-parsg.mp3', 16, 'AB003'),
('BH013', 'Hồng nhan', '/play-music/media/image/hit/picture/hong-nhan-jack.png', '/play-music/media/audio/hit/hong-nhan-jack.mp3', 12, 'AB003'),
('BH014', 'Khi em lớn', '/play-music/media/image/hit/picture/khi-em-lon-orange.png', '/play-music/media/audio/hit/khi-em-lon-orange.mp3', 13, 'AB003'),
('BH015', 'Mất kết nối', '/play-music/media/image/hit/picture/mat-ket-noi-duongdomic.png', '/play-music/media/audio/hit/mat-ket-noi-duongdomic.mp3', 18, 'AB004'),
('BH016', 'Một người vì em', '/play-music/media/image/hit/picture/mot-nguoi-vi-em-wean.png', '/play-music/media/audio/hit/mot-nguoi-vi-em-wean.mp3', 16, 'AB004'),
('BH017', 'Ôm sầu', '/play-music/media/image/hit/picture/om-sau-nb3hoaibao.png', '/play-music/media/audio/hit/om-sau-nb3hoaibao.mp3', 24, 'AB005'),
('BH018', 'Trái đất ôm mặt trời', '/play-music/media/image/hit/picture/trai-dat-om-mat-troi-kaidinh.png', '/play-music/media/audio/hit/trai-dat-om-mat-troi-kaidinh.mp3', 21, 'AB005'),
('BH019', 'Từng quen', '/play-music/media/image/hit/picture/tung-quen-wrenevans.png', '/play-music/media/audio/hit/tung-quen-wrenevans.mp3', 17, 'AB006'),
('BH020', 'Vết mưa', '/play-music/media/image/hit/picture/vet-mua-vucattuong.png', '/play-music/media/audio/hit/vet-mua-vucattuong.mp3', 16, 'AB006');

CREATE TABLE BaiHat_BXH (
  MaBaiHat char(5) NOT NULL,
  MaBXH char(5) NOT NULL,
  CONSTRAINT pk_bt_bxh PRIMARY KEY (MaBaiHat, MaBXH)
);

INSERT INTO BaiHat_BXH (MaBaiHat, MaBXH) VALUES
('BH001', 'BXH01'),
('BH001', 'BXH07'),
('BH002', 'BXH01'),
('BH005', 'BXH01'),
('BH005', 'BXH03'),
('BH005', 'BXH07'),
('BH006', 'BXH01'),
('BH006', 'BXH02'),
('BH006', 'BXH03'),
('BH007', 'BXH02'),
('BH008', 'BXH05'),
('BH010', 'BXH05'),
('BH012', 'BXH01'),
('BH012', 'BXH04'),
('BH013', 'BXH01'),
('BH013', 'BXH04'),
('BH015', 'BXH02'),
('BH016', 'BXH02'),
('BH016', 'BXH06'),
('BH017', 'BXH06'),
('BH019', 'BXH03'),
('BH020', 'BXH03');

CREATE TABLE BaiHat_CaSi (
  MaBaiHat char(5) NOT NULL,
  MaCaSi char(5) NOT NULL,
  CONSTRAINT pk_bt_cs PRIMARY KEY (MaBaiHat, MaCaSi)
);

INSERT INTO BaiHat_CaSi (MaBaiHat, MaCaSi) VALUES
('BH001', 'CS019'),
('BH002', 'CS006'),
('BH002', 'CS007'),
('BH003', 'CS001'),
('BH004', 'CS016'),
('BH005', 'CS016'),
('BH006', 'CS012'),
('BH007', 'CS011'),
('BH007', 'CS017'),
('BH008', 'CS009'),
('BH008', 'CS010'),
('BH009', 'CS013'),
('BH010', 'CS002'),
('BH010', 'CS014'),
('BH011', 'CS004'),
('BH012', 'CS015'),
('BH013', 'CS006'),
('BH014', 'CS014'),
('BH015', 'CS003'),
('BH016', 'CS019'),
('BH017', 'CS005'),
('BH018', 'CS008'),
('BH019', 'CS020'),
('BH020', 'CS018');

CREATE TABLE BaiHat_TheLoai (
  MaBaiHat char(5) NOT NULL,
  MaTheLoai char(5) NOT NULL,
  CONSTRAINT pk_bt_tl PRIMARY KEY (MaBaiHat, MaTheLoai)
);

INSERT INTO BaiHat_TheLoai (MaBaiHat, MaTheLoai) VALUES
('BH001', 'TL001'),
('BH002', 'TL001'),
('BH003', 'TL001'),
('BH004', 'TL001'),
('BH005', 'TL001'),
('BH006', 'TL002'),
('BH007', 'TL002'),
('BH008', 'TL003'),
('BH009', 'TL003'),
('BH009', 'TL007'),
('BH010', 'TL004'),
('BH010', 'TL007'),
('BH011', 'TL004'),
('BH012', 'TL003'),
('BH013', 'TL003'),
('BH014', 'TL005'),
('BH015', 'TL005'),
('BH016', 'TL005'),
('BH017', 'TL005'),
('BH018', 'TL006'),
('BH019', 'TL006'),
('BH020', 'TL006');

CREATE TABLE BangXepHang (
  MaBXH char(5) NOT NULL,
  TenBXH varchar(50),
  Picture varchar(200),
  Banner varchar(200),
  GioiThieu text,
  CONSTRAINT pk_bxh PRIMARY KEY (MaBXH)
);

INSERT INTO BangXepHang (MaBXH, TenBXH, Picture, Banner, GioiThieu) VALUES
('BXH01', 'BXH Toàn cầu', '/play-music/media/image/chart/picture/toan-cau.png', '/play-music/media/image/chart/banner/toan-cau.png', 'Bảng xếp hạng âm nhạc toàn cầu là những danh sách xếp hạng các bài hát hoặc album dựa trên mức độ phổ biến của chúng trên phạm vi quốc tế. Các bảng xếp hạng này tổng hợp dữ liệu từ nhiều quốc gia và vùng lãnh thổ khác nhau.'),
('BXH02', 'BXH Việt Nam', '/play-music/media/image/chart/picture/viet-nam.png', '/play-music/media/image/chart/banner/viet-nam.png', 'Bảng xếp hạng âm nhạc Việt Nam là những danh sách tổng hợp và xếp hạng các bài hát hoặc album dựa trên mức độ phổ biến của chúng trong lãnh thổ Việt Nam. Tương tự như bảng xếp hạng toàn cầu, các bảng xếp hạng này phản ánh thị hiếu và xu hướng âm nhạc của khán giả Việt.'),
('BXH03', 'BXH Asia', '/play-music/media/image/chart/picture/asian.png', '/play-music/media/image/chart/banner/asian.png', 'Bảng xếp hạng âm nhạc châu Á (hoặc đôi khi được gọi là Asian music charts) là các danh sách xếp hạng các bài hát hoặc album dựa trên mức độ phổ biến của chúng trong phạm vi khu vực châu Á. Khác với bảng xếp hạng toàn cầu hay quốc gia, các bảng xếp hạng châu Á tập trung vào thị hiếu và xu hướng âm nhạc của khán giả tại các quốc gia trong khu vực này.'),
('BXH04', 'BXH Europe', '/play-music/media/image/chart/picture/europe.png', '/play-music/media/image/chart/banner/europe.png', 'Bảng xếp hạng âm nhạc châu Âu là các danh sách tổng hợp và xếp hạng các bài hát hoặc album dựa trên mức độ phổ biến của chúng trên khắp các quốc gia thuộc châu Âu. Với sự đa dạng về ngôn ngữ, văn hóa và thị hiếu âm nhạc trong khu vực này, khái niệm \"bảng xếp hạng châu Âu\" có thể khá phức tạp, nhưng về cơ bản, nó nhằm mục đích phản ánh các xu hướng âm nhạc vượt ra ngoài ranh giới quốc gia.'),
('BXH05', 'Top 100 VN', '/play-music/media/image/chart/picture/top-100-vn.png', '/play-music/media/image/chart/banner/top-100-vn.png', 'Bảng xếp hạng âm nhạc Top 100 Việt Nam là một danh sách tổng hợp 100 bài hát hoặc album phổ biến nhất tại thị trường Việt Nam trong một khoảng thời gian nhất định (thường là hàng tuần, hàng tháng hoặc hàng năm). Đây là một khái niệm quen thuộc với người nghe nhạc và những người làm trong ngành công nghiệp âm nhạc Việt Nam.'),
('BXH06', 'Viral 50', '/play-music/media/image/chart/picture/viral-50-vn.png', '/play-music/media/image/chart/banner/viral-50-vn.png', 'Bảng xếp hạng Viral 50 Việt Nam là một danh sách các bài hát đang có xu hướng lan truyền mạnh mẽ và nhanh chóng trên các nền tảng kỹ thuật số tại Việt Nam. Khác với các bảng xếp hạng Top 100 truyền thống chủ yếu dựa trên lượt nghe/bán, Viral 50 tập trung vào mức độ \"viral\" (lan truyền) của một ca khúc.'),
('BXH07', 'Viral 50 Japan', '/play-music/media/image/chart/picture/viral-50-jp.png', '/play-music/media/image/chart/banner/viral-50-jp.png', 'Bảng xếp hạng Viral 50 Japan là một danh sách các bài hát đang có tốc độ lan truyền và tạo ra tiếng vang lớn trên các nền tảng kỹ thuật số tại thị trường Nhật Bản. Giống như các bảng xếp hạng Viral 50 ở các quốc gia khác, nó khác biệt so với các bảng xếp hạng Top 50 hoặc Top 100 thông thường (chỉ dựa trên tổng số lượt nghe/bán) ở chỗ nó tập trung vào sự \"viral\" - tức là khả năng một bài hát được lan truyền một cách nhanh chóng và tự nhiên trong cộng đồng.');

CREATE TABLE CaSi (
  MaCaSi char(5) NOT NULL,
  TenCaSi varchar(50),
  Picture varchar(200),
  Banner varchar(200),
  GioiThieu text,
  CONSTRAINT pk_casi PRIMARY KEY (MaCaSi)
);

INSERT INTO CaSi (MaCaSi, TenCaSi, Picture, Banner, GioiThieu) VALUES
('CS001', 'Babymonster', '/play-music/media/image/singer/picture/babymonster.png', '/play-music/media/image/singer/banner/babymonster.png', 'Babymonster (cách điệu BABYMONSTER, còn được gọi là Baemon) là một nhóm nhạc nữ Hàn Quốc được thành lập bởi công ty YG Entertainment. Nhóm bao gồm 7 thành viên: Ruka, Pharita, Asa, Ahyeon, Rami, Rora và Chiquita.'),
('CS002', 'Đức Phức', '/play-music/media/image/singer/picture/ducphuc.png', '/play-music/media/image/singer/banner/ducphuc.png', 'Đức Phúc tên thật là Nguyễn Đức Phúc, sinh ngày 15 tháng 10 năm 1996 tại Hà Nội, là một nam ca sĩ người Việt Nam. Anh được biết đến rộng rãi với tư cách là quán quân của mùa thứ ba chương trình Giọng hát Việt (The Voice) vào năm 2015.'),
('CS003', 'Dương Domic', '/play-music/media/image/singer/picture/duongdomic.png', '/play-music/media/image/singer/banner/duongdomic.png', 'Trần Đăng Dương, thường được biết đến với nghệ danh Dương Domic, là một nam ca sĩ kiêm sáng tác nhạc, rapper người Việt Nam. Xuất thân từ giới underground, anh từng có thời gian trở thành thực tập sinh cho công ty giải trí IF Entertainment của Hàn Quốc.'),
('CS004', 'HIEUTHUHAI', '/play-music/media/image/singer/picture/hieuthuhai.png', '/play-music/media/image/singer/banner/hieuthuhai.png', 'Trần Minh Hiếu, thường được biết đến với nghệ danh Hieuthuhai, là một nam rapper và ca sĩ kiêm sáng tác nhạc người Việt Nam. Anh là thành viên của tổ đội Gerdnang. Anh bắt đầu trở nên nổi tiếng sau khi tham gia chương trình Thế giới Rap – King of Rap mùa đầu tiên.'),
('CS005', 'Nb3 Hoài Bảo', '/play-music/media/image/singer/picture/nb3hoaibao.png', '/play-music/media/image/singer/banner/nb3hoaibao.png', 'Là một nam ca sĩ trẻ mới hoạt động nhưng Hoài Bảo đã xuất sắc sở hữu nhiều sản phẩm âm nhạc nổi bật như Nguôi ngoai (2023), Dừng lại (2023), Về đâu để thấy em (2023), … Anh từng gây chú ý với ca khúc \"Sợ lắm 2\" với thành tích lọt Top 5 bảng xếp hạng Zingchat tuần. Ca khúc này còn đạt gần 40 triệu lượt nghe trên Zing Mp3. Hay sản phẩm \"Thương thầm\" chỉ sau hai ngày phát hành trên trang nhạc Zing Mp3 đã chiếm giữ vị trí số 2 trên bảng xếp hạng Zingchart real-time.'),
('CS006', 'JACK', '/play-music/media/image/singer/picture/jack.png', '/play-music/media/image/singer/banner/jack.png', 'Trịnh Trần Phương Tuấn, thường được biết đến với nghệ danh Jack hoặc Jack – J97, là một nam ca sĩ kiêm sáng tác nhạc, rapper và diễn viên người Việt Nam. Anh bắt đầu được biết đến khi hoạt động trong nhóm nhạc G5R và phát hành bài hát \"Hồng nhan\".'),
('CS007', 'K-ICM', '/play-music/media/image/singer/picture/kicm.png', '/play-music/media/image/singer/banner/kicm.png', 'Nguyễn Bảo Khánh (sinh ngày 12 tháng 7 năm 1999), thường được biết đến với nghệ danh Khánh (cách điệu là KHÁNH) hay nghệ danh cũ K-ICM, là một nam nhạc sĩ, nhà sản xuất thu âm, DJ kiêm nhạc công người Việt Nam.'),
('CS008', 'Kai Đinh', '/play-music/media/image/singer/picture/kaidinh.png', '/play-music/media/image/singer/banner/kaidinh.png', 'Đinh Lê Hoàng Vỹ, thường được biết đến với nghệ danh Kai Đinh, là một nam nhạc sĩ, nhà sản xuất thu âm kiêm ca sĩ người Việt Nam.'),
('CS009', 'Low G', '/play-music/media/image/singer/picture/lowg.png', '/play-music/media/image/singer/banner/lowg.png', 'Low G là 1 rapper nổi tiếng Việt Nam. Anh có giọng rap đặc trưng cũng như khả năng rap mượt vượt trội so với nhiều rapper trẻ thế hệ mới. Low G cũng được biết là có thể rap tiếng anh và freestyle khá tốt. Cụm từ \"tao kí ngực fan\" từ bài nhạc Cypher nhà làm cũng đã trending một thời gian.'),
('CS010', 'Madihu', '/play-music/media/image/singer/picture/madihu.png', '/play-music/media/image/singer/banner/madihu.png', 'MADIHU với nghệ danh được viết tắt từ MADIHUMAN (người Mai Dịch) là một nhà sản xuất âm nhạc, người sáng tác và cũng là ca sĩ thể hiện những bài hát của chính mình. Những tác phẩm của Madihu thường dựa trên trải nghiệm của bản thân, mang tâm trạng sâu lắng và được sáng tác thông qua chất bán dẫn mang tên \"cảm xúc\".'),
('CS011', 'MCK', '/play-music/media/image/singer/picture/mck.png', '/play-music/media/image/singer/banner/mck.png', 'Nghiêm Vũ Hoàng Long, thường được biết đến với nghệ danh MCK, là một nam rapper và ca sĩ kiêm sáng tác nhạc người Việt Nam. Năm 2020, anh trở nên nổi tiếng khi tham dự và đi tới vòng chung kết ở mùa đầu tiên của cuộc thi truyền hình Rap Việt.'),
('CS012', 'MONO', '/play-music/media/image/singer/picture/mono.png', '/play-music/media/image/singer/banner/mono.png', 'Nguyễn Việt Hoàng, thường được biết đến với nghệ danh Mono, là một nam ca sĩ kiêm sáng tác nhạc người Việt Nam. Anh là em trai của Sơn Tùng M-TP. Mono khởi nghiệp bằng việc phát hành album đầu tay có tựa đề 22 vào năm 2022, với ý tưởng từ những câu chuyện tình yêu tuổi trẻ.'),
('CS013', 'Ngô Lan Hương', '/play-music/media/image/singer/picture/ngolanhuong.png', '/play-music/media/image/singer/banner/ngolanhuong.png', 'Ngô Lan Hương nổi tiếng từ khá sớm với các video hát lại các ca khúc nổi tiếng trên mạng xã hội, thu hút hàng triệu người theo dõi trên nền tảng Youtube. Với tài năng và chất giọng riêng biệt, cô đã ghi dấu ấn trong lòng khán giả từ khi còn rất trẻ, qua các ca khúc như \"Anh muốn đưa em về không\" ,\"Yêu đừng sợ đau\" ,\"Tuổi 23\".'),
('CS014', 'Orange', '/play-music/media/image/singer/picture/orange.png', '/play-music/media/image/singer/banner/orange.png', 'Khương Hoàn Mỹ, thường được biết đến với nghệ danh Orange, là một nữ ca sĩ kiêm nhạc sĩ sáng tác ca khúc người Việt Nam. Cô bắt đầu được biết đến rộng rãi với ca khúc \"Người lạ ơi\".'),
('CS015', 'Par SG', '/play-music/media/image/singer/picture/parsg.png', '/play-music/media/image/singer/banner/parsg.png', 'Par Sg tên thật là Nguyễn Khoa, là một rapper trẻ người Việt Nam. Anh được Young H và TonyTK nhận xét là một trong những rapper trẻ có triển vọng. Anh đã từng hợp tác với nhiều rapper như: Roy P, Cá Chép, 95G... Phong cách âm nhạc của rapper trẻ tuổi này chủ yếu là Lofi -Hiphop và RnB. Thế mạnh của anh chàng là rap love và rap life.'),
('CS016', 'Sơn Tùng M-TP', '/play-music/media/image/singer/picture/sontungmtp.png', '/play-music/media/image/singer/banner/sontungmtp.png', 'Nguyễn Thanh Tùng, thường được biết đến với nghệ danh Sơn Tùng M-TP, là một nam ca sĩ kiêm nhạc sĩ sáng tác bài hát, nhà sản xuất thu âm, rapper và diễn viên người Việt Nam.'),
('CS017', 'Tlinh', '/play-music/media/image/singer/picture/tlinh.png', '/play-music/media/image/singer/banner/tlinh.png', 'Nguyễn Thảo Linh, thường được biết đến với nghệ danh Tlinh, là một nữ rapper, ca sĩ kiêm nhạc sĩ sáng tác bài hát và vũ công người Việt Nam.'),
('CS018', 'Vũ Cát Tường', '/play-music/media/image/singer/picture/vucattuong.png', '/play-music/media/image/singer/banner/vucattuong.png', 'Vũ Cát Tường là một ca sĩ kiêm sáng tác nhạc và nhà sản xuất thu âm người Việt Nam. Tường được biết đến với khả năng kết hợp nhiều thể loại nhạc khác nhau như R&B, neo soul, pop, electropop, blues, jazz, alternative rock, funk, và ballad.'),
('CS019', 'Wean', '/play-music/media/image/singer/picture/wean.png', '/play-music/media/image/singer/banner/wean.png', 'Wean Lê tên khai sinh là Lê Thượng Long sinh ngày 07 tháng 10 năm 1998 , quê ở Hà Nội, được biết là diễn viên, rapper của làng giải trí Việt. Trái với vẻ ngoài có chút bụi bặm rẩ đời khi lên sân khấu, Long là người sống rất trọng tình cảm. Long được khán giả biết đến nhiều khi tham gia vai chính của “Trường học bá vương”.'),
('CS020', 'Wren Evans', '/play-music/media/image/singer/picture/wrenevans.png', '/play-music/media/image/singer/banner/wrenevans.png', 'Lê Phan, thường được biết đến với nghệ danh Wren Evans, là một nam ca sĩ kiêm sáng tác nhạc và nhà sản xuất thu âm người Việt Nam. Là một nghệ sĩ đa năng, anh có khả năng chơi nhiều nhạc cụ, beatbox, sản xuất, biểu diễn và sáng tác nhạc tiếng Anh hoặc tiếng Pháp, theo định hướng dòng nhạc Âu Mỹ.');

CREATE TABLE LichSu (
  MaUsr int NOT NULL,
  MaBaiHat char(5) NOT NULL,
  Ngay datetime NOT NULL,
  CONSTRAINT pk_ls PRIMARY KEY (MaUsr, MaBaiHat, Ngay)
);

INSERT INTO LichSu (MaUsr, MaBaiHat, Ngay) VALUES
(2, 'BH001', '2025-05-23 12:03:10'),
(2, 'BH001', '2025-05-23 12:05:59'),
(2, 'BH001', '2025-05-23 12:07:00'),
(2, 'BH001', '2025-06-10 14:34:15'),
(2, 'BH001', '2025-06-10 19:36:50'),
(2, 'BH001', '2025-06-10 19:36:54'),
(2, 'BH001', '2025-06-10 19:44:43'),
(2, 'BH001', '2025-06-10 20:04:22'),
(2, 'BH001', '2025-06-10 20:23:44'),
(2, 'BH001', '2025-06-10 21:00:13'),
(2, 'BH001', '2025-06-10 23:33:47'),
(2, 'BH001', '2025-06-11 05:21:53'),
(2, 'BH001', '2025-06-11 05:24:35'),
(2, 'BH001', '2025-06-11 06:56:07'),
(2, 'BH002', '2025-05-23 12:10:00'),
(2, 'BH002', '2025-06-10 14:34:35'),
(2, 'BH002', '2025-06-10 19:46:38'),
(2, 'BH002', '2025-06-10 20:23:50'),
(2, 'BH002', '2025-06-10 20:51:39'),
(2, 'BH002', '2025-06-10 23:33:29'),
(2, 'BH002', '2025-06-10 23:38:06'),
(2, 'BH002', '2025-06-11 02:43:48'),
(2, 'BH003', '2025-05-23 12:16:00'),
(2, 'BH003', '2025-06-10 19:44:18'),
(2, 'BH003', '2025-06-10 19:48:54'),
(2, 'BH003', '2025-06-10 19:59:06'),
(2, 'BH003', '2025-06-10 20:23:51'),
(2, 'BH003', '2025-06-10 20:50:11'),
(2, 'BH003', '2025-06-10 21:00:24'),
(2, 'BH003', '2025-06-10 23:33:30'),
(2, 'BH003', '2025-06-10 23:33:34'),
(2, 'BH003', '2025-06-10 23:33:38'),
(2, 'BH003', '2025-06-10 23:33:39'),
(2, 'BH003', '2025-06-10 23:33:40'),
(2, 'BH003', '2025-06-10 23:34:28'),
(2, 'BH003', '2025-06-10 23:34:33'),
(2, 'BH003', '2025-06-10 23:35:42'),
(2, 'BH003', '2025-06-10 23:37:54'),
(2, 'BH003', '2025-06-10 23:38:04'),
(2, 'BH003', '2025-06-11 00:19:52'),
(2, 'BH003', '2025-06-11 01:37:49'),
(2, 'BH003', '2025-06-11 05:22:54'),
(2, 'BH004', '2025-06-10 14:34:55'),
(2, 'BH004', '2025-06-10 20:23:52'),
(2, 'BH004', '2025-06-10 20:25:03'),
(2, 'BH004', '2025-06-10 23:33:30'),
(2, 'BH004', '2025-06-10 23:33:39'),
(2, 'BH004', '2025-06-11 01:36:08'),
(2, 'BH004', '2025-06-11 01:36:09'),
(2, 'BH004', '2025-06-11 01:36:10'),
(2, 'BH004', '2025-06-11 01:36:11'),
(2, 'BH004', '2025-06-11 01:36:13'),
(2, 'BH004', '2025-06-11 03:57:37'),
(2, 'BH004', '2025-06-11 04:15:05'),
(2, 'BH004', '2025-06-11 04:25:32'),
(2, 'BH004', '2025-06-11 04:26:20'),
(2, 'BH004', '2025-06-11 04:28:31'),
(2, 'BH004', '2025-06-11 04:48:28'),
(2, 'BH004', '2025-06-11 05:02:40'),
(2, 'BH004', '2025-06-11 05:03:58'),
(2, 'BH004', '2025-06-11 05:22:49'),
(2, 'BH004', '2025-06-11 05:24:37'),
(2, 'BH004', '2025-06-11 05:45:31'),
(2, 'BH004', '2025-06-11 07:03:09'),
(2, 'BH004', '2025-06-11 07:15:10'),
(2, 'BH005', '2025-06-10 14:35:07'),
(2, 'BH005', '2025-06-10 23:33:31'),
(2, 'BH005', '2025-06-10 23:33:44'),
(2, 'BH005', '2025-06-10 23:35:14'),
(2, 'BH005', '2025-06-10 23:35:39'),
(2, 'BH005', '2025-06-10 23:35:44'),
(2, 'BH005', '2025-06-10 23:36:00'),
(2, 'BH005', '2025-06-10 23:36:06'),
(2, 'BH005', '2025-06-10 23:37:52'),
(2, 'BH005', '2025-06-10 23:37:54'),
(2, 'BH005', '2025-06-10 23:38:02'),
(2, 'BH005', '2025-06-11 05:22:51'),
(2, 'BH005', '2025-06-11 05:24:44'),
(2, 'BH006', '2025-06-11 01:37:55'),
(2, 'BH006', '2025-06-11 03:56:09'),
(2, 'BH006', '2025-06-11 04:02:36'),
(2, 'BH006', '2025-06-11 05:22:56'),
(2, 'BH007', '2025-05-23 12:20:00'),
(2, 'BH007', '2025-06-10 21:01:01'),
(2, 'BH007', '2025-06-11 04:15:26'),
(2, 'BH008', '2025-05-23 12:25:00'),
(2, 'BH008', '2025-06-10 20:44:23'),
(2, 'BH008', '2025-06-10 20:44:32'),
(2, 'BH008', '2025-06-10 21:00:05'),
(2, 'BH008', '2025-06-10 21:09:09'),
(2, 'BH008', '2025-06-10 21:09:23'),
(2, 'BH009', '2025-06-10 21:01:28'),
(2, 'BH009', '2025-06-10 21:11:35'),
(2, 'BH010', '2025-05-23 12:29:00'),
(2, 'BH010', '2025-06-10 21:00:06'),
(2, 'BH010', '2025-06-10 23:37:58'),
(2, 'BH010', '2025-06-11 05:24:52'),
(2, 'BH011', '2025-06-10 21:00:35'),
(2, 'BH011', '2025-06-11 05:24:53'),
(2, 'BH011', '2025-06-11 06:55:13'),
(2, 'BH011', '2025-06-11 06:56:12'),
(2, 'BH012', '2025-06-10 20:59:57'),
(2, 'BH012', '2025-06-11 03:51:37'),
(2, 'BH012', '2025-06-11 03:57:53'),
(2, 'BH012', '2025-06-11 06:55:09'),
(2, 'BH014', '2025-06-10 21:09:25'),
(2, 'BH015', '2025-06-10 20:59:50'),
(2, 'BH015', '2025-06-11 01:35:50'),
(2, 'BH015', '2025-06-11 01:38:00'),
(2, 'BH016', '2025-05-23 12:40:00'),
(2, 'BH016', '2025-06-10 21:00:02'),
(2, 'BH017', '2025-06-10 20:34:31'),
(2, 'BH017', '2025-06-10 21:00:00'),
(2, 'BH017', '2025-06-10 21:00:51'),
(2, 'BH017', '2025-06-10 21:01:51'),
(2, 'BH017', '2025-06-10 21:09:20'),
(2, 'BH017', '2025-06-10 21:11:32'),
(2, 'BH017', '2025-06-11 01:35:35'),
(2, 'BH017', '2025-06-11 04:02:32'),
(2, 'BH017', '2025-06-12 14:17:09'),
(2, 'BH018', '2025-05-23 12:50:00'),
(2, 'BH018', '2025-06-10 20:02:54'),
(2, 'BH018', '2025-06-10 20:25:09'),
(2, 'BH018', '2025-06-10 20:26:02'),
(2, 'BH018', '2025-06-10 20:33:37'),
(2, 'BH018', '2025-06-10 21:00:52'),
(2, 'BH018', '2025-06-11 03:51:16'),
(2, 'BH019', '2025-06-11 01:35:55'),
(2, 'BH019', '2025-06-11 04:14:12'),
(2, 'BH020', '2025-06-11 05:23:02');

CREATE TABLE TheLoai (
  MaTheLoai char(5) NOT NULL,
  TenTheLoai varchar(100),
  Color char(7),
  Banner varchar(200),
  GioiThieu text,
  CONSTRAINT pk_theloai  PRIMARY KEY (MaTheLoai)
);

INSERT INTO TheLoai (MaTheLoai, TenTheLoai, Color, Banner, GioiThieu) VALUES
('TL001', 'Vui Tươi', '#CCCC33', '/play-music/media/image/category/banner/vui-tuoi.png', 'Thể loại nhạc vui tươi là một thuật ngữ chung để chỉ những dòng nhạc có giai điệu, tiết tấu và ca từ mang lại cảm giác hứng khởi, lạc quan, yêu đời và tràn đầy năng lượng. Mục đích chính của loại nhạc này là để người nghe cảm thấy vui vẻ, sảng khoái, muốn nhún nhảy hoặc hát theo.'),
('TL002', 'May mắn', '#FF3333', '/play-music/media/image/category/banner/may-man.png', 'Thể loại nhạc lạc quan cũng giống như \"nhạc vui tươi\" và \"nhạc may mắn\" ở chỗ nó không phải là một thể loại âm nhạc chính thức được phân loại theo cấu trúc (như Pop, Rock, Jazz). Thay vào đó, \"nhạc lạc quan\" là một tính chất, một đặc điểm cảm xúc mà nhiều thể loại âm nhạc khác nhau có thể mang lại.'),
('TL003', 'Mơ mộng', '#CC00CC', '/play-music/media/image/category/banner/mo-mong.png', 'Thể loại nhạc lãng mạn, tương tự như nhạc vui tươi hay lạc quan, không phải là một dòng nhạc cụ thể như Pop hay Rock. Thay vào đó, nó là một tính chất cảm xúc và phong cách mà rất nhiều thể loại âm nhạc có thể mang trong mình.'),
('TL004', 'Phấn khởi', '#009999', '/play-music/media/image/category/banner/phan-khoi.png', 'Thể loại nhạc phấn khởi cũng là một tính chất hoặc cảm xúc mà âm nhạc mang lại, chứ không phải một thể loại cụ thể như Pop hay Rock. Nó có nhiều điểm tương đồng với \"nhạc vui tươi\" và \"nhạc lạc quan\", nhưng \"phấn khởi\" thường nhấn mạnh hơn vào cảm giác năng lượng dâng trào, sự hưng phấn, thúc đẩy hành động hoặc tạo đà cho những điều mới mẻ.'),
('TL005', 'Tâm trạng', '#3300CC', '/play-music/media/image/category/banner/tam-trang.png', 'Thể loại nhạc buồn, cũng như các tính chất cảm xúc khác mà bạn đã hỏi, không phải là một dòng nhạc riêng biệt mà là một tính chất, một cảm xúc chủ đạo có thể được tìm thấy trong rất nhiều thể loại âm nhạc khác nhau.'),
('TL006', 'Thất tình', '#999999', '/play-music/media/image/category/banner/that-tinh.png', 'Thể loại nhạc thất tình cũng không phải là một dòng nhạc cụ thể mà là một phân loại dựa trên chủ đề và cảm xúc mà bài hát truyền tải. Nó là một nhánh con rất phổ biến của nhạc buồn, tập trung chuyên sâu vào nỗi đau, sự đau khổ, tiếc nuối và cô đơn khi một mối tình không thành.'),
('TL007', 'Thư giãn', '#669933', '/play-music/media/image/category/banner/thu-gian.png', 'Thể loại nhạc thư giãn không phải là một thể loại âm nhạc cụ thể được phân loại theo cấu trúc (như Pop, Rock, Jazz), mà là một tập hợp các phong cách âm nhạc có chung mục đích tạo ra cảm giác bình yên, thoải mái, giảm căng thẳng và giúp người nghe thư giãn cả về thể chất lẫn tinh thần.');

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
('admin1_manh', 'admin1_12345', 'admin', '/play-music/media/image/avatar/a1.png', 'Nguyễn Tấn Mạnh', 'Nam', '2005-06-03'),
('user1_manh', 'user1_12345', 'user', '/play-music/media/image/avatar/a2.png', 'Tan Manh 6a2', 'Nam', '2005-06-03'),
('23520916@nguyentanmanh', 'tanmanh23520916', 'user', '/play-music/media/image/avatar/a0.png', 'Nguyễn Tấn Mạnh', NULL, NULL),
('23520061@baoanh', 'baoanh23520061', 'user', '/play-music/media/image/avatar/a0.png', 'Nguyễn Lê Bảo Anh', NULL, NULL),
('23520493@baohieu', 'baohieu23520493', 'user', '/play-music/media/image/avatar/a0.png', 'Trần Bảo Hiếu', NULL, NULL),
('23521638@caotri', 'caotri23521638', 'user', '/play-music/media/image/avatar/a0.png', 'Lê Cao Trí', NULL, NULL);

CREATE TABLE Usr_Album (
  MaUsr int NOT NULL,
  MaAlbum char(5) NOT NULL,
  CONSTRAINT pk_us_al PRIMARY KEY (MaUsr, MaAlbum)
);

INSERT INTO Usr_Album (MaUsr, MaAlbum) VALUES
(2, 'AB005'),
(2, 'AB006');

CREATE TABLE Usr_BaiHat (
  MaUsr int NOT NULL,
  MaBaiHat char(5) NOT NULL,
  CONSTRAINT pk_us_bh PRIMARY KEY (MaUsr, MaBaiHat)
);

INSERT INTO Usr_BaiHat (MaUsr, MaBaiHat) VALUES
(2, 'BH001'),
(2, 'BH005'),
(2, 'BH006'),
(2, 'BH008'),
(2, 'BH009'),
(2, 'BH013'),
(2, 'BH014'),
(2, 'BH018');

CREATE TABLE Usr_CaSi (
  MaUsr int NOT NULL,
  MaCaSi char(5) NOT NULL,
  CONSTRAINT pk_us_cs PRIMARY KEY (MaUsr, MaCaSi)
);

INSERT INTO Usr_CaSi (MaUsr, MaCaSi) VALUES
(2, 'CS004'),
(2, 'CS005'),
(2, 'CS006'),
(2, 'CS013'),
(2, 'CS019');

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
