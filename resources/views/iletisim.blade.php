<?php


foreach (DB::table('users')->get() as $vol){

    DB::table('users')
        ->where('id', $vol->id)
        ->update(['afi_kod' => $vol->id*10]);

}

