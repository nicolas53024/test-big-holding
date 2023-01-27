@extends('main')
@section('content')
    <div class="d-flex justify-content-center">
        <h1>Usuarios</h1>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Identification number</th>
                    <th scope="col">Created at</th>
                    <th class="d-flex justify-content-center" scope="col">Transacciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td>{{ $item['user_id'] }}</td>
                        <td>{{ $item['identification_number'] }}</td>
                        <td>{{ $item['created_at'] }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('users.transaction', ['client_id'=>$item['user_id']]) }}" class="btn btn-primary">Ver</a>
                        </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @php
    @endphp
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ route('users', ['page' => $currentPage - 1]) }}"
                    @if ($currentPage <= 1) {!! 'style=pointer-events:none;' !!} @endif>
                    Previous
                </a>
            </li>
            @for ($i = 1; $i <= $pages; $i++)
                <li class="page-item  @if ($currentPage== $i) {{"active"}} @endif">
                    <a class="page-link" href="{{ route('users', ['page' => $i]) }}">
                        {{ $i }}
                    </a>
                </li>
            @endfor
            <a class="page-link" href="{{ route('users', ['page' => $currentPage + 1]) }}"
                @if ($currentPage == $pages - 1) {!! 'style=pointer-events:none;' !!} @endif>
                Next
            </a>
        </ul>
    </nav>
    </div>
@endsection
