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

                        <div id="dynamic-questions"></div>
                        <input type="hidden" id="questions" name="questions">
                        <div class="form-group mt-4">
                            <textarea type="text" class="form-control" rows="4" placeholder="Comment"></textarea>
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-primary btn-block"><span>Send feedback</span></button>
                            <button type="submit" class="btn btn-primary" name="action" value="save">Save</button>
                        </div>
                        <p class="mt-3">Continue without sending feedback</p>
                    </div>
                </div>
            </div>
    </form>

    <!-- <script>
    document.querySelectorAll('.ques-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const question = this.getAttribute('data-question');
            const dynamicQuestionsDiv = document.getElementById('dynamic-questions');

            const newQuestion = document.createElement('h6');
            newQuestion.textContent = question;

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = "Remove";
            removeButton.className = 'btn btn-sm btn-danger mt-2';

            const inputField = document.createElement('input');
            inputField.type = 'text';
            inputField.name = 'answers[]';
            inputField.placeholder = `Your answer for: ${question}`;
            inputField.className = 'form-control mt-2';

            removeButton.addEventListener('click', function() {
                inputField.remove();
                newQuestion.remove();
                removeButton.remove();
            });

            dynamicQuestionsDiv.appendChild(newQuestion);
            dynamicQuestionsDiv.appendChild(inputField);
            dynamicQuestionsDiv.appendChild(removeButton);

            const questionsInput = document.getElementById('questions');
            const currentQuestions = questionsInput.value;
            const updatedQuestions = currentQuestions ? `${currentQuestions},${question}` : question;
            console.log(updatedQuestions);
            questionsInput.value = updatedQuestions;
        });
    });
    </script> -->
    <script>
        document.querySelectorAll('.ques-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const question = this.getAttribute('data-question');
                const dynamicQuestionsDiv = document.getElementById('dynamic-questions');

                // const newQuestion = document.createElement('h6');
                // newQuestion.textContent = question;
                const newQuestion = document.createElement('input');
                newQuestion.type = 'text';
                newQuestion.name = 'question[]';
                newQuestion.className = 'form-control mt-2';
                newQuestion.value = question

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.textContent = "Remove";
                removeButton.className = 'btn btn-sm btn-danger mt-2';

                const inputField = document.createElement('input');
                inputField.type = 'text';
                inputField.name = 'answers[]';
                inputField.placeholder = `Your answer for: ${question}`;
                inputField.className = 'form-control mt-2';

                removeButton.addEventListener('click', function() {
                    inputField.remove();
                    newQuestion.remove();
                    removeButton.remove();
                });

                dynamicQuestionsDiv.appendChild(newQuestion);
                dynamicQuestionsDiv.appendChild(inputField);
                dynamicQuestionsDiv.appendChild(removeButton);

                const questionsInput = document.getElementById('questions');
                const currentQuestions = questionsInput.value ? JSON.parse(questionsInput.value) : [];
                currentQuestions.push(question);
                questionsInput.value = JSON.stringify(currentQuestions);
            });
        });
    </script>
</body>

</html>