<table class="table table-hover table-borderless table-sm mb-0">
    <thead>
        <th scope="col">N°</th>
        <th scope="col">{{__('salesroom.description')}}</th>
        <th scope="col">{{__('salesroom.unit')}}</th>
        <th scope="col">{{__('salesroom.quantity')}}</th>
        <th scope="col">{{__('salesroom.totalPrice')}}</th>
    </thead>
    <tbody>
        <?php $number = 1; $total=0; $subtotal=0; $igv=0; ?>
        @foreach($ticket->products as $product)
            <tr>
                <td>{{$number}}</td>
                <td>{{$product->description}}</td>
                <td>s/{{number_format($product->price,2,'.',' ')}}</td>
                <td>{{$product->pivot->cant}}</td>
                <td>s/{{number_format($product->pivot->total,2,'.',' ')}}</td>
            </tr>
            <?php $number++; $total += $product->pivot->total; ?>
        @endforeach
            <?php $igv = $total * 0.18; $subtotal = $total-$igv; ?>
            <tr class="bg-light">
                <td colspan="4" class="font-weight-bold text-right">Sub Total: </td>
                <td>s/{{number_format($subtotal,2,'.',' ')}}</td>
            </tr>
            <tr class="bg-light">
                <td colspan="4" class="font-weight-bold text-right">I.G.V(18%)</td>
                <td>s/{{number_format($igv,2,'.',' ')}}</td>
            </tr>
            <tr class="bg-light">
                <td colspan="4" class="font-weight-bold text-right">TOTAL: </td>
                <td>s/{{number_format($total,2,'.',' ')}}</td>
            </tr>
    </tbody>
</table>
<script>
    var total = {{$total}};
</script>