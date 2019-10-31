<?php
	class posts{
		var $title;
		var $link;
		var $description;
		var $content;

		function info_post(){
			echo "<h2>Thông tin bài viết</h2>";
			echo "<br>Tiêu đề bài viết : " .$this->title;
			echo "<br>Đường dẫn bài viết: " .$this->link;
			echo "<br>Mô tả bài viết: " .$this->description;
			echo "<br>Nội dung bài viết: " .$this->content;
		}
	}

	class categories{
		var $name_category;
		var $link;
		var $father_category;
		var $image;
		var $description;

		function info_category(){
			echo "<h2>Thông tin danh mục</h2>";
			echo "<br>Tên danh mục : " .$this->name_category;
			echo "<br>Đường dẫn danh mục: " .$this->link;
			echo "<br>Danh mục cha: " .$this->father_category;
			echo "<br>Anh hiển thị: " .$this->image;
			echo "<br>Mô tả danh mục: " .$this->description;
		}
	}

	class users{
		var $name;
		var $email;
		var $password;
		var $avatar;

		function info_user(){
			echo "<h2>Thông tin người dùng</h2>";
			echo "<br>Tên người dùng : " .$this->name;
			echo "<br>Email: " .$this->email;
			echo "<br>Mật khẩu: " .$this->password;
			echo "<br>Anh đại diện: " .$this->avatar;
		}
	}

	$post = new posts();
	$post->title = 'Tin bóng đá'; 
	$post->link = 'https://www.24h.com.vn/bong-da-viet-nam-c182.html';
	$post->description = 'Bóng đá Việt Nam';
	$post->content = 'ĐT Việt Nam đã có sự chuẩn bị hoàn hảo cho 2 trận đánh lớn với Thái Lan và UAE vào tháng 11. Với 7 điểm sau 3 lượt đấu, các học trò của HLV Park Hang Seo tự tin có thể đá văng Thái Lan và UAE để giành vé vào vòng sau.';
	$post->info_post();

	$category = new categories();
	$category->name_category = 'Tin trong nước'; 
	$category->link = 'https://www.24h.com.vn/thoi-su.html';
	$category->father_category = 'Thời sự';
	$category->image = 'thoisu.jpg';
	$category->description = 'Cập nhật tin tức thời sự trong nước';
	$category->info_category();

	$user = new users();
	$user->name = 'Nguyễn Văn Hòa'; 
	$user->email = 'nguyenvanhoa@gmail.com';
	$user->password = 'hoa123';
	$user->avatar = 'avatar.jpg';
	$user->info_user();
?>