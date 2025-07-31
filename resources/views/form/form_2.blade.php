<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap');

    body {
        background: #EEEEEE;
        font-family: 'Hind Siliguri', sans-serif;
    }

    .card {
        width: 700px;
        height: 540px;
        border: none;
        border-radius: 15px;
    }

    .adiv {
        background: #0063FF;
        border-radius: 15px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        font-size: 21px;
        height: 57px;
    }

    img {
        margin-right: 10px;
        width: 45px;
        height: 45px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    img:hover {
        transform: scale(1.1);
    }

    .fas {
        cursor: pointer;
    }

    .fa-chevron-left {
        color: #fff;
    }

    h6 {
        font-size: 12px;
        font-weight: bold;
    }

    small {
        font-size: 10px;
        color: #898989;
    }

    .form-control {
        border: none;
        background: #F6F7FB;
        font-size: 12px;
    }

    .form-control:focus {
        box-shadow: none;
        background: #F6F7FB;
    }

    .form-control::placeholder {
        font-size: 12px;
        color: #B8B9BD;
    }

    .btn-primary {
        background: #0063FF;
        padding: 4px 0 7px;
        border: none;
    }

    .btn-primary:focus {
        box-shadow: none;
    }

    .btn-primary span {
        font-size: 12px;
        color: #A6DCFF;
    }

    p.mt-3 {
        font-size: 11px;
        color: #B8B9BD;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <form method="post" action="#">
        <div class="container d-flex justify-content-center">
            <div class="card mt-5 pb-5">
                <div class="d-flex flex-row justify-content-between p-3 adiv text-white">
                    <i class="fas fa-chevron-left"></i>
                    <span class="pb-3">feedback</span>
                    <i class="fas fa-times"></i>
                </div>
                <div class="mt-2 p-4 text-center">
                    <h6 class="mb-0">Your feedback help us to improve.</h6>
                    <small class="px-3">Please let us know about your chat experience.</small>
                    <div class="mb-3">
                        <div class="custom-dropdown">
                            <div class="dropdown-label"><b>Department</b></div>
                            <select id="inputState" class="form-control">
                                <option selected disabled hidden>Select Department</option>
                                <option>Reception</option>
                                <option>Cleaning</option>
                                <option>Management</option>
                                <option>Security</option>
                                <option>Doctor</option>
                                <option>Sister & Brother</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-center mt-2">
                        <img src="https://img.icons8.com/emoji/48/000000/angry-face-emoji--v2.png" />
                        <img src="https://img.icons8.com/fluent/48/000000/sad.png" />
                        <img src="https://img.icons8.com/color/48/000000/happy.png" />
                        <img src="https://img.icons8.com/emoji/48/000000/smiling-face.png" />
                        <img src="https://img.icons8.com/color/48/000000/lol.png" />
                    </div>
                    <div class="form-group mt-4">
                        <textarea class="form-control" rows="4" placeholder="Comment"></textarea>
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-primary btn-block"><span>Send feedback</span></button>
                    </div>
                    <p class="mt-3">Continue without sending feedback</p>
                </div>
            </div>
        </div>
    </form>
</body>

</html>