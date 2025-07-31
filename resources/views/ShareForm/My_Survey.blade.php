<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
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
<body>

    <form action="{{ route('store_response') }}" method="post" class="custom-form" id="formTemplate">
        @csrf
        <input type="hidden" name="form_id" value="{{ $template->id }}">
        <input type="hidden" name="form_name" value="{{ $template->form_name}}">
        <div class="container d-flex justify-content-center">
            <div class="card mt-5 pb-5">
                <div class="d-flex flex-row justify-content-between p-3 adiv text-white">
                    <i class="fas fa-chevron-left"></i>
                    <span class="pb-3">feedback</span>
                    <!-- <p>Template ID: {{ $template->id }} Template Name: {{ $template->form_name }}</p> -->
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
                        <button type="submit" class="btn btn-primary" name="action" value="save">Send feedback</button>
                    </div>
                    <p class="mt-3">Continue without sending feedback</p>
                </div>
            </div>
        </div>
    </form>
    <script>
    document.querySelectorAll('.ques-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const question = this.getAttribute('data-question');
            const dynamicQuestionsDiv = document.getElementById('dynamic-questions');

            const questionContainer = document.createElement('div');
            questionContainer.className = 'question-container';

            const newQuestion = document.createElement('h6');
            newQuestion.textContent = question;
            newQuestion.className = 'question-text';

            const actionColumn = document.createElement('div');
            actionColumn.className = 'action-column';

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = "Remove";
            removeButton.className = 'btn btn-sm btn-danger';

            const imageContainer = document.createElement('div');
            imageContainer.className = 'd-flex flex-row justify-content-center mt-2';

            const images = [{
                    src: "https://img.icons8.com/emoji/48/000000/angry-face-emoji--v2.png",
                    alt: "angry"
                },
                {
                    src: "https://img.icons8.com/fluent/48/000000/sad.png",
                    alt: "sad"
                },
                {
                    src: "https://img.icons8.com/color/48/000000/happy.png",
                    alt: "happy"
                },
                {
                    src: "https://img.icons8.com/emoji/48/000000/smiling-face.png",
                    alt: "smiling"
                },
                {
                    src: "https://img.icons8.com/color/48/000000/lol.png",
                    alt: "lol"
                }
            ];

            images.forEach(imgData => {
                const img = document.createElement('img');
                img.src = imgData.src;
                img.alt = imgData.alt;
                img.className = 'feedback-img';
                img.addEventListener('click', function() {
                    imageContainer.querySelectorAll('.feedback-img').forEach(i => i
                        .classList.remove('selected'));
                    img.classList.add('selected');
                });
                imageContainer.appendChild(img);
            });

            removeButton.addEventListener('click', function() {
                questionContainer.remove();
                imageContainer.remove();
            });

            actionColumn.appendChild(removeButton);
            questionContainer.appendChild(newQuestion);
            questionContainer.appendChild(actionColumn);
            dynamicQuestionsDiv.appendChild(questionContainer);
            dynamicQuestionsDiv.appendChild(imageContainer);

            const questionsInput = document.getElementById('questions');
            const currentQuestions = questionsInput.value;
            const updatedQuestions = currentQuestions ? `${currentQuestions},${question}` : question;
            console.log(updatedQuestions);
            questionsInput.value = updatedQuestions;
        });
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>