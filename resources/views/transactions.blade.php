@extends('main')
@section('content')
    <div class="d-flex justify-content-center">
        <h1>Transacciones</h1>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Client Id</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                @forelse  ($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $transaction['id'] }}</th>
                    <td>{{ $transaction['client_id'] }}</td>
                    <td>{{ $transaction['transaction_detail'] }}</td>
                    <td>{{ $transaction['created_at'] }}</td>
                </tr>
                    
                @empty
                    <h2>El cliente no tiene transacciones</h2>
                @endforelse
            </tbody>
        </table>
    </div>
    @php
    @endphp
    </div>
@endsection
