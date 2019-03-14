<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body class="bg-for-submit-name">

<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-sm  bg-light border ">
            <div class="container">
                <!-- Brand -->
                <a href="{{url('/Dashboard')}}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Rental</b>Manager</span>
                </a>
                <!-- Toggler/collapsibe Button -->

                <!-- Navbar links -->
            </div>
        </nav>

    </div>
    <div class="row margin-top">
        <div class="col-md-12">
            <div class="wrap">
                <p class="form-title Arabella" style="margin-top: -50px">
                        Rental Manager
                </p>
                <a href="{{url('login')}}"><button type="button" class="btn-success mt-4">LOGIN AS TENANT</button> </a>
                <br>
                <br>
                <br>
                <br>
                <a href="{{url('admin/login')}}"><button type="button" class="btn-success mt-4">LOGIN AS ADMIN</button> </a>
            </div>
        </div>
    </div>
</div>
</body>    
    <style>
        body, html{
            height: 100%;
            background-image:url({{asset('dist/img/houses.jpeg')}});
            font-family: 'Lato', sans-serif;
        }

        .image-position{
            position: absolute;
            left: 3%;
        }
        .image-position img{
            width: 70%;
        }
        .center-block{
            width: 100%;
        }
        h2 {
            color: #AAAAAA;
            font-weight: normal;
        }
        .bg-for-submit-name
        {
            background-size: cover;
            padding: 0;
            margin: 0;
        }
        .margin-top{
            margin-top: 150px;
        }

        .wrap
        {
            width: 100%;
            height: 100%;
            min-height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 99;
        }

        p.form-title
        {
            font-family: 'Open Sans' , sans-serif;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            color: #FFFFFF;
            margin-top: 5%;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        form
        {
            width: 250px;
            margin: 0 auto;
        }

        form.login input[type="text"], form.login input[type="password"]
        {
            width: 100%;
            margin: 0;
            padding: 5px 10px;
            background: #fff;
            border: 0;
            border-bottom: 3px solid #75ba48;
            outline: 0;
            font-size: 15px;
            font-weight: 400;
            letter-spacing: 1px;
            margin-bottom: 10px;
            color: #000;
            outline: 0;

        }

        form.login input[type="submit"]
        {
            width: 100%;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 16px;
            outline: 0;
            cursor: pointer;
            letter-spacing: 1px;
        }

        form.login input[type="submit"]:hover
        {
            transition: background-color 0.5s ease;
        }

        .btn-success {
            color: #fff;
            background-color: #75ba48;
            border-color: #75ba48;
            width: 100%;
            /* font-weight: 600 !important; */
            padding: 7px 10px;
            font-size: 15px !important;
            border-radius: 0px;
            word-spacing: 4px;
            letter-spacing: 1px;

        }
        .btn-success:hover {
            color: #fff !important;
            background-color: #2FC0AE !important;
            border-color: #2FC0AE !important;
        }
        form.login label, form.login a
        {
            font-size: 12px;
            font-weight: 400;
            color: #FFFFFF;
        }

        form.login a
        {
            transition: color 0.5s ease;
        }

        form.login a:hover
        {
            color: #2ecc71;
        }


    </style>