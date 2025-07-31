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
            
            margin-top: 70px;
            width: auto;
            height: auto;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            /* margin-left: 640px; */
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
   
    padding: 5px 10px; 
}

    </style>
</head>
@extends('layout.header2')
@include('templates\email\ques_head')


@section('content')
<body>
    <div class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
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
                <li><button class="btn btn-secondary ques-btn" data-question="{{$Ques->Questions}}">{{$Ques->Questions}}</button></li>
            </ul>
            @endforeach
        </div>
    </div>

    <form action="{{ route('form.update', ['id' => $templateForm->id]) }}" method="post" class="custom-form" id="formTemplate">
        @csrf
        <input type="hidden" name="form_id" value="{{ $template->id }}"> 
        <input type="hidden" name="form_name" value="{{ $template->form_name }}"> 
       
        <input type="hidden" name="answers" id="answers">
        <h3 style="text-align:center;">Feedback Form</h3>
        <p>Template ID: {{ $template->id }} Template Name: {{ $template->form_name }}</p>
        
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
                <thead>
                    <tr>
                        <th></th>
                        <th>Strongly Disagree</th>
                        <th>Disagree</th>
                        <th>Neutral</th>
                        <th>Agree</th>
                        <th>Strongly Agree</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody id="dynamic-questions">
                <input type="hidden" id="questions" name="questions">
                </tbody>
            </table>
        </div>
        
        <div class="form-group">
            <label for="message" class="form-label">Feedback <span class="text-danger">*</span></label>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Comment" ></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="action" value="save">Save</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dynamicQuestionsDiv = document.getElementById('dynamic-questions');
            const questionsInput = document.getElementById('questions');

            document.querySelectorAll('.ques-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const question = this.getAttribute('data-question');

                    const newQuestionDiv = document.createElement('tr');
                    newQuestionDiv.className = 'question-box';

                    const questionCell = document.createElement('td');
                    questionCell.textContent = question;

                    const answerCell = document.createElement('td');
                    const inputField = document.createElement('input');
                    inputField.type = 'text';
                    inputField.name = 'answers[]';
                    inputField.placeholder = `Your answer for: ${question}`;
                    inputField.className = 'form-control';

                    answerCell.appendChild(inputField);

                    const actionCell = document.createElement('td');
                    const removeButton = document.createElement('button');
                    removeButton.type = 'button';
                    removeButton.textContent = "Remove";
                    removeButton.className = 'btn btn-sm btn-danger';
                    removeButton.addEventListener('click', function() {
                        newQuestionDiv.remove();
                        updateQuestionsInput();
                    });

                    actionCell.appendChild(removeButton);

                    newQuestionDiv.appendChild(questionCell);
                    newQuestionDiv.appendChild(answerCell);
                    newQuestionDiv.appendChild(actionCell);
                    dynamicQuestionsDiv.appendChild(newQuestionDiv);

                    updateQuestionsInput();
                });
            });

            function updateQuestionsInput() {
                const currentQuestions = Array.from(dynamicQuestionsDiv.querySelectorAll('.question-box')).map(row => row.querySelector('td:first-child').textContent);
                questionsInput.value = JSON.stringify(currentQuestions);
            }
        });
    </script>

    <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Prepopulate the hidden input with existing questions
        const dynamicQuestionsDiv = document.getElementById('dynamic-questions');
        const questionsInput = document.getElementById('questions');
        const existingQuestions = Array.from(dynamicQuestionsDiv.querySelectorAll('.question-box')).map(div => div.textContent);
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

                console.log(question);
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
            const currentQuestions = Array.from(dynamicQuestionsDiv.querySelectorAll('.question-box')).map(div => div.querySelector('span').textContent);
            questionsInput.value = JSON.stringify(currentQuestions);
        }
    });
</script> -->



<script>
        document.addEventListener("DOMContentLoaded", function() {
            const questions = @json($templateForm->question);
            const dynamicQuestionsContainer = document.getElementById('dynamic-questions');
            const hiddenInput = document.getElementById('questions');
            // console.log(hiddenInput);
            const saveButton = document.querySelector('button[name="action"][value="save"]');
            const quesButtons = document.querySelectorAll('.ques-btn');

            function updateHiddenInput() {
                const questionElements = dynamicQuestionsContainer.getElementsByClassName('question-box');
                const questionsArray = Array.from(questionElements).map(q => q.querySelector('.question-text').textContent.trim());
                hiddenInput.value = JSON.stringify(questionsArray);
            }

            function addQuestion(questionText) {
                const questionBox = document.createElement('tr');
                // console.log(questionBox);
                questionBox.classList.add('question-box');
                console.log(questionBox);
                questionBox.innerHTML = `
                    <td class="question-text">${questionText}</td>
                    <td><input type="radio" name="option_${questionText.replace(/\s+/g, '_').toLowerCase()}" value="Strongly Disagree"></td>
                    <td><input type="radio" name="option_${questionText.replace(/\s+/g, '_').toLowerCase()}" value="Disagree"></td>
                    <td><input type="radio" name="option_${questionText.replace(/\s+/g, '_').toLowerCase()}" value="Neutral"></td>
                    <td><input type="radio" name="option_${questionText.replace(/\s+/g, '_').toLowerCase()}" value="Agree"></td>
                    <td><input type="radio" name="option_${questionText.replace(/\s+/g, '_').toLowerCase()}" value="Strongly Agree"></td>
                    <td><button type="button" class="btn btn-danger btn-sm ms-2 remove-btn">
                        <i class="fas fa-trash"></i>
                    </button></td>
                `;
                dynamicQuestionsContainer.appendChild(questionBox);

                questionBox.querySelector('.remove-btn').addEventListener('click', function() {
                    dynamicQuestionsContainer.removeChild(questionBox);
                    updateHiddenInput();
                });
            }

            if (Array.isArray(questions)) {
                questions.forEach(question => addQuestion(question));
                console.log(questions);
            }

            quesButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const questionText = this.getAttribute('data-question');
                    addQuestion(questionText);
                    updateHiddenInput();
                });
                
            });
            saveButton.addEventListener('click', updateHiddenInput);
        });
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection