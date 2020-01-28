
@if (count($errors) > 0)
    <div class="alert alert-danger">
    <strong>
        Erro!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </strong>
        @foreach($errors->all() as $error)
            <p> {{$error}}</p>
        @endforeach
    </div>
@endif

