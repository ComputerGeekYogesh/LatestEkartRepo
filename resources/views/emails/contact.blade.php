<html>
    <head>

    </head>
    <body>
        <center>
        <h2> Welcome in Ekart online purchase</h2>

        <h3>Tracking No  : {{$contact_data['trackingno']}}</h3>
        <h4>First Name  : {{$contact_data['first_name']}}</h4>
        <h4>Last Name  : {{$contact_data['last_name']}}</h4>
        <h4>Phone Number  : {{$contact_data['phone_no']}}</h4>
        <h4>Alternate Number  : {{$contact_data['alternate_no']}}</h4>
        <h4>Address 1  : {{$contact_data['address1']}}</h4>
        <h4>Address 2  : {{$contact_data['address2']}}</h4>
        <h4>City  : {{$contact_data['city']}}</h4>
        <h4>State  : {{$contact_data['state']}}</h4>
        <h4>Pincode  : {{$contact_data['pincode']}}</h4>
        <h4>Email  : {{$contact_data['email']}}</h4>
    </center>
<hr>
<center>
<table cellpadding="5px" cellspacing="5px" border="1">
    <thead>
<tr>
    <th>Product</th>
    <th>Quantity</th>
    <th>Price</th>

</tr>
    </thead>
    <tbody>
        @php $total="0" @endphp
        @foreach ($items_in_cart as $data)
        <tr>
            <td>{{ $data['item_name'] }}</td>
            <td>{{ $data['item_quantity'] }}</td>
            <td>{{$data['item_price'] }}</td>
        </tr>
            @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
        @endforeach
        @if (!empty($contact_data['discount_price'] && $contact_data['grand_total']))
        <tr>
            <td colspan="2"> Sub Total: </td>
        <td> {{ number_format($total, 2) }} </td>
        </tr>
        <tr>
            <td colspan="2"> Discount: </td>
        <td> {{ number_format($contact_data['discount_price'], 2) }} </td>
        </tr>
        <tr>
            <td colspan="2">Grand Total: </td>
        <td> {{ number_format($contact_data['grand_total'], 2) }} </td>
        </tr>

        @else
        <tr>
            <td colspan="2"> Grand Total: </td>
        <td> {{ number_format($total, 2) }} </td>
        </tr>
        @endif
    </tbody>
</table>
</center>
    </body>

</html>
