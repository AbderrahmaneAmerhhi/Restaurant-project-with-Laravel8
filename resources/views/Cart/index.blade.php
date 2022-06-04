
@extends('layout.app')

@section('content')
    <!-- cart item -->
    <div class="small-container cart-page mb-4">
        <table>
            <tr>
                <th>Menu</th>
                <th>Quantity</th>
                <th>total</th>
            </tr>

                @foreach ($items as $item)
                     <tr>
                        <td>
                            <div class="cart-info">
                                <img src="{{asset('images/menu/'.$item->associatedModel->image)}}" alt="">
                                <div>
                                    <p>{{$item->name}}</p>
                                    <small>Price : {{$item->price}} MAD</small>
                                </br>
                                        {{-- remove menu from cart form --}}
                                        <form action="{{route('cart.remove',$item->id)}}"
                                                    method="POST"
                                                    id="removeItemform">
                                            @csrf
                                            @method("DELETE")
                                            <button class="removeBtn" type="submit">Remove</button>
                                        </form>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="{{route('cart.update',$item->id)}}" method="POST" >
                                @csrf
                                @method('PUT')
                                <input type="number"
                                    name="quantity"
                                    id="quantity"
                                    value="{{$item->quantity}}"
                                    min="1"
                                    max="{{$item->associatedModel->quantity}}"
                                 >
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="fas fa fa-edit"></i>
                                </button>
                            </form>
                            </td>
                        <td class="price">{{$item->quantity * $item->price }} MAD</td>


                    </tr>
                @endforeach
        </table>
        @if (Cart::getSubTotal()>0)
            <div class="total-price">
            <table>
                <tr>
                    <td>SubTotal</td>
                    <td class="fw-bolder">{{Cart::getSubTotal() }} MAD</td>
                </tr>
                 <tr>
                    <td  colspan="2">
                        @if (Cart::getSubTotal()>0)
                                {{-- payment using paypal --}}
                                <div class="row">
                                    <div class="form-group">
                                        <a href="{{route('make.payment')}}" class=" btn-paypal mt-3 ml-2 d-flex align-items-center "  >
                                            <i class="fab fa-cc-paypal mr-1" style="font-size: 1.7rem"></i>   PAY  {{Cart::getSubTotal() }} MAD WITH PAYPAL
                                        </a>
                                    </div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        @endif

    </div>
@endsection
