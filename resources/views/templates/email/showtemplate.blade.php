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
        height: 583px;
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: linear-gradient(#FED151, #DE981F);
    }

    .wrapper {
        background: #f6f6f6;
        max-width: 360px;
        width: 100%;
        border-radius: 10px;
        box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
    }

    .wrapper .content {
        /* padding: 30px; */
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .wrapper .outer {
        height: 135px;
        width: 135px;
        overflow: hidden;
    }

    .outer .emojis {
        height: 500%;
        display: flex;
        flex-direction: column;
    }

    .outer .emojis li {
        height: 20%;
        width: 100%;
        list-style: none;
        transition: all 0.3s ease;
    }

    .outer li img {
        height: 64%;
        width: 58%;
    }

    #star-2:checked~.content .emojis .slideImg {
        margin-top: -135px;
    }

    #star-3:checked~.content .emojis .slideImg {
        margin-top: -270px;
    }

    #star-4:checked~.content .emojis .slideImg {
        margin-top: -405px;
    }

    #star-5:checked~.content .emojis .slideImg {
        margin-top: -540px;
    }

    .wrapper .stars {
        margin-top: 5px;
    }


    .stars label {
        font-size: 30px;
        margin: 0 3px;
        color: #ccc;
        cursor: pointer;
    }

    #star-1:hover~.content .stars .star-1,
    #star-1:checked~.content .stars .star-1,
    #star-2:hover~.content .stars .star-1,
    #star-2:hover~.content .stars .star-2,
    #star-2:checked~.content .stars .star-1,
    #star-2:checked~.content .stars .star-2,
    #star-3:hover~.content .stars .star-1,
    #star-3:hover~.content .stars .star-2,
    #star-3:hover~.content .stars .star-3,
    #star-3:checked~.content .stars .star-1,
    #star-3:checked~.content .stars .star-2,
    #star-3:checked~.content .stars .star-3,
    #star-4:hover~.content .stars .star-1,
    #star-4:hover~.content .stars .star-2,
    #star-4:hover~.content .stars .star-3,
    #star-4:hover~.content .stars .star-4,
    #star-4:checked~.content .stars .star-1,
    #star-4:checked~.content .stars .star-2,
    #star-4:checked~.content .stars .star-3,
    #star-4:checked~.content .stars .star-4,
    #star-5:hover~.content .stars .star-1,
    #star-5:hover~.content .stars .star-2,
    #star-5:hover~.content .stars .star-3,
    #star-5:hover~.content .stars .star-4,
    #star-5:hover~.content .stars .star-5,
    #star-5:checked~.content .stars .star-1,
    #star-5:checked~.content .stars .star-2,
    #star-5:checked~.content .stars .star-3,
    #star-5:checked~.content .stars .star-4,
    #star-5:checked~.content .stars .star-5 {
        color: #fd4;
    }

    input[type="radio"] {
        display: none;
    }
    .container .d-flex .justify-content-center{
        max-height:700px;
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
                    <div class="form-group">
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
                    <div class="wrapper container d-flex justify-content-center">
                        <input type="radio" name="rate" id="star-1">
                        <input type="radio" name="rate" id="star-2">
                        <input type="radio" name="rate" id="star-3">
                        <input type="radio" name="rate" id="star-4">
                        <input type="radio" name="rate" id="star-5">
                        <div class="content">
                            <div class="outer">
                                <div class="emojis">
                                    <li class="slideImg"><img src="assets/img/undefined - Imgur.jpg" alt="angry face"></li>
                                    <li><img src="assets/img/sad face.jpg" alt="sad face"></li>
                                    <li><img src="assets/img/neutral face.png" alt="neutral face"></li>
                                    <li><img src="assets/img/happy face.jpg" alt="happy face"></li>
                                    <li><img src="assets/img/very happy face.jpg" alt="very happy face"></li>
                                </div>
                            </div>
                            <div class="stars">
                                <label for="star-1" class="star-1 fas fa-star"></label>
                                <label for="star-2" class="star-2 fas fa-star"></label>
                                <label for="star-3" class="star-3 fas fa-star"></label>
                                <label for="star-4" class="star-4 fas fa-star"></label>
                                <label for="star-5" class="star-5 fas fa-star"></label>
                            </div>
                        </div>
                        
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <script>
</body>

</html>