<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Custom CSS to style the form */
    .custom-form {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        max-width: 660px;
        height: auto;
        margin: auto;
        margin-top: 15px;
    }

    .custom-form .form-control {
        width: 100%;
    }

    h2 {

        text-align: center;
        margin-top: 125px;
    }

    .custom-form .btn-primary {
        display: block;
        width: 100%;
        max-width: 200px;
        margin: 20px auto;
    }
    </style>
</head>

<body>
    <h2>Feedback Form</h2>
    <form class="custom-form">
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
        <div class="form-row">
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Feedback Type</legend>
                </div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1"
                            checked>
                        <label class="form-check-label" for="gridRadios1">
                            Comments
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                            Suggestions
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                        <label class="form-check-label" for="gridRadios3">
                            Questions
                        </label>
                    </div>
                </div>
        </div>
        </fieldset>
        <div class="form-row">
            <div class="col-12">
                <label for="message" class="form-label">Feedback <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>

</html>