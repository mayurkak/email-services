<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet"> -->
    <style>
        form {
            max-width: 830px; /* Reduce the max-width of the form */
            border: 1px solid #ccc; /* Add border to the form */
            padding: 20px; /* Add some padding */
            border-radius: 10px; /* Optional: Add rounded corners */
            margin: 0 auto; /* Center align the form */
            max-height: 747px;
            margin-top: 70px;
            width: 100%;
            height: 100%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .form-control {
            width: calc(100% - 30px); /* Reduce the width of the input fields */
        }
        .custom-dropdown {
    position: relative;
}

.custom-dropdown .dropdown-label {
    border-bottom: 1px solid #ccc; /* Draw horizontal line */
    padding: 5px 10px; /* Adjust padding as needed */
}

.custom-dropdown .dropdown-arrow {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
}

.custom-dropdown select {
    appearance: none; /* Remove default appearance */
    -webkit-appearance: none; /* For Safari */
    -moz-appearance: none; /* For Firefox */
    background: transparent; /* Make background transparent */
    border: none; /* Remove border */
    padding: 5px 10px; /* Adjust padding as needed */
}

    </style>
</head>
<body>
<form>
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
<div class="form-group">
      <h4>Please answer the following questions choosing the option that best represents your response.</h4>
      <table class="table">
            <tbody>
                <tr>
                    <th></th>
                    <th>Strongly Disagree</th>
                    <th>Disagree</th>
                    <th>Neutral</th>
                    <th>Agree</th>
                    <th>Strongly Agree</th>
                </tr>
                <tr>
                    <td> Course learning outcomes were clearly stated.</td>
                    <td><input type="radio" id="one" name="fav_language"></td>
                    <td><input type="radio" id="one" name="fav_language"></td>
                    <td><input type="radio" id="one" name="fav_language"></td>
                    <td><input type="radio" id="one" name="fav_language"></td>
                    <td><input type="radio" id="one" name="fav_language"></td>
                </tr>
                <tr>
                    <td> I understand the content of this training session.</td>
                    <td><input type="radio" id="two" name="fav_language"></td>
                    <td><input type="radio" id="two" name="fav_language"></td>
                    <td><input type="radio" id="two" name="fav_language"></td>
                    <td><input type="radio" id="two" name="fav_language"></td>
                    <td><input type="radio" id="two" name="fav_language"></td>
                </tr>
                <tr>
                    <td> The course sequence was easy to follow.</td>
                    <td><input type="radio" id="three" name="fav_language"></td>
                    <td><input type="radio" id="three" name="fav_language"></td>
                    <td><input type="radio" id="three" name="fav_language"></td>
                    <td><input type="radio" id="three" name="fav_language"></td>
                    <td><input type="radio" id="three" name="fav_language"></td>
                </tr>
                <tr>
                    <td> The course content has prepared me well for work.</td>
                    <td><input type="radio" id="five" name="fav_language"></td>
                    <td><input type="radio" id="five" name="fav_language"></td>
                    <td><input type="radio" id="five" name="fav_language"></td>
                    <td><input type="radio" id="five" name="fav_language"></td>
                    <td><input type="radio" id="five" name="fav_language"></td>
                </tr>
            </tbody>    
        </table>
</div>
  <div class="form-group">
                <label for="message" class="form-label">Feedback <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Comment" required></textarea>
    </div>
    <div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</body>
</html>