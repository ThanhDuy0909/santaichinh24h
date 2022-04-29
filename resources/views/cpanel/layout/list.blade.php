<!--Dashboard-->
<li class="{{$active == 1 ? 'active' : ''}}">
			<a href=""> <i class="menu-icon glyphicon glyphicon-home"></i> <span class="menu-text"> Bảng điều khiển </span> </a>
		</li>
		<!--Orders-->
		<li class="clickMenu {{$active == 2 ? 'active open' : ''}}">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-shopping-cart"></i> <span class="menu-text"> Đơn hàng </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li class="{{$active == 2 ? 'active' : ''}}">
					<a href="sell/orders/view.html"> <span class="menu-text">Danh sách đơn hàng</span> </a>
				</li>
				<li class="{{$active == 2 ? 'active' : ''}}">
					<a href="sell/orders/report.html"> <span class="menu-text">Xuất danh sách đơn hàng</span> </a>
				</li>
			</ul>
		</li>
		<!--Customer-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-users"></i> <span class="menu-text"> Khách hàng </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="customer/feedback/view.html"> <span class="menu-text">Liên Hệ Từ Khách Hàng</span> </a>
				</li>
				<li>
					<a href="customer/customers/view.html"> <span class="menu-text">Danh Sách Khách Hàng</span> </a>
				</li>
			</ul>
		</li>
		<!--Posting-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-cubes"></i> <span class="menu-text"> Tin đăng tài chính </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="post/cic/view.html"> <span class="menu-text">Tin giao dịch CIC</span> </a>
				</li>
				<li>
					<a href="post/data-trading/view.html"> <span class="menu-text">Tin mua - bán Data</span> </a>
				</li>
				<li>
					<a href="post/loan/view.html"> <span class="menu-text">Tin cho vay</span> </a>
				</li>
				<li>
					<a href="post/category/view.html"> <span class="menu-text">Danh mục tin đăng</span> </a>
				</li>
				<li>
					<a href="post/category-province/view.html"> <span class="menu-text">Danh mục tỉnh thành</span> </a>
				</li>
			</ul>
		</li>
		<!--Business-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-building"></i> <span class="menu-text"> Tin tuyển dụng</span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="post/recruitment/view.html"> <span class="menu-text">Tin tuyển dụng</span> </a>
				</li>
				<li>
					<a href="merchant/candidate/view.html"> <span class="menu-text">Hồ sơ ứng viên</span> </a>
				</li>
				<li>
					<a href="post/category/view.html"> <span class="menu-text">Danh mục tin đăng</span> </a>
				</li>
				<li>
					<a href="post/category-province/view.html"> <span class="menu-text">Danh mục tỉnh thành</span> </a>
				</li>
				<li>
					<a href="merchant/business/view.html"> <span class="menu-text">Hồ sơ doanh nghiệp</span> </a>
				</li>
				<li>
					<a href="merchant/account/view.html"> <span class="menu-text">Tài khoản thành viên</span> </a>
				</li>
				<li>
					<a href="post/attribute/view.html"> <span class="menu-text">Thuộc tính</span> </a>
				</li>
			</ul>
		</li>
		<!--News-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text"> Nội dung </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="content/news/view.html"> <span class="menu-text">Quản Lý Tin Tức</span> </a>
				</li>
				<li>
					<a href="content/category/view.html"> <span class="menu-text">Danh Mục Tin</span> </a>
				</li>
				<li>
					<a href="content/page/view.html"> <span class="menu-text">Quản Lý Trang</span> </a>
				</li>
			</ul>
		</li>
		<!--Document-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-file-text"></i> <span class="menu-text">Văn bản </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="document/attachment/view"> <span class="menu-text">Văn bản</span> </a>
				</li>
				<li>
					<a href="document/category/view"> <span class="menu-text">Danh mục</span> </a>
				</li>
				<li>
					<a href="document/file-manager"> <span class="menu-text">Quản lý tệp</span> </a>
				</li>
			</ul>
		</li>
		<!--FAQs-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-question-circle"></i> <span class="menu-text"> Hỏi - Đáp </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="faq/question/view.html"> <span class="menu-text">Quản Lý Hỏi - Đáp</span> </a>
				</li>
				<li>
					<a href="faq/category/view.html"> <span class="menu-text">Danh Mục Hỏi - Đáp</span> </a>
				</li>
			</ul>
		</li>
		<!--Resource-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-file-archive-o"></i> <span class="menu-text"> Tài nguyên </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="content/file-manager"> <span class="menu-text">Quản Lý Ảnh</span> </a>
				</li>
				<li>
					<a href="content/album/view.html"> <span class="menu-text">Quản Lý BST ảnh</span> </a>
				</li>
				<li>
					<a href="content/album-category/view.html"> <span class="menu-text">Danh Mục BST ảnh</span> </a>
				</li>
			</ul>
		</li>
		<!--Template-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-laptop"></i> <span class="menu-text"> Giao diện </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="theme/menu/view.html"> <span class="menu-text">Quản Lý Menu</span> </a>
				</li>
				<li>
					<a target="_blank" href="theme/template/setting.ajax"> <span class="menu-text">Cấu Hình Giao Diện</span> </a>
				</li>
				<li>
					<a href="theme/template/view.html"> <span class="menu-text">Quản Lý Giao Diện</span> </a>
				</li>
			</ul>
		</li>
		<!--Plugin-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-gears"></i> <span class="menu-text">
                    Plugin
                </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="plugin.html"> <span class="menu-text">Quản lý Plugin</span> </a>
				</li>
			</ul>
		</li>
		<!--User-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-user"></i> <span class="menu-text">
                    Thành viên
                </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="user/admin/view.html"> <span class="menu-text">Thành viên</span> </a>
				</li>
			</ul>
		</li>
		<!--Setting-->
		<li class="clickMenu">
			<a href="#" class="menu-dropdown"> <i class="menu-icon fa fa-gear"></i> <span class="menu-text">
                    Cấu Hình
                </span> <i class="menu-expand"></i> </a>
			<ul class="submenu">
				<li>
					<a href="website/setting/common.html"> <span class="menu-text">Cấu Hình Website</span> </a>
				</li>
				<li>
					<a href="website/setting/email.html"> <span class="menu-text">Cấu Hình Email</span> </a>
				</li>
				<li>
					<a href="website/setting/notification.html"> <span class="menu-text">Cấu Hình Thông Báo</span> </a>
				</li>
				<li>
					<a href="website/setting/sell.html"> <span class="menu-text">Cấu Hình Bán Hàng</span> </a>
				</li>
				<li>
					<a href="website/setting/domain.html"> <span class="menu-text">Cấu Hình Tên Miền</span> </a>
				</li>
			</ul>
		</li>
		<!--Guide-->
		<li class="clickMenu">
			<a href="admin/guide.html"> <i class="menu-icon glyphicon glyphicon-book"></i> <span class="menu-text"> Hướng dẫn</span> </a>
		</li>