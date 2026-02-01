@extends('layouts.front')

@section('content')
    <div class="container">
        <h2>Your Cart</h2>
        @if(session('success'))
            <div id="toast" style="
        position:fixed;
        top:20px;
        right:20px;
        background:#27ae60;
        color:#fff;
        padding:15px 20px;
        border-radius:5px;
        z-index:9999;
    ">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(() => {
                    document.getElementById('toast').remove();
                }, 3000);
            </script>
        @endif
        @if(session('cart') && count($cart) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp

                @foreach($cart as $item)
                    @php $total += $item['price'] * $item['quantity']; @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ $item['price'] * $item['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h4>Total: ${{ $total }}</h4>

            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="btn btn-warning">Clear Cart</button>
            </form>
        @else
            <p>Your cart is empty</p>
        @endif
    </div>
@endsection
