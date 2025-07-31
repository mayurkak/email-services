<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap');

    body {
        background: #EEEEEE;
        /* font-family: 'Hind Siliguri', sans-serif; */
    }

    .card {
        width: 700px;
        height: auto;
        border: none;
        margin-right: 461px;
        border-radius: .95rem;
        margin-right: -220px;
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

    input[type="radio"] {
        display: none;
    }

    .container .d-flex .justify-content-center {
        max-height: 700px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin-left: 581px;
    }
    </style>
</head>
@include('templates\email\ques_head')

<body>

    <form action="{{ route('store_response') }}" method="post" class="custom-form" id="formTemplate">
        @csrf
        <input type="hidden" name="form_id" value="{{ $template->id }}">
        <input type="hidden" name="form_name" value="{{ $template->form_name }}">
        <div class="container d-flex justify-content-center">
            <div class="card mt-5 pb-5">
                <div class="d-flex flex-row justify-content-between p-3 adiv text-white">
                    <i class="fas fa-chevron-left"></i>
                    <span class="pb-3">feedback</span>
                    <i class="fas fa-times"></i>
                </div>
                <p>Template ID: {{ $template->id }} Template Name: {{ $template->form_name }}</p>
                <div class="mt-2 p-4 text-center">
                    <h6 class="mb-0">Your feedback help us to improve.</h6>
                    <small class="px-3">Please let us know about your chat experience.</small>
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

                        <div class="col-12">
                            <div id="dynamic-questions"></div>
                            <input type="hidden" id="questions" name="questions">
                            <input type="hidden" id="response" name="response">
                        </div>
                        <div class="form-group mt-4">
                            <textarea type="text" class="form-control" rows="4" placeholder="Comment"></textarea>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary btn-block" name="action"
                                value="save"><span>Send</span></button>
                        </div>
                        <p class="mt-3">Continue without sending feedback</p>
                    </div>
                </div>
            </div>
    </form>
    @auth
            <button type="button" class="btn btn-secondary" id="sendFormButton" data-id="{{ $templateForm->id }}" >Send Form</button>
    @endauth
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
</body>

</html>