<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            height: 100vh;
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
            width: 80%;
            margin: 15px 0;
            justify-content: space-between;
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
                    <input type="text" name="name" placeholder="Nhập tên khác hàng">
                </div>
                <div class="input__box">
                    <span class="details">Số điện thoại liên hệ</span>
                    <input type="text" name="phone" placeholder="Số điện thoại liên hệ">
                </div>
                <div class="input__box">
                    <span class="details">Số lượng thiệt nhà trai</span>
                    <input type="number" name="quantity1" placeholder="Số lượng">
                </div>
                <div class="input__box">
                    <span class="details">Số lượng thiệp nhà gái</span>
                    <input type="number" name="quantity2" placeholder="Số lượng">
                </div>

            </div>
            {{-- <div class="gender__details">
                <input type="radio" name="gender" id="dot-1">
                <input type="radio" name="gender" id="dot-2">
                <input type="radio" name="gender" id="dot-3">
                <span class="gender__title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span>Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span>Female</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span>Prefer not to say</span>
                    </label>
                </div>
            </div> --}}
            <div class="button">
                <input type="submit" value="Đăng ký">
            </div>
        </form>
    </div>
</body>

</html>
