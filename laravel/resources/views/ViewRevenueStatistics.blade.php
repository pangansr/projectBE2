@extends('dashboard')
<style>
    .statistics-container {
        background-color: #bff1ff;
        padding: 23px 13px 67px;
    }

    @media (max-width: 991px) {
        .statistics-container {
            padding-right: 20px;
        }
    }

    .statistics-wrapper {
        display: flex;
        gap: 20px;
    }

    @media (max-width: 991px) {
        .statistics-wrapper {
            flex-direction: column;
            align-items: stretch;
            gap: 0;
        }
    }

    .filter-section {
        display: flex;
        flex-direction: column;
        line-height: normal;
        width: 22%;
        margin-left: 0;
    }

    @media (max-width: 991px) {
        .filter-section {
            width: 100%;
        }
    }

    .filter-container {
        display: flex;
        flex-direction: column;
        color: #000;
        font-weight: 400;
    }

    @media (max-width: 991px) {
        .filter-container {
            margin-top: 40px;
        }
    }

    .filter-content {
        display: flex;
        flex-direction: column;
        padding: 0 5px 0 13px;
    }

    .filter-title {
        font: 15px Inter, sans-serif;
        letter-spacing: 1.5px;
    }

    .filter-options {
        background-color: #a6f5c7;
        display: flex;
        margin-top: 13px;
        flex-direction: column;
        font-size: 11px;
        letter-spacing: 1.1px;
        padding: 7px 0;
    }

    .dssp {
        background-color: #a6f5c7;
        margin-top: 85px;
        height: 100%;
    }

    .filter-label {
        font-family: Inter, sans-serif;
    }

    .filter-input {
        background-color: rgba(217, 217, 217, 1);
        align-self: end;
        margin-top: 8px;
        width: 241px;
        height: 19px;
    }

    .filter-dropdown {
        font-family: Inter, sans-serif;
        background-color: #d9d9d9;
        align-self: end;
        margin-top: 12px;
        width: 241px;
        max-width: 100%;
        align-items: end;
        white-space: nowrap;
        justify-content: center;
        padding: 5px 60px;
    }

    @media (max-width: 991px) {
        .filter-dropdown {
            padding-left: 20px;
            white-space: initial;
        }
    }

    .button {
        aspect-ratio: 6.67;
        object-fit: auto;
        object-position: center;
        width: 150px;
        padding: 10px;
        margin: 13px;
        max-width: 100%;
        border-radius: 30px;
    }

    .overview-section {
        background-color: #a6f5c7;
        display: flex;
        margin-top: 26px;
        flex-direction: column;
        font-size: 12px;
        letter-spacing: 1.2px;
        padding: 13px 13px 80px;
    }

    @media (max-width: 991px) {
        .overview-section {
            padding-right: 20px;
        }
    }

    .overview-icon {
        aspect-ratio: 3.57;
        object-fit: auto;
        object-position: center;
        width: 123px;
        max-width: 100%;
    }

    .overview-chart {
        aspect-ratio: 4.17;
        object-fit: auto;
        object-position: center;
        width: 226px;
        align-self: center;
        margin: 12px 16px 0 17px;
    }

    .overview-title {
        font-family: Inter, sans-serif;
        align-self: start;
        margin: 56px 0 0 20px;
    }

    @media (max-width: 991px) {
        .overview-title {
            margin: 40px 0 0 10px;
        }
    }

    .overview-table-header {
        font-family: Inter, sans-serif;
        margin-top: 26px;
    }

    .overview-table {
        aspect-ratio: 2.17;
        object-fit: auto;
        object-position: center;
        width: 530px;
        align-self: center;
        max-width: 100%;
        height: 300px;
        max-height: 250px;
        /* Điều chỉnh chiều cao theo ý bạn */
        overflow-y: auto;

    }

    .main-section {
        display: flex;
        flex-direction: column;
        line-height: normal;
        width: 78%;
        margin-left: 20px;
    }

    @media (max-width: 991px) {
        .main-section {
            width: 100%;
        }
    }

    .main-container {
        display: flex;
        margin-top: 28px;
        flex-grow: 1;
        flex-direction: column;
        font-weight: 400;


    }

    @media (max-width: 991px) {
        .main-container {
            max-width: 100%;
            margin-top: 40px;
        }
    }

    .main-content {
        background-color: #a6f5c7;
        display: flex;
        flex-direction: column;
        padding: 0 61px 39px 10px;
        height: 210px;
        margin-top: 30px;
        border-radius: 3%;
    }

    @media (max-width: 991px) {
        .main-content {
            max-width: 100%;
            padding-right: 20px;
        }
    }

    .main-header {
        align-self: start;
        z-index: 10;
        display: flex;
        margin-top: -5px;
        gap: 12px;
        font-size: 18px;
        color: #8e8383;
        letter-spacing: 1.8px;
    }

    .main-icon {
        aspect-ratio: 1.06;
        object-fit: auto;
        object-position: center;
        width: 53px;
        margin: 22px 0px;
    }

    .icon {
        aspect-ratio: 1.06;
        object-fit: auto;
        object-position: center;
        width: 53px;
        margin: 10px 0px;
    }

    .main-title {

        margin-top: 22px;
        flex-grow: 1;
        flex-basis: auto;
        color: #8cb7a2;
    }

    .stats-container {
        align-self: center;
        display: flex;

        width: 1000px;
        max-width: 100%;
        gap: 40px;
        color: #fff;
        padding: 0 1px;
    }

    @media (max-width: 991px) {
        .stats-container {
            flex-wrap: wrap;
        }
    }

    .stats-item {
        display: flex;
        gap: 2px;
        flex: 1;
        padding: 9px 0 16px 16px;

    }

    .stats-item-blue {
        background-color: #82c0f9;
    }

    .stats-item-red {
        background-color: #ff6b69;

    }

    .stats-item-purple {
        background-color: #d066e2;

    }

    .stats-content {
        display: flex;
        flex-direction: column;
        margin: auto 0;
    }

    .stats-kh {
        display: flex;
        flex-direction: column;
        margin: auto 0;
    }

    .stats-gt {
        display: flex;
        flex-direction: column;
        margin: auto 0;
    }

    .value {
        font: 30px Inter, sans-serif;
        letter-spacing: 2.5px;
    }

    .texttk {
        font: 15px Inter, sans-serif;
        letter-spacing: 1.5px;
        margin-top: 10px;

    }

    .stats-icon {
        aspect-ratio: 1;
        width: 75px;
        margin-left: 40px;

    }

    .stats-icon-blue {
        align-self: end;
        z-index: 10;
    }

    .stats-icon-red {
        margin-top: 20px;
    }

    .stats-icon-purple {
        margin-top: 20px;
    }

    .product-sales-title {
        color: #000;
        font: 20px Inter, sans-serif;
        letter-spacing: 2px;
        z-index: 10;
        margin-top: 79px;
    }

    @media (max-width: 991px) {
        .product-sales-title {
            max-width: 100%;
            margin-top: 40px;
        }
    }

    .product-sales-chart {
        background-color: #fff;
        margin-top: -4px;
        height: 535px;
    }

    @media (max-width: 991px) {
        .product-sales-chart {
            max-width: 100%;
        }
    }

    .date-input {
        background-color: rgba(217, 217, 217, 1);
        align-self: end;
        margin-top: 8px;
        width: 244px;
        height: 30px;
    }

    .date-range {
        background-color: #a6f5c7;
        display: flex;
        margin-top: 13px;
        flex-direction: column;
        font-size: 11px;
        letter-spacing: 1.1px;
        padding: 20px;
        height: 210px;
        border-radius: 5%;
    }

    .category-dropdown {
        font-family: Inter, sans-serif;
        background-color: #d9d9d9;
        align-self: end;
        margin-top: 12px;
        width: 244px;
        max-width: 100%;
        align-items: end;
        white-space: nowrap;
        justify-content: center;
        padding: 5px 60px;
        height: 30px;
    }

    .text {
        font-family: Inter, sans-serif;
        margin-top: 15px;
        font-size: 15;
    }

    .overview-table {
        margin-top: 20px;
        overflow-x: auto;
    }

    .overview-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .overview-table th,
    .overview-table td {
        padding: 15px;
        border: 1px solid #070707;
        text-align: left;
    }

    .overview-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }



    .overview-table tbody tr:hover {
        background-color: #f2f2f2;
    }

    .sanPham {
        width: 100%;
        margin-top: 20px;


    }

    .bangSP {
        margin: 30px;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;

    }

    .product-table th,
    .product-table td {
        padding: 15px;
        /* Tăng độ rộng của ô */
        border: 1px solid #171616;
        text-align: left;
        /* Căn lề văn bản sang trái */
    }

    .product-table th {
        background-color: #75d408;
        font-weight: bold;
    }

    .product-table tbody tr {
        background-color: #f1e9e9;
    }

    .product-table tbody tr:hover {
        background-color: #f2f2f2;
    }
</style>
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        //chang
        $('#category_id').change(function () {
            var categoryId = $(this).val();
            if (categoryId == 0 || categoryId === "") {
                $.ajax({
                    url: '{{ route("getAllStats") }}', 
                    method: 'GET',
                    success: function (response) {
                        $('.stats-content .value').text(response.orderCount);
                        $('.stats-gt .value').text(response.totalValue);
                        $('.stats-kh .value').text(response.customerCount);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $.ajax({
                    url: '{{ route("getStatsByCategory") }}',
                    method: 'GET',
                    data: { categoryId: categoryId },
                    success: function (response) {
                        $('.stats-content .value').text(response.orderCount);
                        $('.stats-gt .value').text(response.totalValue);
                        $('.stats-kh .value').text(response.customerCount);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });

        //mới dô
        var initialCategoryId = $('#category_id').val();
        if (initialCategoryId == 0 || initialCategoryId === "") {

            $.ajax({
                url: '{{ route("getAllStats") }}',
                method: 'GET',
                success: function (response) {
                    $('.stats-content .value').text(response.orderCount);
                    $('.stats-gt .value').text(response.totalValue);
                    $('.stats-kh .value').text(response.customerCount);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
</script>

<div class="statistics-container">
    <div class="statistics-wrapper">
        <section class="filter-section">
            <div class="filter-container">
                <div class="filter-content">
                    <h2 class="filter-title">Thống kê doanh thu</h2>
                    <div class="date-range">
                        <label class="text">Từ ngày:</label>
                        <input type="date" id="fromDate" class="date-input" />
                        <label class="text">Đến ngày</label>
                        <input type="date" id="toDate" class="date-input" />
                        <label class="text">Doanh mục</label>
                        <select id="category_id" name="category_id" required class="form-control">
                            <option value="0">Tất cả</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>



                    </div>
                    <input type="submit" value="Tìm kiếm" class="button">
                </div>


                <div class="stats-content">

                </div>



                <div class="overview-section">

                    <header class="main-header">
                        <img src="./image/kh.png" alt="" class="icon" />
                        <h2 class="main-title" style="font-size: 20px;">Khách hàng</h2>
                    </header>
                    <div class="stats-item stats-item-blue">
                        <div class="stats-kh">
                            <div class="value">2461</div>
                            <div class="texttk">Số lượng khách hàng</div>
                        </div>
                        <img src="./image/slkhpng.png" alt="" class="stats-icon" />
                    </div>

                    <div class="overview-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên KH</th>
                                    <th>Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customerRevenue as $index => $revenue)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $revenue->customerName }}</td>
                                        <td>{{ number_format($revenue->totalRevenue, 2) }} VND</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>




        <section class="main-section">
            <div class="main-container">
                <div class="main-content">
                    <header class="main-header">
                        <img src="./image/tongQuan.png" alt="" class="main-icon" />
                        <h2 class="main-title">Tổng quan</h2>
                    </header>
                    <div class="stats-container">
                        <div class="stats-item stats-item-blue">
                            <div class="stats-content">
                                <div class="value">0</div>
                                <div class="texttk">Số lượng đơn hàng</div>
                            </div>
                            <img src="./image/donHang.png" alt="" class="stats-icon stats-icon-blue" />
                        </div>
                        <div class="stats-item stats-item-red">
                            <div class="stats-gt">
                                <div class="value">2461</div>
                                <div class="texttk">Giá trị đơn hàng</div>
                            </div>
                            <img src="./image/tien.png" style="width: 90px" alt="" class="stats-icon stats-icon-red" />
                        </div>
                        <div class="stats-item stats-item-purple">
                            <div class="stats-content">
                                <div class="value">2461</div>
                                <div class="texttk">Sản phẩm còn lại</div>
                            </div>
                            <img src="./image/tải xuống.png" alt="" class="stats-icon stats-icon-purple" />
                        </div>
                    </div>
                </div>
                <div class="dssp">
                    <h2 class="">Doanh số sản phẩm</h2>
                    <div class="sanPham">
                        <div class="bangSP">
                            <table class="product-table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã SP</th>
                                        <th>Tên SP</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $index = 1 @endphp
                                    @foreach($purchasedProducts as $product)
                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td>{{ 'SP' . $product->productId }}</td>
                                            <td>{{ $product->productName }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ '$' . number_format($product->total, 2) }}</td>
                                        </tr>
                                        @php $index++ @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>

</div>
@endsection