<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .custom-form {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        max-width: 660px;
        width: 100%;
        height: auto;
        margin: auto;
        margin-top: 85px;
    }

    .custom-form .form-control {
        width: 100%;
    }

    h2 {
        text-align: center;
        /* margin-top: 125px; */
    }

    .custom-form .btn-primary {
        display: block;
        width: 100%;
        max-width: 200px;
        margin: 20px auto;
    }

    .offcanvas {

        margin-top: 70px;

    }

    .offcanvas {
        width: 13%;
    }
    </style>
</head>
@extends('layout.header2')
@include('templates\email\ques_head')


@section('content')

<body>
    <div class="offcanvas offcanvas-end show" tabindex="-1" id="offcanvasExample"
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
        <h2>Feedback Form</h2>
        @csrf
        <p>Template ID: {{ $template->id }} Template Name: {{ $template->form_name }}</p>
        <input type="hidden" name="form_id" value="{{ $template->id }}">
        <input type="hidden" name="form_name" value="{{ $template->form_name }}">
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
        <div class="col-12">

            <div id="dynamic-questions"></div>
            <input type="hidden" id="questions" name="questions">
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
                        <label class="form-check-label" for="gridRadios1">Comments</label>
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
            </fieldset>
        </div>

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
        <!-- <button type="submit" class="btn btn-primary" name="action" value="submit">Submit</button> -->
        <button type="submit" class="btn btn-primary" name="action" value="save">Submit</button>
        <button type="submit" class="btn btn-primary" name="action" value="share">Share</button>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Prepopulate the hidden input with existing questions
        const dynamicQuestionsDiv = document.getElementById('dynamic-questions');
        const questionsInput = document.getElementById('questions');
        const existingQuestions = Array.from(dynamicQuestionsDiv.querySelectorAll('.question-box')).map(div =>
            div.textContent);
        questionsInput.value = JSON.stringify(existingQuestions);

        document.querySelectorAll('.ques-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const question = this.getAttribute('data-question');

                const newQuestionDiv = document.createElement('div');
                newQuestionDiv.className = 'question-box mt-2';

                const questionTextDiv = document.createElement('div');
                questionTextDiv.className = 'd-flex align-items-center';

                const questionText = document.createElement('span');
                questionText.textContent = question;
                questionText.className = 'form-control-plaintext ms-2';

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-sm ms-2 btn-danger ';
                removeButton.innerHTML = '<i class="fas fa-trash"></i>';
                removeButton.addEventListener('click', function() {
                    newQuestionDiv.remove();
                    updateQuestionsInput();
                });

                questionTextDiv.appendChild(questionText);
                questionTextDiv.appendChild(removeButton);

                const inputField = document.createElement('input');
                inputField.type = 'text';
                inputField.name = 'answers[]';
                inputField.placeholder = `Your answer for: ${question}`;
                inputField.className = 'form-control mt-2';

                newQuestionDiv.appendChild(questionTextDiv);
                newQuestionDiv.appendChild(inputField);
                dynamicQuestionsDiv.appendChild(newQuestionDiv);

                updateQuestionsInput();
            });
        });

        function updateQuestionsInput() {
            const currentQuestions = Array.from(dynamicQuestionsDiv.querySelectorAll('.question-box')).map(
                div => div.querySelector('span').textContent);
            questionsInput.value = JSON.stringify(currentQuestions);
        }
    });
    </script>


    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Prepopulate the hidden input with existing questions
        const dynamicQuestionsDiv = document.getElementById('dynamic-questions');
        const questionsInput = document.getElementById('questions');
        const existingQuestions = Array.from(dynamicQuestionsDiv.querySelectorAll('.question-box')).map(div =>
            div.textContent);
        questionsInput.value = JSON.stringify(existingQuestions);

        document.querySelectorAll('.ques-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const question = this.getAttribute('data-question');

                const newQuestionDiv = document.createElement('div');
                newQuestionDiv.className = 'question-box mt-2';

                const questionText = document.createElement('span');
                questionText.textContent = question;
                questionText.className = 'form-control-plaintext';

                const inputField = document.createElement('input');
                inputField.type = 'text';
                inputField.name = 'answers[]';
                inputField.placeholder = `Your answer for: ${question}`;
                inputField.className = 'form-control mt-2';

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.textContent = "Remove";
                removeButton.className = 'btn btn-sm btn-danger mt-2';
                removeButton.addEventListener('click', function() {
                    newQuestionDiv.remove();
                    updateQuestionsInput();
                });

                newQuestionDiv.appendChild(questionText);
                newQuestionDiv.appendChild(inputField);
                newQuestionDiv.appendChild(removeButton);
                dynamicQuestionsDiv.appendChild(newQuestionDiv);

                updateQuestionsInput();
            });
        });

        function updateQuestionsInput() {
            const currentQuestions = Array.from(dynamicQuestionsDiv.querySelectorAll('.question-box')).map(
                div => div.querySelector('span').textContent);
            questionsInput.value = JSON.stringify(currentQuestions);
        }
    });
    </script> -->


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
@endsection