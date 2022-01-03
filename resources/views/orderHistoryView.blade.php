@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Order ID #{{$order->id}}
                </div>

                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:50%">Product</th>
                                        <th style="width:10%">Price</th>
                                        <th style="width:8%">Quantity</th>
                                        <th style="width:8%">Category</th>
                                        <th style="width:22%" class="text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                    $i = 1
                                    @endphp
                                    @foreach ($list as $list)

                                        <tr>
                                            <td>{{ $list['name'] }}</td>
                                            <td>{{ $list['brand'] }}</td>
                                            <td>{{ $list['quantity'] }}</td>
                                            <td>{{ $list['category'] }}</td>
                                            <td>{{ $list['price'] }}</td>
                                        </tr>
                                    @endforeach

                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right"><h3><strong>Total ${{ $order->total }}</strong></h3></td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

