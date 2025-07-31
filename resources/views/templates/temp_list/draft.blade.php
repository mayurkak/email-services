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
        max-width: 830px;
        /* Reduce the max-width of the form */
        border: 1px solid #ccc;
        /* Add border to the form */
        padding: 20px;
        /* Add some padding */
        border-radius: 10px;
        /* Optional: Add rounded corners */
        margin: 0 auto;
        /* Center align the form */

        margin-top: 70px;
        width: auto;
        height: auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        /* margin-left: 640px; */
    }

    .form-control {
        width: calc(100% - 30px);
        /* Reduce the width of the input fields */
    }

    .custom-dropdown {
        position: relative;
    }

    .custom-dropdown .dropdown-label {
        border-bottom: 1px solid #ccc;
        /* Draw horizontal line */
        padding: 5px 10px;
        /* Adjust padding as needed */
    }

    .custom-dropdown .dropdown-arrow {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
    }

    .custom-dropdown select {
        appearance: none;
        /* Remove default appearance */
        -webkit-appearance: none;
        /* For Safari */
        -moz-appearance: none;
        /* For Firefox */
        background: transparent;
        /* Make background transparent */
        border: none;
        /* Remove border */
        padding: 5px 10px;
        /* Adjust padding as needed */
    }

    .offcanvas {
        margin-left: 230px;
        width: 100%;
        max-width: 16%;
    }
    </style>
</head>
@extends('layout.header2')
@include('templates\email\ques_head')


@section('content')

<body>

    <div class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                Adding questions to the templates...
            </div>
            @foreach($Questions as $Ques)
            <ul>
                <li><button class="btn btn-secondary ques-btn"
                        data-question="{{$Ques->Questions}}">{{$Ques->Questions}}</button></li>
            </ul>
            @endforeach
        </div>
    </div>

    <form action="{{ route('form.save')}}" method="post" class="custom-form" id="formTemplate">
        @csrf

        <input type="hidden" name="form_id" value="{{ $template->id }}">
        <input type="hidden" name="form_name" value="{{ $template->form_name }}">
        <input type="hidden" name="questions" id="questions">
        <input type="hidden" name="answers" id="answers">
        <h3 style="text-align:center;">Feedback Form</h3>
        <p>Template ID: {{ $template->id }} Template Name: {{ $template->form_name }}</p>

        <div class="form-group">
            <div class="custom-dropdown">
                <div class="dropdown-label"><b>Department</b></div>
                <select id="inputState" class="form-control">
                    <option>Select Department
                    </option>
                    @foreach($department as $dept){
                    <option value="{{ $dept->id }}">{{ $dept->Department }}
                    </option>
                    }
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <h4>Please answer the following questions choosing the option that best represents your response.</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Strongly Disagree</th>
                        <th>Disagree</th>
                        <th>Neutral</th>
                        <th>Agree</th>
                        <th>Strongly Agree</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody id="questions-tbody">
                    <!-- Existing questions can be here -->
                </tbody>
            </table>
        </div>
        <div class="form-group">
        </div>
        <div class="form-group">
            <label for="message" class="form-label">Feedback <span class="text-danger">*</span></label>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Comment"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-primary" name="action" value="save">Save</button>
        </div>
    </form>

    <script>
    document.querySelectorAll('.ques-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const question = this.getAttribute('data-question');
            const questionsTbody = document.getElementById('questions-tbody');

            const newRow = document.createElement('tr');

            const questionCell = document.createElement('td');
            questionCell.textContent = question;
            newRow.appendChild(questionCell);

            const responseOptions = ['Strongly Disagree', 'Disagree', 'Neutral', 'Agree',
                'Strongly Agree'
            ];
            responseOptions.forEach((option, index) => {
                const optionCell = document.createElement('td');
                const radioInput = document.createElement('input');
                radioInput.type = 'radio';
                radioInput.name = `question_${question.replace(/\s+/g, '_').toLowerCase()}`;
                radioInput.value = option;
                optionCell.appendChild(radioInput);
                newRow.appendChild(optionCell);
            });

            const actionCell = document.createElement('td');
            const removeButton = document.createElement('i');
            // removeButton.type = 'button';
            // removeButton.textContent = "Remove";
            removeButton.className = 'fas fa-trash-alt text-danger';
            removeButton.style.cursor = 'pointer';

            removeButton.addEventListener('click', function() {
                newRow.remove();
                updateHiddenInputs();
            });

            actionCell.appendChild(removeButton);
            newRow.appendChild(actionCell);
            questionsTbody.appendChild(newRow);

            updateHiddenInputs();
        });
    });

    function updateHiddenInputs() {
        const questionsTbody = document.getElementById('questions-tbody');
        const questionRows = questionsTbody.querySelectorAll('tr');
        let questionsArray = [];
        let answersArray = [];
        questionRows.forEach(row => {
            const question = row.querySelector('td').textContent;
            questionsArray.push(question);
            const answerInputs = row.querySelectorAll('input[type="radio"]');
            let selectedAnswer = null;
            answerInputs.forEach(input => {
                if (input.checked) {
                    selectedAnswer = input.value;
                }
            });
            answersArray.push(selectedAnswer);
        });
        const questionsInput = document.getElementById('questions');
        questionsInput.value = JSON.stringify(questionsArray);
        const answersInput = document.getElementById('answers');
        answersInput.value = JSON.stringify(answersArray);
    }

    document.getElementById('formTemplate').addEventListener('submit', function(event) {
        updateHiddenInputs();
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection