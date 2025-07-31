<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Offcanvas Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <style>
    /* body {
        overflow: hidden;
    } */

    .offcanvas-backdrop {
        display: none !important;
    }

    .offcanvas {
        visibility: visible !important;
        transform: translateX(0) !important;
        transition: none;
        /* Remove animation */
        width: 25%;
    }

    .offcanvas-body {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 15px;
    }

    .btn-secondary {
        width: 100%;
    }

    .question-box ul {
        list-style-type: none;
        padding: 0;
    }

    .question-box li {
        margin: 10px 0;
    }

    .question-box a {
        display: block;
        padding: 10px;
        background: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        text-decoration: none;
        color: #000;
    }

    .question-box a:hover {
        background: #e2e6ea;
    }

    .btn-secondary {
        width: 100%;
    }


    ul {
        list-style-type: none;
    }
    </style>

    <link href="assets/css/form.css" rel="stylesheet">
    <link href="assets/css/questions.css" rel="stylesheet">
</head>

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
    <!-- create_new_sms_template.blade -->
    <form action="{{ route('form.save')}}" method="post" class="custom-form" id="formTemplate">
        @csrf
        <input type="hidden" name="form_id" value="{{ $template->id }}">
        <input type="hidden" name="form_name" value="{{ $template->form_name }}">
        <h3 style="text-align:center;">Feedback Form</h3>
        <!-- <p>Template ID: {{ $template->id }} Template Name: {{ $template->form_name }}</p> -->
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

        <div id="dynamic-questions"></div>
        <input type="hidden" id="questions" name="questions">
        <div class="form-row">
            <div class="col-12">
                <label for="message" class="form-label">Feedback <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="action" value="save">Submit</button>
        <button type="submit" class="btn btn-primary">Share</button>
    </form>

    <script>
    document.querySelectorAll('.ques-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); 
            const question = this.getAttribute('data-question');
            const dynamicQuestionsDiv = document.getElementById('dynamic-questions');

            
            const newQuestion = document.createElement('h5');
            newQuestion.textContent = question;

            const ratingDiv = document.createElement('div');
            ratingDiv.classList.add('rating');

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = "Remove";
            removeButton.className = 'btn btn-sm btn-danger mt-2';

            for (let i = 5; i >= 1; i--) {
                const radioInput = document.createElement('input');
                radioInput.type = 'radio';
                radioInput.name = 'dynamic-rating-' + question;
                radioInput.value = i;
                radioInput.id = 'dynamic-rating-' + question + '-' + i;

                const label = document.createElement('label');
                label.setAttribute('for', radioInput.id);
                label.textContent = '☆';

                ratingDiv.appendChild(radioInput);
                ratingDiv.appendChild(label);
            }

            removeButton.addEventListener('click', function() {
                newQuestion.remove();
                ratingDiv.remove();
                removeButton.remove();
            });
            dynamicQuestionsDiv.appendChild(newQuestion);
            dynamicQuestionsDiv.appendChild(ratingDiv);
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