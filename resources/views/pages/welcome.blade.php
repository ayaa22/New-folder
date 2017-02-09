@extends('main')
@section('title','| HomePage')

@section('content')     
    <div class="row">
  <div id="comment-form"  class="col-md-8 col-md-offset-2" style="margin-top:20px;">
    
    {{ Form::open(['route'=>['data.validate'],'method'=>'POST','data-parsley-validate'=>'']) }}
      <div class="row">

        <div class="col-md-6">
        {{ Form::label('start','Enter Your Start Date:') }}
        {{ Form::text('start',null,['class'=>'form-control','required'=>'']) }}
        </div>

        <div class="col-md-6">
        {{ Form::label('number','Enter number of your session days:') }}
        {{ Form::text('number',null,['class'=>'form-control','required'=>'','style'=>'margin-bottom:20px;']) }}
        </div>

        {{ Form::label('session','Enter number of required sessions to finish one chapter:') }}
        {{ Form::text('session',null,['class'=>'form-control','required'=>'']) }}

        
        {{Form::submit('Request Sessions Date',['class'=>'btn btn-success btn-block','style'=>'margin-top:20px;'])}}

        </div>

      </div>
    {{ Form::close() }}
  </div>
</div>  
@endsection
