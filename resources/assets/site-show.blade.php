@extends('layouts.admin')


@section('heading')
    <h1>Site Düzenle</h1>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{!! $site->name !!} Düzenle</h3>
        </div>


        <div class="box-body">

            {!! Form::model($site, ['route' => ['admin.site.update', $site->id],"method" => "put","files" => true]) !!}

            <div class="form-group">
                <label for="confirmation">Durum</label>

                <select name="durum" class="form-control" id="confirmation">
                    <option value="1" @if($site->durum == 1) selected @endif>Aktif</option>
                    <option value="0" @if($site->durum == 0) selected @endif>Pasif</option>
                </select>

            </div>

            {!! Form::bsText("name","Site adı") !!}
            {!! Form::bsText("link","Link") !!}
            {!! Form::bsFile("img","Site Görsel") !!}
            {!! Form::bsFile("logo","Logo") !!}
            <textarea name="content" class="summernote" id="" cols="30" rows="10">{!! $site->content !!}</textarea>

            {!! Form::bsSubmit("KAYDET") !!}

            {!! Form::close() !!}
        </div>


    </div>
@endsection