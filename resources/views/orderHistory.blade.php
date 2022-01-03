@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Product
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th >Order ID</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>
                                        @foreach ($order as $order)
                                            <form action="{{route('orderHistory')}}" method="post">
                                                @csrf
                                                <tr>
                                                    <input type="hidden" name="orderid" value="{{ $order['id'] }}">
                                                    <td>{{ $order['id'] }}</td>
                                                    <td><button type="submit" class="btn btn-info waves-effect waves-light" >View More</button></td>
                                                </tr>
                                            </form>
                                        @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

