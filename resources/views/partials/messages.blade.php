
@if ($errors->any())
<div class="container padding-medium">
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
               <li class="list-group-item">{{$error}}</li>
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
