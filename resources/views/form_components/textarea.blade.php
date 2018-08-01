

<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">
    {{ Form::label($name, $label_name, ['class' => 'control-label']) }}

    {{ Form::textarea($name, $value, array_merge(['class' => 'form-control',"id" => "editor1"])) }}

    @if ($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
<script>
    CKEDITOR.replace('editor1');
</script>