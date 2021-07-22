@section('messages')
    @if(session('success-message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success-message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('error-message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error-message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@stop