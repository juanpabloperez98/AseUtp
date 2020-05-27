<div class="form-group">
    {{ Form::label('name','Nombre de la categoria') }}
    {{ Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'Nombre']) }}
</div>
<div class="form-group">
    {{ Form::label('slug','URL') }}
    {{ Form::text('slug', null , ['class'=>'form-control','id' =>'slug','placeholder'=>'Url']) }}
</div>
<div class="form-group">
    {{ Form::label('body','Description') }}
    {{ Form::textarea('body', null , ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar',['class'=>'btn btn-sm btn-primary']) }}
</div>


@section('scripts')
    <script src="{{ asset('js/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#name,#slug").stringToSlug({
                callback: function(text){
                    $("#slug").val(text)
                }
            })
        })
    </script>
    
@endsection


