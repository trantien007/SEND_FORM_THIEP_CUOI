<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* all */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Oswald&family=Pixelify+Sans&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Oswald', sans-serif;
        }

        :root {
            --main-blue: #71b7e6;
            --main-purple: #9b59b6;
            --main-grey: #ccc;
            --sub-grey: #d9d9d9;
        }

        body {
            display: flex;
            height: auto;
            justify-content: center;
            /*center vertically */
            align-items: center;
            /* center horizontally */
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            padding: 10px;
        }

        /* container and form */
        .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            border-radius: 5px;
        }

        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container .title::before {
            content: "";
            position: absolute;
            height: 3.5px;
            width: 30px;
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            left: 0;
            bottom: 0;
        }

        .container form .user__details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        /* inside the form user details */
        form .user__details .input__box {
            width: calc(100% / 2 - 20px);
            margin-bottom: 15px;
        }

        .user__details .input__box .details {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        .user__details .input__box input {
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid var(--main-grey);
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user__details .input__box input:focus,
        .user__details .input__box input:valid {
            border-color: var(--main-purple);
        }

        /* inside the form gender details */

        form .gender__details .gender__title {
            font-size: 20px;
            font-weight: 500;
        }

        form .gender__details .category {
            display: flex;
            width: 100%;
            grid-row-gap: 45px;
            margin: 15px 0;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .gender__details .category label {
            display: flex;
            align-items: center;
        }

        .gender__details .category .dot {
            height: 18px;
            width: 18px;
            background: var(--sub-grey);
            border-radius: 50%;
            margin: 10px;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category .one,
        #dot-2:checked~.category .two,
        #dot-3:checked~.category .three {
            border-color: var(--sub-grey);
            background: var(--main-purple);
        }

        form input[type="radio"] {
            display: none;
        }

        /* submit button */
        form .button {
            height: 45px;
            margin: 45px 0;
        }

        form .button input {
            height: 100%;
            width: 100%;
            outline: none;
            color: #fff;
            border: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            transition: all 0.3s ease;
        }

        form .button input:hover {
            background: linear-gradient(-135deg, var(--main-blue), var(--main-purple));
        }

        @media only screen and (max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user__details .input__box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .gender__details .category {
                width: 100%;
            }

            .container form .user__details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user__details::-webkit-scrollbar {
                width: 0;
            }
        }

        .stock-images .image {
            opacity: 0.7;
            width: 100%;
            height: 350px;
            border-radius: 15px;
            background-position: center center;
            background-size: contain;
            background-color: gray;
        }

        .stock-images .image:hover {
            opacity: 1;
            cursor: pointer;
        }

        .stock-images [type=radio]+label:before,
        .stock-images [type=radio]+label:after {
            display: none;
        }

        .stock-images [type=radio]+label {
            width: 100%;
            height: auto;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .stock-images [type=radio]:not(:checked)+label .image {
            border: 5px solid white;
        }

        .stock-images [type=radio]:checked+label .image {
            border: 5px solid rgb(0, 153, 255);
            opacity: 1;
            position: relative;
        }

        .stock-images [type=radio]:checked+label .image::before {
            content: 'Đã chọn';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            bottom: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 35px;
        }
    </style>
</head>

<body class="antialiased">
    <div class="container">
        <div class="title mb-3">Form điền thông tin cưới</div>
        <form action="{{ route('send') }}" method="post">
            @csrf
            @if ($errors->has('message.error'))
                <div class="alert alert-danger">
                    {{ $errors->first('message.error') }}
                </div>
            @endif
            @if (session('message.success'))
                <div class="alert alert-success">
                    {{ session('message.success') }}
                </div>
            @endif
            <div class="user__details">
                <div class="input__box">
                    <span class="details">Tên khác hàng</span>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nhập tên khác hàng">
                </div>
                <div class="input__box">
                    <span class="details">Số điện thoại liên hệ</span>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        placeholder="Số điện thoại liên hệ">
                </div>
                <div class="input__box">
                    <span class="details">Số lượng thiệt nhà trai</span>
                    <input type="number" name="quantity1" value="{{ old('quantity1') }}" placeholder="Số lượng">
                </div>
                <div class="input__box">
                    <span class="details">Số lượng thiệp nhà gái</span>
                    <input type="number" name="quantity2" value="{{ old('quantity2') }}" placeholder="Số lượng">
                </div>
            </div>

            <div class="title mb-3">Thông tin nhà trai</div>
            <div class="user__details">
                <div class="input__box">
                    <span class="details">Tên chú rể</span>
                    <span class="small">(Bắt buộc)</span>
                    <input type="text" name="name-1" value="{{ old('name-1') }}" placeholder="Tên chú rể">
                </div>
                <div class="input__box">
                    <span class="details">Tên Bố Chú Rể</span>
                    <span class="small">(Có thể để trống)</span>
                    <input type="text" name="name-father-1" value="{{ old('name-father-1') }}"
                        placeholder="Tên bố chú rể">
                </div>
                <div class="input__box">
                    <span class="details">Tên Mẹ Chú Rể</span>
                    <span class="small">(Có thể để trống)</span>
                    <input type="text" name="name-mother-1" value="{{ old('name-mother-1') }}"
                        placeholder="Tên mẹ chú rể">
                </div>
                <div class="input__box">
                    <span class="details">Địa chỉ Nhà Trai</span>
                    <span class="small">(Thôn Xóm Ấp/ Phường Xã/ Quận Huyện/ Tỉnh)</span>
                    <input type="text" name="address-1" value="{{ old('address-1') }}" placeholder="Địa chỉ">
                </div>
                <div class="input__box">
                    <span class="details">Thời Gian/Ngày/tháng tổ chức Hôn Lễ (Lễ Thành Hôn)</span>
                    <span class="small">(Chọn ngày Dương lịch - Có thể để trống)</span>
                    <input type="datetime-local" name="date-1" value="{{ old('date-1') }}">
                </div>
                <div class="input__box">
                    <span class="details">Địa chỉ tổ chức Hôn Lễ (Lễ Thành Hôn)</span>
                    <span class="small">(Tại gia đình Nhà Trai hoặc Trung tâm tiệc cưới hoặc Nhà Thờ - Nếu là trung tâm
                        tiệc cưới hoặc Nhà Thờ thì cần ghi rõ địa chỉ)</span>
                    <input type="text" name="address-to-chuc-hon-le-1" value="{{ old('address-to-chuc-hon-le-1') }}"
                        placeholder="Địa chỉ tổ chức hôn lễ">
                </div>
                <div class="input__box">
                    <span class="details">Địa chỉ Mời ăn (Đãi tiệc) của Nhà Trai</span>
                    <span class="small">(Tại gia đình Nhà Trai hoặc Trung tâm tiệc cưới hoặc Nhà hàng - Nếu là Trung
                        tâm tiệc cưới hoặc Nhà hàng thì cần ghi rõ địa chỉ)</span>
                    <input type="text" name="address-moi-an-1" value="{{ old('address-moi-an-1') }}"
                        placeholder="Địa chỉ tổ chức hôn lễ">
                </div>
                <div class="input__box">
                    <span class="details">Ngày/tháng Mời Ăn (Đãi Tiệc) của Nhà Trai</span>
                    <span class="small">(Chọn ngày Dương lịch - Có thể để trống)</span>
                    <input type="datetime-local" name="time-tiec-1" value="{{ old('time-tiec-1') }}">
                </div>
            </div>

            <div class="title mb-3">Thông tin nhà gái</div>
            <div class="user__details">
                <div class="input__box">
                    <span class="details">Tên Cô Dâu</span>
                    <span class="small">(Bắt buộc)</span>
                    <input type="text" name="name-2" value="{{ old('name-2') }}" placeholder="Tên cô dâu">
                </div>
                <div class="input__box">
                    <span class="details">Tên Bố Cô Dâu</span>
                    <span class="small">(Có thể để trống)</span>
                    <input type="text" name="name-father-2" value="{{ old('name-father-2') }}"
                        placeholder="Tên bố Cô Dâu">
                </div>
                <div class="input__box">
                    <span class="details">Tên Mẹ Cô Dâu</span>
                    <span class="small">(Có thể để trống)</span>
                    <input type="text" name="name-mother-2" value="{{ old('name-mother-2') }}"
                        placeholder="Tên mẹ Cô Dâu">
                </div>
                <div class="input__box">
                    <span class="details">Địa chỉ Nhà Gái</span>
                    <span class="small">(Thôn Xóm Ấp/ Phường Xã/ Quận Huyện/ Tỉnh)</span>
                    <input type="text" name="address-2" value="{{ old('address-2') }}" placeholder="Địa chỉ">
                </div>
                <div class="input__box">
                    <span class="details">Thời gian/Ngày/tháng tổ chức Hôn Lễ (Lễ Vu Quy)</span>
                    <span class="small">(Chọn ngày Dương lịch - Có thể để trống)</span>
                    <input type="datetime-local" name="date-2" value="{{ old('date-2') }}">
                </div>
                <div class="input__box">
                    <span class="details">Địa chỉ tổ chức Hôn Lễ (Lễ Vu Quy)</span>
                    <span class="small">(Tại gia đình Nhà Gái hoặc Trung tâm tiệc cưới hoặc Nhà Thờ - Nếu là trung tâm
                        tiệc cưới hoặc Nhà Thờ thì cần ghi rõ địa chỉ)</span>
                    <input type="text" name="address-to-chuc-hon-le-2"
                        value="{{ old('address-to-chuc-hon-le-2') }}" placeholder="Địa chỉ tổ chức hôn lễ">
                </div>
                <div class="input__box">
                    <span class="details">Địa chỉ Mời ăn - Đãi tiệc của Nhà Gái</span>
                    <span class="small">(Tại gia đình Nhà Gái hoặc Trung tâm tiệc cưới - Nếu là trung tâm tiệc cưới
                        thì cần ghi rõ địa chỉ)</span>
                    <input type="text" name="address-moi-an-2" value="{{ old('address-moi-an-2') }}"
                        placeholder="Địa chỉ tổ chức hôn lễ">
                </div>
                <div class="input__box">
                    <span class="details">Ngày/tháng Mời Ăn (Đãi Tiệc) của Nhà Gái</span>
                    <span class="small">(Chọn ngày Dương lịch)</span>
                    <input type="datetime-local" name="time-tiec-2" value="{{ old('time-tiec-2') }}">
                </div>
            </div>
            <div class="gender__details">
                <span class="gender__title">Lì Xì Ăn Hỏi (Nạp Tài)</span>
                <span class="small">(Bỏ qua phần này nếu không mua và kéo xuống dưới để bấm GỬI thông tin đã
                    điền)</span>
                <div class="category row stock-images">
                    <div class="col s6 m3"><input id="test0" name="same-group-name" value="{{ old('name-2') }}"
                            type="radio" /><label for="test0">
                            <div class="image"
                                style="background-image: url('https://lh4.googleusercontent.com/DtakhMVoSFdTf3MyvFR_Y6DnUXQG3s74aES9W4kaoC0tzzlhcXKGczKvruJyMw7mFjvO5WAZ6l2fqRMP5fMHTpu-d769RJmK4ihm0SWTUyH9bnUe30a0mOvEq2zlElPdEg=w342')">
                            </div>
                            Mẫu 1 - Giá ưu đãi 5.000đ/chiếc
                        </label>
                    </div>
                    <div class="col s6 m3"><input id="test1" name="same-group-name" value="{{ old('name-2') }}"
                            type="radio" /><label for="test1">
                            <div class="image"
                                style="background-image: url('https://lh5.googleusercontent.com/eoL_Po1R5pioWHnngKJhdH3NRp1C4KVeecKUM7g06iqxiePI6ZCE5UUveXgb_s9RBryQCf0G2Va5Z32IEM00Mw60XoHFK1R43ecSfH1gy84EBLVhFCrq8WsTSH8G7RxhSA=w343')">
                            </div>
                            Mẫu 2 - Giá ưu đãi 5.000đ/chiếc
                        </label>
                    </div>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Gửi">
            </div>
        </form>
    </div>
</body>

</html>
