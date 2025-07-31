<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap');

    body {
        background: #EEEEEE;
        font-family: 'Hind Siliguri', sans-serif;
    }

    .card {
        width: 700px;
        height: auto;
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
@extends('layout.header2')
@include('templates\email\ques_head')
@section('content')


<body>
    <!-- <div class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvasExample"
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
    </div> -->
    <!-- Button to open the modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Open Modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
    </div>
</div>

    <form action="{{ route('form.update', ['id' => $templateForm->id])}}" method="post" class="custom-form" id="formTemplate">
        @csrf
        <input type="hidden" name="form_id" value="{{ $template->id }}">
        <div class="container d-flex justify-content-center">
            <div class="card mt-5 pb-5">
                <div class="d-flex flex-row justify-content-between p-3 adiv text-white">
                    <i class="fas fa-chevron-left"></i>
                    <span class="pb-3">feedback</span>
                    <p>Template ID: {{ $template->id }} Template Name: {{ $template->form_name }}</p>
                    <i class="fas fa-times"></i>
                </div>
                <div class="mt-2 p-4 text-center">
                    <h6 class="mb-0">Your feedback help us to improve.</h6>
                    <small class="px-3">Please let us know about your chat experience.</small>
                    <div class="mb-3">
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
                    <div id="dynamic-questions"></div>
                    <input type="hidden" id="questions" name="questions">
                    <div class="form-group mt-4">
                        <textarea class="form-control" rows="4" placeholder="Comment"></textarea>
                    </div>
                    <div class="mt-2">
                        <!-- <button type="button" class="btn btn-primary btn-block"><span>Send feedback</span></button> -->
                        <button type="submit" class="btn btn-primary btn-block" name="action" value="save">Save</button>
                    </div>
                    <p class="mt-3">Continue without sending feedback</p>
                </div>
            </div>
        </div>
    </form>


<script>
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

                const ratingDiv = document.createElement('div');
                ratingDiv.className = 'rating mt-2';

                // Emojis representing different ratings
                const emojis = ['😄', '😐', '😡'];

                for (let i = 0; i < emojis.length; i++) {
                    const radioInput = document.createElement('input');
                    radioInput.type = 'radio';
                    radioInput.name = 'dynamic-rating-' + question;
                    radioInput.value = i + 1;
                    radioInput.id = 'dynamic-rating-' + question + '-' + (i + 1);

                    const label = document.createElement('label');
                    label.setAttribute('for', radioInput.id);
                    label.textContent = emojis[i];
                    label.style.fontSize = '24px'; 

                    ratingDiv.appendChild(radioInput);
                    ratingDiv.appendChild(label);
                }

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-sm btn-danger mt-2';
                removeButton.innerHTML = '<i class="fas fa-trash-alt"></i>'; 
                removeButton.addEventListener('click', function() {
                    newQuestionDiv.remove();
                    updateQuestionsInput();
                });

                newQuestionDiv.appendChild(questionText);
                newQuestionDiv.appendChild(ratingDiv);
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
</script>



<script>
    document.addEventListener("DOMContentLoaded", function() {
    const questions = @json($templateForm->question);
    const dynamicQuestionsContainer = document.getElementById('dynamic-questions');
    const hiddenInput = document.getElementById('questions');
    const saveButton = document.querySelector('button[name="action"][value="save"]');

    function updateHiddenInput() {
        const questionElements = dynamicQuestionsContainer.getElementsByClassName('question-box');
        const questionsArray = Array.from(questionElements).map(q => q.querySelector('span').textContent.trim());
        hiddenInput.value = JSON.stringify(questionsArray);
    }

    function addQuestion(questionText) {
        const questionBox = document.createElement('div');
        questionBox.classList.add('question-box');
        
        const emojis = ['😄', '😐', '😡'];
        const ratingDiv = document.createElement('div');
        ratingDiv.className = 'rating mt-2';

        for (let i = 0; i < emojis.length; i++) {
            const radioInput = document.createElement('input');
            radioInput.type = 'radio';
            radioInput.name = 'dynamic-rating-' + questionText;
            radioInput.value = i + 1;
            radioInput.id = 'dynamic-rating-' + questionText + '-' + (i + 1);

            const label = document.createElement('label');
            label.setAttribute('for', radioInput.id);
            label.textContent = emojis[i];
            label.style.fontSize = '24px'; 

            ratingDiv.appendChild(radioInput);
            ratingDiv.appendChild(label);
        }

        questionBox.innerHTML = `
            <span>${questionText}</span>
            <i class="fas fa-trash-alt"></i>
        `;
        
        questionBox.appendChild(ratingDiv);
        dynamicQuestionsContainer.appendChild(questionBox);

        questionBox.querySelector('.fas').addEventListener('click', function() {
            dynamicQuestionsContainer.removeChild(questionBox);
            updateHiddenInput();
        });
    }

    // Initialize with existing questions
    if (Array.isArray(questions)) {
        questions.forEach(question => addQuestion(question));
    }

    saveButton.addEventListener('click', updateHiddenInput);
});
</script>
   
</body>

</html>
@endsection