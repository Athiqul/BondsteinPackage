<?php

use Illuminate\Support\Facades\Route;
use Athiq\Bondsteinscrud\Http\Controllers\Skills;

Route::get('/items',function(){

    return view('crud::show_items');
});
Route::group(['namespace'=>'Athiq\Bondsteinscrud\Http\Controllers'],function(){

     Route::get('/items',[Skills::class,'index'])->name('home');
     Route::get('/create',[Skills::class,'create'])->name('skill.create');
     Route::post('/create',[Skills::class,'store'])->name('skill.store');
     Route::get('/show-skill',[Skills::class,'show'])->name('skill.show');
     Route::get('/skill-edit/{id}',[Skills::class,'edit'])->name('skill.edit');
     Route::patch('/skill-update/{id}',[Skills::class,'storeUpdate'])->name('skill.update');
     Route::get('/skill-delete/{id}',[Skills::class,'deleteSkill'])->name('skill.delete');
});

?>
