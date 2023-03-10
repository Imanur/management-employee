@props(['errors'])

@if ($errors)
    <div {{ $attributes->merge(['class'=>'alert alert-danger alert-dismissible fade show','role'=>'alert']) }}>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
