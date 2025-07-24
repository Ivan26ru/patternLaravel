@extends('Layouts.layout')

@section('content')
    <div class="container mt-5">
        Уважаемый {{$user}},
        <br>Вы {{ $applyUpdates > 0 ? 'успешно, ' . $applyUpdates . ' всего обновлений' : 'не успешно' }} обновили профиль
    </div>
@endsection
