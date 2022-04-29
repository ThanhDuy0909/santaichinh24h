@extends('user.index')
@section('title', 'Sàn Tài Chính 24h')
@section('content')
<div class="login-box" style="background-color: #FFFFCC;">
        <input type="hidden" class="from_tongtienvay_ajaxInput">
        <input type="hidden" class="from_kihan_ajaxInput">
        <input type="hidden" class="from_phantram_ajaxInput">
        <input type="hidden" class="from_phantrambh_ajaxInput">
        <h2>Bảng tính lãi xuất vay tín chấp</h2>
        <div id="wrapper" style="background-color: #FFFFCC;">
            <main id="main" class="" style="background-color: #FFFFCC;">
                <div id="content" class="content-area page-wrapper" role="main">
                    <div class="row row-main">
                        <div class="large-12 col">
                            <div class="col-inner">
                                <div class="devvn_laivay_muanha">
                                    <div class="content-value-interest-retes">
                                        <div class="index-value-interest-retes">
                                            <div class="item">
                                                <p class="title">Số tiền vay</p>
                                                <div class="text-input">
                                                    <input type="text" class="txt-input txt-amount-borrow currency interest-txt-changle monneyCalculate">
                                                    <span class="quantitative">VNĐ</span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <p class="title">Thời gian vay</p>
                                                <div class="text-input">
                                                    <select class="txt-input txt-time interest-txt-changle from_khv" id="from_khv">
                                                        <option value="">--Kỳ hạn vay--</option>
                                                        <?php
                                                        for ($i = 1; $i < 13 ; $i++){?>
                                                            <option value="<?= $i?>"><?= $i?> Năm </option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="quantitative">Năm</span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <p class="title">Lãi suất vay </p>  
                                                <div class="text-input">
                                                    <input type="text" class="txt-input txt-time interest-txt-changle from_ptr"  maxlength="2" placeholder="0%">
                                                    <span class="quantitative">%/năm</span>
                                                </div>
                                            </div> <div class="item">
                                                <p class="title">Phí bảo hiểm </p>  
                                                <div class="text-input">
                                                    <input type="text" class="txt-input txt-time interest-txt-changle form_bh" placeholder="0%">
                                                    <span class="quantitative">%/năm</span>
                                                </div>
                                            </div>
                                            <div class="item item-calculator">
                                                <button class="btn-calculator">Tính toán</button>
                                            </div>
                                        </div>
                                        <div class="payment">
                                            <div class="total-payment">
                                                <div class="item-payment">
                                                    <p class="txt-payment">Tổng số tiền gốc cộng lãi phải trả</p>
                                                    <p class="txt-index-payment txt-total-amount from_totalvay_ajax">0 VNĐ</p>
                                                </div>
                                                <div class="detail-payment btnTragop" style="display: none;">
                                                    <button class="btn-detail-payment detailTragop">CHI TIẾT LỊCH TRẢ NỢ</button>
                                                </div>
                                                <div class="screen-reader-response"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="tbl-detail-payment disabled" id="loantbls">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Số tháng</th>
                                                    <th>Dư nợ đầu kỳ (VND)</th>
                                                    <th>Lãi phải trả (VND)</th>
                                                    <th>Gốc phải trả (VND)</th>
                                                    <th style="color:#FFCCFF">Tổng trả hàng tháng<br>(Không bao gồm phí thu hộ)</th>
                                                    <th>Phí thu hộ</th>
                                                    <th style="color:	#FF9900">Tổng trả hàng tháng<br>
                                                        (Bao gồm phí thu hộ)
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_result" class="printTragop"></tbody>
                                            <tfoot class="tfootPrintTrahop"></tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div></main>
            <footer id="footer" class="footer-wrapper">
                <section class="section" id="section_1080275130">
                    <div class="section-content relative">
                        <div id="text-4110099903" class="text">
                            <p>
                                <marquee><strong><span style="color: #ff0000;">Chào mừng bạn đến với Bảng Tính Lãi Xuất
                                            |
                                            Website: www.santaichinh24h.vn | Hotline - Zalo: 0123456789 | STK:
                                        </span></strong>
                                </marquee>
                            </p>
                        </div>
                    </div>
                </section>
            </footer>Ï
        </div>
    </div>
<style>

    .login-box {
        background: #fff;
        padding: 20px;
        max-width: 90%;
        margin: 2vh auto;
        text-align: center;
        letter-spacing: 1px;
        position: relative;
    }

    .login-box:hover {
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .login-box h2 {
        margin: 20px 0 20px;
        padding: 0;
        font-family: 'Times New Roman', Times, serif;
        text-transform: uppercase;
        color: #50AFC7;
    }

    .social-button {
        background-position: 25px 0px;
        box-sizing: border-box;
        color: rgb(255, 255, 255);
        cursor: pointer;
        display: inline-block;
        height: 50px;
        line-height: 50px;
        text-align: left;
        text-decoration: none;
        text-transform: uppercase;
        vertical-align: middle;
        width: 100%;
        border-radius: 3px;
        margin: 10px auto;
        outline: rgb(255, 255, 255) none 0px;
        padding-left: 20%;
        transition: all 0.2s cubic-bezier(0.72, 0.01, 0.56, 1) 0s;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -ms-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }
</style>
<style>
    #text-4110099903 {
        line-height: 1.2;
    }

    #section_1080275130 {
        padding-top: 0px;
        padding-bottom: 0px;
    }

    .tet {
        display: scroll;
        position: fixed;
        top: 0px;
        z-index: 999
    }

    .tet-left {
        left: 0
    }

    .tet-right {
        right: 0
    }

    @media (max-width:800px) {
        .tet {
            display: none
        }
    }
</style>  
@endsection