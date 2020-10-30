@extends('partials.pagetemplate')

@section('page-content')
 
      <div class="thanks">
        <span>Thank You</span>
        <span>For</span>
        <span>Your Order!</span>
        <p>A confirmation email was sent.</p>
        <a href="{{route('landing-page') }}" class="btn-primary">Home</a>
      </div>
  
@endsection
