@extends('user.index')
@section('title', 'Sàn Tài Chính 24h')
@section('content')


    <div class="py-5" id="top-employer">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <form id="search_employ" class="bg_employ mb-4">
                        <div class="form-row">
                            <div class="col-md-5">
                                <label for="inputGroupSelect02" class="col-form-label" style="padding-top: calc(0.375rem + 1px);
                                        padding-bottom: calc(0.375rem + 1px);
                                        margin-bottom: 0;
                                        font-size: 14px;
                                        line-height: 1.5;">Data theo loại: </label>
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select" id="inputGroupSelect02" name="category" style="
                                            display: inline-block;
                    width: 100%;
                    height: calc(2.8rem + 0.75rem + 2px);
                    padding: 0.375rem 1.75rem 0.375rem 0.75rem;
                    font-size: 1.3rem;
                    font-weight: 400;
                    line-height: 1.5;
                    color: #495057;
                    vertical-align: middle;
                    background: #fff url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e) no-repeat right 0.75rem center/8px 10px;
                    border: 1px solid #ced4da;
                    border-radius: 0.25rem;
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    appearance: none;
                                            ">
                                        <option value="">-- Chọn loại tin --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <label for="inputEmail3" class="col-form-label" style="font-size: 14px; ">Tỉnh thành:
                                </label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <select class="custom-select" id="inputGroupSelect02" name="province" style="
                                                display: inline-block;
                        width: 100%;
                        height: calc(2.8rem + 0.75rem + 2px);
                        padding: 0.375rem 1.75rem 0.375rem 0.75rem;
                        font-size: 1.3rem;
                        font-weight: 400;
                        line-height: 1.5;
                        color: #495057;
                        vertical-align: middle;
                        background: #fff url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e) no-repeat right 0.75rem center/8px 10px;
                        border: 1px solid #ced4da;
                        border-radius: 0.25rem;
                        -webkit-appearance: none;
                        -moz-appearance: none;
                        appearance: none;
                                                ">
                                            <option value="" selected="">Cả Nước</option>
                                            <option value="251034">- Toàn Quốc</option>
                                            <option value="250963">
                                                -- Miền Bắc</option>
                                            <option value="250959">
                                                --- Hà Nội</option>
                                            <option value="251005">
                                                --- Hòa Bình</option>
                                            <option value="251006">
                                                --- Sơn La</option>
                                            <option value="251007">
                                                --- Điện Biên</option>
                                            <option value="251008">
                                                --- Lai Châu</option>
                                            <option value="251009">
                                                --- Lào Cai</option>
                                            <option value="251010">
                                                --- Yên Bái</option>
                                            <option value="251011">
                                                --- Phú Thọ</option>
                                            <option value="251012">
                                                --- Hà Giang</option>
                                            <option value="251013">
                                                --- Tuyên Quang</option>
                                            <option value="251014">
                                                --- Cao Bằng</option>
                                            <option value="251015">
                                                --- Bắc Kạn</option>
                                            <option value="251016">
                                                --- Thái Nguyên</option>
                                            <option value="251017">
                                                --- Lạng Sơn</option>
                                            <option value="251018">
                                                --- Bắc Giang</option>
                                            <option value="251019">
                                                --- Quảng Ninh</option>
                                            <option value="251020">
                                                --- Bắc Ninh</option>
                                            <option value="251021">
                                                --- Hà Nam</option>
                                            <option value="251022">
                                                --- Hải Dương</option>
                                            <option value="251023">
                                                --- Hải Phòng</option>
                                            <option value="251024">
                                                --- Hưng Yên</option>
                                            <option value="251025">
                                                --- Nam Định</option>
                                            <option value="251026">
                                                --- Ninh Bình</option>
                                            <option value="251027">
                                                --- Thái Bình</option>
                                            <option value="251028">
                                                --- Vĩnh Phúc</option>
                                            <option value="250965">
                                                -- Miền Nam</option>
                                            <option value="250957">
                                                --- Cần Thơ</option>
                                            <option value="250958">
                                                --- TP Hồ Chí Minh</option>
                                            <option value="250969">
                                                --- Tây Ninh</option>
                                            <option value="250974">
                                                --- Long An</option>
                                            <option value="250975">
                                                --- Tiền Giang</option>
                                            <option value="250976">
                                                --- Bến Tre</option>
                                            <option value="250977">
                                                --- Đồng Tháp</option>
                                            <option value="250978">
                                                --- Vĩnh Long</option>
                                            <option value="250979">
                                                --- Trà Vinh</option>
                                            <option value="250980">
                                                --- An Giang</option>
                                            <option value="250981">
                                                --- Bạc Liêu</option>
                                            <option value="250982">
                                                --- Kiên Giang</option>
                                            <option value="250983">
                                                --- Sóc Trăng</option>
                                            <option value="250984">
                                                --- Cà Mau</option>
                                            <option value="250985">
                                                --- Hậu Giang</option>
                                            <option value="250964">
                                                -- Miền Trung</option>
                                            <option value="250986">
                                                --- Thanh Hóa</option>
                                            <option value="250987">
                                                --- Nghệ An</option>
                                            <option value="250988">
                                                --- Hà Tĩnh</option>
                                            <option value="250989">
                                                --- Quảng Bình</option>
                                            <option value="250990">
                                                --- Quảng Trị</option>
                                            <option value="250991">
                                                --- Thừa Thiên Huế</option>
                                            <option value="250992">
                                                --- Đà Nẵng</option>
                                            <option value="250993">
                                                --- Quảng Nam</option>
                                            <option value="250994">
                                                --- Quảng Ngãi</option>
                                            <option value="250995">
                                                --- Bình Định</option>
                                            <option value="250996">
                                                --- Phú Yên</option>
                                            <option value="250997">
                                                --- Khánh Hòa</option>
                                            <option value="250998">
                                                --- Ninh Thuận</option>
                                            <option value="250999">
                                                --- Bình Thuận</option>
                                            <option value="251000">
                                                --- Kon Tum</option>
                                            <option value="251001">
                                                --- Gia Lai</option>
                                            <option value="251002">
                                                --- Đắk Lắk</option>
                                            <option value="251003">
                                                --- Đắk Nông</option>
                                            <option value="251004">
                                                --- Lâm Đồng</option>
                                            <option value="250966">
                                                -- Miền Đông</option>
                                            <option value="250970">
                                                --- Bình Dương</option>
                                            <option value="250971">
                                                --- Bình Phước</option>
                                            <option value="250972">
                                                --- Đồng Nai</option>
                                            <option value="250973">
                                                --- Vũng Tàu</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3 mb-md-0">
                                        <button type="submit" class="btn-bali btn-success" style="border: none;
                                            color: #ffffff;
                                            font-size: 15px;
                                            font-weight: bold;
                                            line-height: 1;
                                            letter-spacing: 0.03em;
                                            position: relative;
                                            outline: none;
                                            padding: 4px 11px;
                                            display: inline-block;
                                            text-align: cente;
                                            min-height: 36px;
                                            width: 100%;
                                            cursor: pointer;
                                            border-radius: 6px;
                                            transition: all 0.2s linear;
                                            -ms-transition: all 0.2s linear;
                                            -webkit-transition: all 0.2s linear;
                                            -o-transition: all 0.2s linear;">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="4" class="text-center important">Mua - Bán Data</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/-271" title="Nhu cầu mua Data ">Nhu cầu mua Data
                                            </a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">23-12-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/-264" title="Bán Data Hot">Bán Data Hot</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                Miền Bắc
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">24-10-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-moi-2021-205"
                                                title="CUNG CẤP DATA MỚI 2021">CUNG CẤP DATA MỚI 2021</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Thanh Hóa,Toàn Quốc
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">13-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/chuyen-cung-cap-data-tai-chinh-tin-chap-uy-tin-chat-luong-lau-dai-204"
                                                title="CHUYÊN CUNG CẤP DATA TÀI CHÍNH_TÍN CHẤP, UY TÍN_CHẤT LƯỢNG_LÂU DÀI">CHUYÊN
                                                CUNG CẤP DATA TÀI CHÍNH_TÍN CHẤP, UY TÍN_CHẤT LƯỢNG_LÂU DÀI</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Đà Nẵng,Toàn Quốc
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">13-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-khach-gui-tiet-kiem-cac-ngan-hang-203"
                                                title="CUNG CẤP DATA KHÁCH GỬI TIẾT KIỆM CÁC NGÂN HÀNG">CUNG CẤP DATA KHÁCH
                                                GỬI TIẾT KIỆM CÁC NGÂN HÀNG</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Đà Nẵng,Toàn Quốc
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">13-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-chat-luong-toan-quoc-202"
                                                title="CUNG CẤP DATA CHẤT LƯỢNG TOÀN QUỐC">CUNG CẤP DATA CHẤT LƯỢNG TOÀN
                                                QUỐC</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Miền Bắc,Bình Dương,Hải Dương,Toàn Quốc
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">13-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-khach-hang-moi-nganh-nghe-201"
                                                title="CUNG CẤP DATA KHÁCH HÀNG MỌI NGÀNH NGHỀ">CUNG CẤP DATA KHÁCH HÀNG MỌI
                                                NGÀNH NGHỀ</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Miền Bắc,Miền Nam,Bình Dương,Đồng Tháp,Đà Nẵng,Hải
                                                Phòng,Thái Bình
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">13-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-tai-chinh-cac-ngan-hang-200"
                                                title="CUNG CẤP DATA TÀI CHÍNH CÁC NGÂN HÀNG">CUNG CẤP DATA TÀI CHÍNH CÁC
                                                NGÂN HÀNG</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Thanh Hóa,Lâm Đồng,Toàn Quốc
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">13-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-bat-dong-san-194"
                                                title="CUNG CẤP DATA BẤT ĐỘNG SẢN">CUNG CẤP DATA BẤT ĐỘNG SẢN</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                Cần Thơ,TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Nai,Nghệ An,Thái Bình
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">12-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-tin-chap-cap-nhat-trong-ngay-193"
                                                title="CUNG CẤP DATA TÍN CHẤP CẬP NHẬT TRONG NGÀY">CUNG CẤP DATA TÍN CHẤP
                                                CẬP NHẬT TRONG NGÀY</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Nai,Long An,Vĩnh Long,Nghệ An,Lâm
                                                Đồng,Quảng Ninh,Ninh Bình
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">12-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-quang-cao-ban-hang-192"
                                                title="CUNG CẤP DATA QUẢNG CÁO BÁN HÀNG">CUNG CẤP DATA QUẢNG CÁO BÁN
                                                HÀNG</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Cà Mau,Khánh Hòa
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">12-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-tai-chinh-toan-quoc-191"
                                                title="CUNG CẤP DATA TÀI CHÍNH TOÀN QUỐC">CUNG CẤP DATA TÀI CHÍNH TOÀN
                                                QUỐC</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Tháp,Cà Mau,Đà Nẵng,Bình Định,Tuyên
                                                Quang
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">12-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-the-tin-dung-190"
                                                title="CUNG CẤP DATA THẺ TÍN DỤNG">CUNG CẤP DATA THẺ TÍN DỤNG</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Sóc Trăng,Đà Nẵng,Yên Bái
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">12-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-khach-hang-vay-tin-chap-189"
                                                title="CUNG CẤP DATA KHÁCH HÀNG VAY TÍN CHẤP">CUNG CẤP DATA KHÁCH HÀNG VAY
                                                TÍN CHẤP</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Bình Phước,Long An,Vĩnh Long,Bình Thuận,Bắc
                                                Giang
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">12-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-toan-quoc-1-188"
                                                title="CUNG CẤP DATA TOÀN QUỐC">CUNG CẤP DATA TOÀN QUỐC</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Tháp,Nghệ An,Đà Nẵng
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">12-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-song-game-bai-momo-sms-168"
                                                title="CUNG CẤP DATA SỐNG - GAME BÀI, MOMO, SMS">CUNG CẤP DATA SỐNG - GAME
                                                BÀI, MOMO, SMS</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Lâm Đồng,Thái Nguyên
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-chat-luong-gia-re-167"
                                                title="CUNG CẤP DATA CHẤT LƯỢNG GIÁ RẺ">CUNG CẤP DATA CHẤT LƯỢNG GIÁ RẺ</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Vũng Tàu,Long An,Quảng Trị,Thừa Thiên Huế,Bình
                                                Thuận,Lạng Sơn,Nam Định
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-khach-hang-toan-quoc-166"
                                                title="CUNG CẤP DATA KHÁCH HÀNG TOÀN QUỐC">CUNG CẤP DATA KHÁCH HÀNG TOÀN
                                                QUỐC</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Hậu Giang,Nghệ An,Nam Định
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-vay-tin-chap-165"
                                                title="CUNG CẤP DATA VAY TÍN CHẤP">CUNG CẤP DATA VAY TÍN CHẤP</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Tiền Giang,Thanh Hóa,Hải Phòng
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-khach-co-nhu-cau-vay-164"
                                                title="CUNG CẤP DATA KHÁCH CÓ NHU CẦU VAY">CUNG CẤP DATA KHÁCH CÓ NHU CẦU
                                                VAY</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Tiền Giang,Thanh Hóa,Ninh Thuận,Lạng Sơn
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-tin-dung-so-luong-lon-163"
                                                title="CUNG CẤP DATA TÍN DỤNG SỐ LƯỢNG LỚN">CUNG CẤP DATA TÍN DỤNG SỐ LƯỢNG
                                                LỚN</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Nai,Long An,Đà Nẵng,Quảng Ninh
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-tiet-kiem-so-du-lon-162"
                                                title="CUNG CẤP DATA TIẾT KIỆM SỐ DƯ LỚN ">CUNG CẤP DATA TIẾT KIỆM SỐ DƯ LỚN
                                            </a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-moi-nhat-2021-161"
                                                title="CUNG CẤP DATA MỚI NHẤT 2021">CUNG CẤP DATA MỚI NHẤT 2021</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-uy-tin-160"
                                                title="CUNG CẤP DATA UY TÍN">CUNG CẤP DATA UY TÍN</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Bình Thuận
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="title-news" style="width: 50%">
                                            <a href="/post-data-trading/cung-cap-data-cap-nhat-moi-nhat-159"
                                                title="CUNG CẤP DATA CẬP NHẬT MỚI NHẤT">CUNG CẤP DATA CẬP NHẬT MỚI NHẤT</a>
                                            <p style="
                                                        color: #daa600;
                                                        font-weight: bold;
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                    ">

                                            </p>
                                        </td>
                                        <td style="width:400px">
                                            <p style="
                                                        overflow: hidden;
                                                        -webkit-line-clamp: 1;
                                                        display: -webkit-box;
                                                        -webkit-box-orient: vertical;
                                                        height: 20px;
                                                        color:blue
                                                    ">
                                                TP Hồ Chí Minh,Hà Nội,Bình Dương,Kiên Giang,Hậu Giang,Lâm Đồng,Lai Châu,Hà
                                                Nam
                                            </p>
                                        </td>
                                        <td class="date" style="width:12%">10-07-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="date" colspan="4">
                                            <div class="text-center">
                                                <nav aria-label="Page navigation example ">

                                                    <ul class="pagination justify-content-center tt-offset-20">

                                                        <li class="page-item disabled">
                                                            <a class="page-link" href="javascript:void(0)"
                                                                aria-label="Previous">
                                                                <span aria-hidden="true">«</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="javascript:void(0)" class="page-link">1 <span
                                                                    class="sr-only">(current)</span></a>
                                                        </li>

                                                        <li class="page-item">
                                                            <a href="/post-data-trading-filter?page=2&amp;limit=25"
                                                                class="page-link" aria-label="Next">2</a>
                                                        </li>
                                                        <li class="page-item disabled">
                                                            <a class="page-link"
                                                                href="/post-data-trading-filter?page=2&amp;limit=25"
                                                                aria-label="Next">
                                                                <span aria-hidden="true">»</span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </li>




                                                    </ul>


                                                </nav>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-2">
                        <a class="buysell-data justify-content-between d-flex align-items-center"
                            href="/post-data-trading-create"> Đăng Tin Mua - Bán Data <i class="fa fa-database "
                                aria-hidden="true"></i></a>
                    </div>

                    <div class="wrap-top-employer border">
                        <div class="side-bar-title text-center">
                            Nhà tuyển dụng hàng đầu
                        </div>
                        <div class="col-md-12">
                            <div class="row text-center">
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt2.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt2.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt3.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt3.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt4.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt4.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt5.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt5.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt2.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt2.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt3.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt3.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt4.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt4.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                                <div class="col-md-6 col-4 wra-mgu-ig py-3">
                                    <a href="">
                                        <img src="//santaichinh24h.vn/files/images/logo/dt5.png"
                                            alt="//santaichinh24h.vn/files/images/logo/dt5.png" class="loading"
                                            data-was-processed="true">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-banner-ads">
                        <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads1.png"
                                alt="//santaichinh24h.vn/files/images/logo/ads1.png"></a>
                    </div>
                    <div class="wrap-banner-ads">
                        <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads2.png"
                                alt="//santaichinh24h.vn/files/images/logo/ads2.png" class="loading"
                                data-was-processed="true"></a>
                    </div>
                    <div class="wrap-banner-ads">
                        <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads3.png"
                                alt="//santaichinh24h.vn/files/images/logo/ads3.png"></a>
                    </div>
                    <div class="wrap-banner-ads">
                        <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads4.png"
                                alt="//santaichinh24h.vn/files/images/logo/ads4.png"></a>
                    </div>
                    <div class="wrap-banner-ads">
                        <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads5.png"
                                alt="//santaichinh24h.vn/files/images/logo/ads5.png"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
