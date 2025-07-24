@extends('Layouts.layout')

@section('content')
<div class="container mt-5">
    <h2>Демонстрация важности DTO: форма пользователя</h2>
    <form method="POST" action="{{ route('dto.user') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Возраст</label>
            <input type="number" class="form-control" id="age" name="age" required min="0">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    @if(session('dto'))
        <div class="alert alert-success mt-4">
            <h4>Данные DTO:</h4>
            <pre>{{ print_r(session('dto'), true) }}</pre>
        </div>
    @endif
</div>
@endsection
