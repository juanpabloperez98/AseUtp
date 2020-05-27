{{ Form::hidden('user_id',auth()->user()->id) }}

<div class="form-group">
    {{ Form::label('category_id','Categorias') }}
    {{ Form::select('category_id',$categories, null, ['class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('name','Titulo del post') }}
    {{ Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'Titulo']) }}
</div>
<div class="form-group">
    {{ Form::label('slug','URL') }}
    {{ Form::text('slug', null , ['class'=>'form-control','id' =>'slug','placeholder'=>'Url']) }}
</div>

<div class="form-group">
    {{ Form::label('file','Imagen') }}
    {{ Form::file('file') }}
</div>

<div class="form-group">
    {{ Form::label('status','Estado') }}
    <label>
        {{ Form::radio('status','PUBLISHED') }} Publicado
    </label>
    <label>
        {{ Form::radio('status','DRAFT') }} Borrador
    </label>
</div>

<div class="form-group">
    {{ Form::label('tags','Etiquetas') }}
    <div>
        @foreach ($tags as $tag)
            <label>
                {{ Form::checkbox('tags[]',$tag->id) }} {{ $tag->name }}
            </label>            
        @endforeach

    </div>

</div>

<div class="form-group">
    {{ Form::label('excerpt','Extracto') }}
    {{ Form::textarea('excerpt',null,['class'=>'form-control','rows'=>'2']) }}

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
    <script src="{{ asset('js/ckeditor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#name,#slug").stringToSlug({
                callback: function(text){
                    $("#slug").val(text)
                }
            })
        })


        CKEDITOR.config.height = 400
        CKEDITOR.config.width = 'auto'

        CKEDITOR.replace('body')

    </script>
    
@endsection




