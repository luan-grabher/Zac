<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Removido o registro para o usuário
Route::redirect('/register', '/login');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/' . __('notices'), function () {
        return "Noticias";
    })->name('notices')->middleware('permission:browse_notices');

    Route::get('/' . __('tasks'), function () {
        return "Tarefas";
    })->name('tasks');

    Route::get('/' . __('robots'), function () {
        return "Robos";
    })->name('robots');

    Route::get('/' . __('birthday_messages'), function () {
        return "Mensagens de Aniversário";
    })->name('birthday_messages');

    Route::get('/' . __('overtime_calendar'), function () {
        return "Calendário de Horas Extras";
    })->name('overtime_calendar');
});
