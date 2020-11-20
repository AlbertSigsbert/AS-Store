
@if (count($errors) > 0)
<div class="container padding-medium">
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
               <li class="list-group-item">{!!$error!!}</li>
            @endforeach
        </ul>
     </div>
</div>
@endif

@if (session('success'))
<div class="container  padding-medium">
<div class="alert alert-success">
    {{session('success')}}
</div>
</div>
@endif

@if (session('error'))
<div class="container  padding-medium">
<div class="alert alert-danger">
    {{session('error')}}
</div>
</div>
@endif

@if (session()->has('status'))
<div class="alert alert-success">
    {{ session()->get('status') }}
</div>
@endif
