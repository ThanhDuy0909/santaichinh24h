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
                                    line-height: 1.5;">Cho vay theo: </label>
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
                            <label for="inputGroupSelect02" class="col-form-label" style="font-size: 14px; ">Tỉnh thành: </label>
                            <div class="row">
                                <div class="col-md-9">
                                    <select class="custom-select" id="inputGroupSelect02" name="province"
                                    style="
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
                                        <option value="">Cả Nước</option>
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
                                <th colspan="4" class="text-center important">Thông tin cho vay</th>
                            </tr>
                            </thead>
                            <tbody>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/-274" title="HỖ TRỢ VAY TRẢ GÓP ">HỖ TRỢ VAY TRẢ GÓP </a>
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
                                    <td class="date" style="width:12%">24-12-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/-270" title="Hỗ trợ cho vay tín chấp_Vay tiêu dùng mua sắm">Hỗ trợ cho vay tín chấp_Vay tiêu dùng mua sắm</a>
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
                                        Toàn Quốc
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">23-12-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ngan-hang-tmcp-phuong-dong-ocb-cho-vay-lai-suat-uu-dai-215" title="NGÂN HÀNG TMCP PHƯƠNG ĐÔNG OCB CHO VAY LÃI SUẤT ƯU ĐÃI">NGÂN HÀNG TMCP PHƯƠNG ĐÔNG OCB CHO VAY LÃI SUẤT ƯU ĐÃI</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Bình Dương,Nghệ An,Toàn Quốc
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">15-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/vietcombank-ho-tro-vay-von-214" title="VIETCOMBANK HỖ TRỢ VAY VỐN">VIETCOMBANK HỖ TRỢ VAY VỐN</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Đồng Nai,Đà Nẵng,Toàn Quốc
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">15-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-vay-nhanh-khong-app-213" title="HỖ TRỢ VAY NHANH KHÔNG APP">HỖ TRỢ VAY NHANH KHÔNG APP</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Bình Dương,Ninh Thuận,Toàn Quốc
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">15-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/mirae-asset-ho-tro-vay-von-tieu-dung-toan-quoc-199" title="MIRAE ASSET HỖ TRỢ VAY VỐN TIÊU DÙNG TOÀN QUỐC">MIRAE ASSET HỖ TRỢ VAY VỐN TIÊU DÙNG TOÀN QUỐC</a>
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
                                        <a href="/post-loan/shinhan-finance-ho-tro-vay-von-mua-dich-lai-suat-thap-198" title="SHINHAN FINANCE HỖ TRỢ VAY VỐN MÙA DỊCH LÃI SUẤT THẤP">SHINHAN FINANCE HỖ TRỢ VAY VỐN MÙA DỊCH LÃI SUẤT THẤP</a>
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
                                        Cần Thơ,TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Nai,Lâm Đồng,Sơn La,Hà Nam
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">13-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-vay-von-an-toan-bao-mat-khong-the-chap-196" title="HỖ TRỢ VAY VỐN AN TOÀN BẢO MẬT KHÔNG THẾ CHẤP">HỖ TRỢ VAY VỐN AN TOÀN BẢO MẬT KHÔNG THẾ CHẤP</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Nai,Long An,Bến Tre,Phú Yên,Khánh Hòa,Cao Bằng,Vĩnh Phúc
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">12-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-cho-vay-von-toan-quoc-195" title="HỖ TRỢ CHO VAY VỐN TOÀN QUỐC">HỖ TRỢ CHO VAY VỐN TOÀN QUỐC</a>
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
                                        Cần Thơ,TP Hồ Chí Minh,Hà Nội,Tây Ninh,Bình Dương,Đồng Nai,Hậu Giang,Thanh Hóa,Nghệ An,Thừa Thiên Huế,Bình Thuận,Tuyên Quang,Hải Dương
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">12-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-vay-von-duyet-nhanh-bao-mat-137" title="HỖ TRỢ VAY VỐN DUYỆT NHANH - BẢO MẬT">HỖ TRỢ VAY VỐN DUYỆT NHANH - BẢO MẬT</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Bình Dương,Bình Phước,Long An,An Giang,Thanh Hóa,Nghệ An,Quảng Bình,Phú Yên,Bình Thuận,Hải Phòng,Nam Định,Vĩnh Phúc
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/cho-vay-tu-nhan-ho-tro-no-xau-136" title="CHO VAY TƯ NHÂN_ HỖ TRỢ NỢ XẤU">CHO VAY TƯ NHÂN_ HỖ TRỢ NỢ XẤU</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Bình Dương,Bình Phước,Long An,Tiền Giang,Nghệ An,Thừa Thiên Huế,Điện Biên,Hải Dương,Hải Phòng
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-cho-vay-nhan-tien-nhanh-135" title="HỖ TRỢ CHO VAY NHẬN TIỀN NHANH">HỖ TRỢ CHO VAY NHẬN TIỀN NHANH</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Bình Dương,Nghệ An
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-vay-von-bao-mat-nhan-tien-trong-ngay-134" title="HỖ TRỢ VAY VỐN BẢO MẬT, NHẬN TIỀN TRONG NGÀY">HỖ TRỢ VAY VỐN BẢO MẬT, NHẬN TIỀN TRONG NGÀY</a>
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
                                        Hà Nội,Vũng Tàu,Long An,Tiền Giang,Hà Tĩnh,Thừa Thiên Huế,Khánh Hòa,Lâm Đồng,Sơn La,Lào Cai,Hà Nam
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/cho-vay-von-toan-quoc-133" title="CHO VAY VỐN TOÀN QUỐC">CHO VAY VỐN TOÀN QUỐC</a>
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
                                        TP Hồ Chí Minh,Bình Phước,Sóc Trăng,Thanh Hóa,Đà Nẵng,Hòa Bình,Sơn La,Ninh Bình
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-vay-von-nhan-tien-trong-ngay-132" title="HỖ TRỢ VAY VỐN NHẬN TIỀN TRONG NGÀY">HỖ TRỢ VAY VỐN NHẬN TIỀN TRONG NGÀY</a>
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
                                        TP Hồ Chí Minh,Bình Dương,Bình Phước,Đồng Tháp,An Giang,Hậu Giang,Quảng Nam,Đắk Nông,Lai Châu,Thái Nguyên,Hải Phòng,Ninh Bình
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/cho-vay-von-mua-dich-131" title="CHO VAY VỐN MÙA DỊCH">CHO VAY VỐN MÙA DỊCH</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Bình Phước,Đồng Nai,Hà Tĩnh,Quảng Trị,Thừa Thiên Huế,Bình Định,Phú Thọ,Vĩnh Phúc
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-cho-vay-nhanh-chong-bao-mat-130" title="HỖ TRỢ CHO VAY NHANH CHÓNG BẢO MẬT">HỖ TRỢ CHO VAY NHANH CHÓNG BẢO MẬT</a>
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
                                        Cần Thơ,TP Hồ Chí Minh,Hà Nội,Bình Dương,Vũng Tàu,Thanh Hóa,Khánh Hòa,Điện Biên,Hưng Yên,Vĩnh Phúc
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/cho-vay-toan-quoc-129" title="CHO VAY TOÀN QUỐC">CHO VAY TOÀN QUỐC</a>
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
                                        Cần Thơ,TP Hồ Chí Minh,Hà Nội,Bình Dương,Vũng Tàu,Thừa Thiên Huế,Lâm Đồng,Điện Biên,Lạng Sơn
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-cho-vay-tra-gop-128" title="HỖ TRỢ CHO VAY TRẢ GÓP">HỖ TRỢ CHO VAY TRẢ GÓP</a>
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
                                        Hà Nội,Bình Dương,Trà Vinh,Bạc Liêu,Quảng Bình,Ninh Thuận,Hà Giang,Hà Nam
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-vay-von-tin-dung-127" title="HỖ TRỢ VAY VỐN TÍN DỤNG">HỖ TRỢ VAY VỐN TÍN DỤNG</a>
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
                                        Cần Thơ,TP Hồ Chí Minh,Hà Nội,Tây Ninh,Bình Dương,Phú Yên,Lai Châu
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-vay-von-an-toan-bao-mat-126" title="HỖ TRỢ VAY VỐN AN TOÀN BẢO MẬT">HỖ TRỢ VAY VỐN AN TOÀN BẢO MẬT</a>
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
                                        Cần Thơ,TP Hồ Chí Minh,Hà Nội,Bình Dương,Vĩnh Long,Quảng Bình,Lâm Đồng,Lai Châu,Hưng Yên
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-vay-von-toan-quoc-125" title="HỖ TRỢ VAY VỐN TOÀN QUỐC">HỖ TRỢ VAY VỐN TOÀN QUỐC</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Nai,Long An,Thanh Hóa,Ninh Thuận,Điện Biên,Hải Dương
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/cho-vay-lai-suat-thap-uy-tin-gop-theo-thang-1-124" title="CHO VAY LÃI SUẤT THẤP_UY TÍN_ GÓP THEO THÁNG">CHO VAY LÃI SUẤT THẤP_UY TÍN_ GÓP THEO THÁNG</a>
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
                                        TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Nai,Long An,Đồng Tháp,Thanh Hóa,Lâm Đồng,Sơn La,Lào Cai,Ninh Bình
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/cho-vay-lai-suat-uu-dai-122" title="CHO VAY LÃI SUẤT ƯU ĐÃI">CHO VAY LÃI SUẤT ƯU ĐÃI</a>
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
                                        Cần Thơ,TP Hồ Chí Minh,Hà Nội,Bình Dương,Bình Phước,Ninh Thuận,Điện Biên,Hưng Yên
                                        </p>
                                    </td>
                                    <td class="date" style="width:12%">10-07-2021</td>
                                </tr>
                                                                <tr>
                                    <td class="title-news" style="width: 50%">
                                        <a href="/post-loan/ho-tro-cho-vay-toan-quoc-121" title="HỖ TRỢ CHO VAY TOÀN QUỐC">HỖ TRỢ CHO VAY TOÀN QUỐC</a>
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
                                        Cần Thơ,TP Hồ Chí Minh,Hà Nội,Bình Dương,Đồng Nai,Long An,Bến Tre,Đà Nẵng,Bình Thuận,Hòa Bình,Bắc Giang
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
          <a class="page-link" href="javascript:void(0)" aria-label="Previous">
            <span aria-hidden="true">«</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
                       <li class="page-item active">
            <a href="javascript:void(0)" class="page-link">1 <span class="sr-only">(current)</span></a>
            </li>
                        
              <li class="page-item">
                <a href="/post-loan-filter?page=2&amp;limit=25" class="page-link" aria-label="Next">2</a>
            </li>
                      <li class="page-item disabled">
                <a class="page-link" href="/post-loan-filter?page=2&amp;limit=25" aria-label="Next">
                <span aria-hidden="true">»</span>
                <span class="sr-only">Next</span>
              </a>
    </li>
    
                                
                           
                            
                        </ul>
                        
                        
                    </nav>                                        </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-2">
                    <a class="buysell-data justify-content-between d-flex align-items-center" href="/post-loan-create"> Đăng Tin Cho Vay <i class="fa fa-usd" aria-hidden="true"></i></a>
                </div>

                <div class="wrap-top-employer border">
    <div class="side-bar-title text-center">
        Nhà tuyển dụng hàng đầu
    </div>
    <div class="col-md-12">
        <div class="row text-center">
                    <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt.png" alt="//santaichinh24h.vn/files/images/logo/dt.png" class="loading" data-was-processed="true">
    </a>
</div>
        <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt2.png" alt="//santaichinh24h.vn/files/images/logo/dt2.png" class="loading" data-was-processed="true">
    </a>
</div>
        <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt3.png" alt="//santaichinh24h.vn/files/images/logo/dt3.png" class="loading" data-was-processed="true">
    </a>
</div>
        <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt4.png" alt="//santaichinh24h.vn/files/images/logo/dt4.png" class="loading" data-was-processed="true">
    </a>
</div>
        <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt5.png" alt="//santaichinh24h.vn/files/images/logo/dt5.png" class="loading" data-was-processed="true">
    </a>
</div>
        <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt.png" alt="//santaichinh24h.vn/files/images/logo/dt.png" class="loading" data-was-processed="true">
    </a>
</div>
        <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt2.png" alt="//santaichinh24h.vn/files/images/logo/dt2.png" class="loading" data-was-processed="true">
    </a>
</div>
        <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt3.png" alt="//santaichinh24h.vn/files/images/logo/dt3.png" class="loading" data-was-processed="true">
    </a>
</div>
        <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt4.png" alt="//santaichinh24h.vn/files/images/logo/dt4.png" class="loading" data-was-processed="true">
    </a>
</div>
        <div class="col-md-6 col-4 wra-mgu-ig py-3">
    <a href="">
        <img src="//santaichinh24h.vn/files/images/logo/dt5.png" alt="//santaichinh24h.vn/files/images/logo/dt5.png" class="loading" data-was-processed="true">
    </a>
</div>
            </div>
    </div>    
</div>
                    <div class="wrap-banner-ads">
    <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads1.png" alt="//santaichinh24h.vn/files/images/logo/ads1.png"></a>
</div>
<div class="wrap-banner-ads">
    <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads2.png" alt="//santaichinh24h.vn/files/images/logo/ads2.png" class="loading" data-was-processed="true"></a>
</div>
<div class="wrap-banner-ads">
    <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads3.png" alt="//santaichinh24h.vn/files/images/logo/ads3.png"></a>
</div>
<div class="wrap-banner-ads">
    <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads4.png" alt="//santaichinh24h.vn/files/images/logo/ads4.png"></a>
</div>
<div class="wrap-banner-ads">
    <a href=""><img src="//santaichinh24h.vn/files/images/logo/ads5.png" alt="//santaichinh24h.vn/files/images/logo/ads5.png"></a>
</div>

            </div>
        </div>
    </div>
</div>