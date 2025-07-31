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
    .btn-secondary {
    width:auto;
    margin-top: 500px;
    margin-right: 0px;
}
    
    </style>
   
    <link href="{{asset('assets/css/form.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/questions.css')}}" rel="stylesheet">
</head>

<body>
   
<form action="{{ route('store_response') }}" method="post" class="custom-form" id="formTemplate">
    @csrf
    <input type="hidden" name="form_id" value="{{ $templateForm->id }}"> 
    <input type="hidden" name="form_name" value="{{ $templateForm->form_name }}"> 
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
        
        <div id="dynamic-questions"></div>
        
        <input type="hidden" id="questions" name="questions">
        <div class="form-row">
            <div class="col-12">
                <label for="message" class="form-label">Feedback <span class="text-danger">*</span></label>
                <textarea class="form-control" id="message" name="message" rows="3" ></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="action" value="save">Submit</button>
        
    </form>
    @auth
            <button type="button" class="btn btn-secondary btn-sm" id="sendFormButton" data-id="{{ $templateForm->id }}" style="width: 60px;">Send Form</button>
    @endauth

    <!-- <script>
        document.querySelectorAll('.ques-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); 
                const question = this.getAttribute('data-question');
                const dynamicQuestionsDiv = document.getElementById('dynamic-questions');
                
                const questionContainer = document.createElement('div');
                questionContainer.classList.add('question-container', 'mb-3');

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
                    questionContainer.remove();
                    updateQuestionsInput();
                });

                questionContainer.appendChild(newQuestion);
                questionContainer.appendChild(ratingDiv);
                questionContainer.appendChild(removeButton);

                dynamicQuestionsDiv.appendChild(questionContainer);
                updateQuestionsInput();
            });
        });

        function updateQuestionsInput() {
            const dynamicQuestionsDiv = document.getElementById('dynamic-questions');
            const questions = Array.from(dynamicQuestionsDiv.querySelectorAll('h5')).map(h5 => h5.textContent);
            document.getElementById('questions').value = JSON.stringify(questions);
        }
    </script> -->

<script>
    window.addEventListener('DOMContentLoaded', function() {
    const storedQuestions = @json($templateForm->question); 
    const dynamicQuestionsDiv = document.getElementById('dynamic-questions');

    storedQuestions.forEach((question, index) => {
        const questionContainer = document.createElement('div');
        questionContainer.classList.add('question-container');
        questionContainer.id = 'question-container-' + index;

        const newQuestion = document.createElement('h5');
        newQuestion.textContent = question;

        const ratingDiv = document.createElement('div');
        ratingDiv.classList.add('rating');

        for (let i = 5; i >= 1; i--) {
            const radioInput = document.createElement('input');
            radioInput.type = 'radio';
            radioInput.name = 'dynamic-rating-' + index; 
            radioInput.value = i;
            radioInput.id = 'dynamic-rating-' + index + '-' + i;

            const label = document.createElement('label');
            label.setAttribute('for', radioInput.id);
            label.textContent = '☆';

            ratingDiv.appendChild(radioInput);
            ratingDiv.appendChild(label);
        }

        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.className = 'btn btn-sm btn-danger';
        // removeButton.classList.add('remove-button');
        removeButton.addEventListener('click', function() {
            dynamicQuestionsDiv.removeChild(questionContainer);
        });

        questionContainer.appendChild(newQuestion);
        questionContainer.appendChild(ratingDiv);
        questionContainer.appendChild(removeButton);

        dynamicQuestionsDiv.appendChild(questionContainer);
        });
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