@extends('layouts.admin')


@section('heading')
    <h1>Bankalar</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tüm Bankalar</h3>
        </div>


        <div class="box-body">

        {!! Form::model($bank, ['route' => ['admin.banka.update', $bank->id],"method" => "put","files" => true]) !!}

       <div class="form-group">
           <label for="confirmation">Durum</label>

           <select name="confirmation" class="form-control" id="confirmation">
               <option value="0" @if($bank->confirmation == 0) selected @endif>Pasif</option>
               <option value="1" @if($bank->confirmation == 1) selected @endif>Aktif</option>
           </select>

       </div>

        {!! Form::bsText("name","İsim") !!}


        <textarea name="content" class="summernote" id="" cols="30" rows="10">{!! $bank->content !!}</textarea>
        {!! Form::bsSubmit("KAYDET") !!}
        {!! Form::close() !!}
        </div>


    </div>
@endsection