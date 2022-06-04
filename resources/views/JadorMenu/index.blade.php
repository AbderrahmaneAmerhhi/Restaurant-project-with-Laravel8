
@extends('layout.app')

@section('content')
    <!-- cart item -->
    <div class="small-container cart-page mb-4">
        <table>
            <tr>
                <th>Menu</th>
                <th>total</th>
            </tr>

                @foreach ($MenuJadors as $item)
                     <tr>
                        <td>
                            <div class="cart-info">
                                <img src="{{asset('images/menu/'.$item->Menu->image)}}" alt="">
                                <div>
                                    <h3>{{$item->Menu->title}}</h3>
                                    <small>{{$item->Menu->description}}</small>
                                    </br>
                                        {{-- remove menu from cart form --}}
                                        <form action="{{route('Jador.destroy',$item->id)}}"
                                                    method="POST"
                                                    id="removeItemform">
                                            @csrf
                                            @method("DELETE")
                                            <button class="removeBtn" type="submit">Remove</button>
                                        </form>
                                </div>
                            </div>
                        </td>
                        <td class="price">Price : {{$item->Menu->pric}} MAD</td>


                    </tr>
                @endforeach
        </table>


    </div>
@endsection
