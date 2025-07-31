<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            /* margin-bottom: 20px; */
        }
        .rating > input { display: none; }
        .rating > label {
            position: relative;
            width: 1em;
            font-size: 3vw; /* Reduced star size */
            color: #FFD600;
            cursor: pointer;
        }
        .rating > label::before { 
            content: "\2605";
            position: absolute;
            opacity: 0;
        }
        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
            opacity: 1 !important;
        }
        .rating > input:checked ~ label:before {
            opacity: 1;
        }
        .rating:hover > input:checked ~ label:before { opacity: 0.4; }
        body {
            background: white; /* Removed the black background */
            color: black; /* Changed text color to black */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        h1, p {
            text-align: center;
        }
        p { font-size: 1.2rem; }
        @media only screen and (max-width: 600px) {
            h1 { font-size: 14px; }
            p { font-size: 12px; }
        }
        .custom-form {
            width: 80%; /* Increase the width to 80% */
            max-width: 600px; /* Set a max-width for larger screens */
            border: 1px solid #ccc; /* Add border */
            padding: 20px; /* Add some padding */
            border-radius: 10px; /* Optional: Add rounded corners */
            background-color: #f9f9f9; /* Optional: Add a background color */
        }
        button{
            margin-top: 10px;
            align-content: center;
        }
        .btn-primary {
            margin-left: 232px;
        }
        h5{
            text
        }
    </style>
</head>
<body>
    <form class="custom-form">
    <h3 style="text-align:center;">Feedback Form</h3>
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
        <div class="question_1">
            <h5>1. How would you rate their overall performance during this project?</h5>
            <div class="rating">
                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
        </div>
        <div class="question_2">
            <h5>2. How would you rate their ability to meet deadlines?</h5>
            <div class="rating">
                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
        </div>
        <div class="question_3">
            <h5>3. How would you rate their ability to work with other people?</h5>
            <div class="rating">
                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
        </div>
        <div class="question_2">
            <h5>4. How would you rate the quality of the work they delivered?</h5>
            <div class="rating">
                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12">
                <label for="message" class="form-label">Feedback <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
