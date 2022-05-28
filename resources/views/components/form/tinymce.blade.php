@props(['id'=> 'id', 'label'=> 'label', 'name'=> 'name'])
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        menubar: false,
        selector: '{{'textarea#'.$id}}', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
    });
</script>
<label class="form-label" for="{{$id}}">{{$label}}</label>
<textarea id="{{$id}}" name="{{$name}}" required>{{$slot}}</textarea>

