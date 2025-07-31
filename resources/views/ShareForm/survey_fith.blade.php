<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    </style>
</head>
<body>
@php
    $user = auth()->user();
@endphp
    <form action="{{ route('store_response') }}" method="post" class="custom-form" id="formTemplate">
        <h2>Feedback Form</h2>
        @csrf
        <input type="hidden" name="form_id" value="{{ $templateForm->id }}">
        <input type="hidden" name="form_name" value="{{ $templateForm->form_name }}">
        <div class="form-group">
            
            <input type="hidden" class="form-control" name="email" id="email">
        </div>
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
            <input type="hidden" id="response" name="response">
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
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
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
        <button type="submit" class="btn btn-primary" name="action" value="save"
            data-id="{{ $template->id }}">Submit</button>
        </form>
        
        @auth
            <button type="button" class="btn btn-secondary" id="sendFormButton" data-id="{{ $templateForm->id }}" >Send Form</button>
        @endauth

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
<script>
        document.addEventListener("DOMContentLoaded", function() {
        const questions = @json($templateForm -> question);
        const dynamicQuestionsContainer = document.getElementById('dynamic-questions');
        const questionsHiddenInput = document.getElementById('questions');
        const responsesHiddenInput = document.getElementById('response');
        const saveButton = document.querySelector('button[name="action"][value="save"]');

        function updateHiddenInputs() {
            const questionElements = dynamicQuestionsContainer.getElementsByClassName('question-box');
            const questionsArray = Array.from(questionElements).map(q => q.querySelector('span').textContent.trim());
            const responsesArray = Array.from(questionElements).map(q => q.querySelector('input[type="text"]').value.trim());
            questionsHiddenInput.value = JSON.stringify(questionsArray);
            responsesHiddenInput.value = JSON.stringify(responsesArray);
        }

        function addQuestion(questionText) {
            const questionBox = document.createElement('div');
            questionBox.classList.add('question-box');
            questionBox.innerHTML = `
                <div class="d-flex align-items-center">
                    <span class="flex-grow-1">${questionText}</span>
                </div>
                <input type="text" class="form-control mt-2" name="answer_${questionText}" placeholder="Your answer">
            `;
            dynamicQuestionsContainer.appendChild(questionBox);
        }

        if (Array.isArray(questions)) {
            questions.forEach(question => addQuestion(question));
        }

        saveButton.addEventListener('click', updateHiddenInputs);
    });
   
</script>
<script>
    $(document).on('click', '#sendFormButton', function(e) {
        e.preventDefault();

        var formId = $(this).data('id');
        
        $.ajax({
            url: '{{ route("share_form", ["id" => ":id"]) }}'.replace(':id', formId),
            method: 'GET',
           
            success: function(response) {
                alert('Form sent successfully!');
                $('#sendFormButton').prop('disabled', true);
            },
            error: function(xhr, status, error) {
                alert('Failed to send form. Please try again.');
            }
        });
    });
</script>
</html>