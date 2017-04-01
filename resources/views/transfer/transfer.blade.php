@extends('layouts.app')

@section('content')


    <h1>Transfer Yapın</h1>

    <div class="transfer">


         <ul role="tablist">
            <li role="presentation" class="active">
                <a href="#arkadas" aria-controls="arkadas" role="tab" data-toggle="tab">
                     Arkadaşına Transfer Yap <i class="fa fa-user-plus"></i></a>

            </li>
            <li role="presentation">
                <a href="#site" aria-controls="site" role="tab" data-toggle="tab">
                    <i class="fa fa-retweet"></i> Siteler Arası Transfer Yap</a>
            </li>
        </ul>

         <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="arkadas">

                <div class="txt lines">
                        {!! config('settings.site_transfer_yardim') !!}
                </div>

                <div class="puts row">
                    {!! Form::open(['url' => '/transfer/create','method' => 'post']) !!}
                    <input type="hidden" name="type" value="1">
                    <input type="hidden" name="user_id" value="{!! $user->id !!}">
                    <input type="hidden" name="user_name" value="{!! $user->username !!}">
                        <div class="col-md-3">
                            <div>
                                <label for="">Miktar</label>
                                <input type="text" name="amount" placeholder="000 TL">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div>
                                <label for="">Arkadaşınızın</label>
                                <input type="text" name="to_user" placeholder="Username...">

                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6">
                            <button type="submit" class="form-button fr">Transfer Et<i class="fa fa-chevron-right"></i></button>

                        </div>

                    {!! Form::close() !!}
                </div>



            </div>
            <div role="tabpanel" class="tab-pane" id="site">

                <div class="txt lines">
                    {!! config('settings.site_transfer_yardim') !!}
                </div>

                 <?php $sites =  \App\Site::all() ?>
                <div class="puts row">

                    {!! Form::open(['url' => '/transfer/create','method' => 'post']) !!}
                    <input type="hidden" name="type" value="2">
                    <input type="hidden" name="to_user" value="0">
                    <input type="hidden" name="user_id" value="{!! $user->id !!}">
                    <input type="hidden" name="user_name" value="{!! $user->username !!}">
                        <div class="col-md-4">
                            <div style="float: left;width:60%;">
                                <label for="">Nereden</label>
                                <select name="site_id" id="" style=" border-right: 0 !important; border-top-right-radius: 0; border-bottom-right-radius: 0; ">
                                    @foreach($sites as $site)
                                    <option value="{!! $site->id !!}">{!! $site->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="float: left;width:40%;">
                                <label for="">Miktar</label>
                                <input style="border-top-left-radius: 0; border-bottom-left-radius: 0; " type="text" name="amount" placeholder="000 TL">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <label for="">Nereye</label>
                                <select name="to_site_id" id="">
                                    @foreach($sites as $site)
                                        <option value="{!! $site->id !!}">{!! $site->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <button type="submit" class="form-button fr">Transfer Et<i class="fa fa-chevron-right"></i></button>
                        </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>


    </div>


@endsection
