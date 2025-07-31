<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
</head>
<body>
    <h1>{{ $template->form_name }}</h1>
    <form action="{{ route('form.save') }}" method="post">
        @csrf
        <input type="hidden" name="form_id" value="{{ $template->form_id }}">
        @foreach($template->questions as $question)
            <div>
                <label>{{ $question }}</label>
                <input type="text" name="answers[]">
            </div>
        @endforeach
        <button type="submit">Submit</button>
    </form>
</body>
</html>
