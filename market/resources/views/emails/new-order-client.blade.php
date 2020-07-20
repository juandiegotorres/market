<!DOCTYPE html>
<html lang="es">

<head>
    <title>Nuevo Pedido</title>
</head>

<body>
    <p>Su pedido se ha realizado con éxito, en breve un administrador se contactará con usted para coordinar el envío</p>
    <p>Detalles del pedido:</p>
    <ul>
        @foreach ($cart->details as $detail)
        <li>
            {{ $detail->product->name }} x{{ $detail->quantity }}
            ($ {{ $detail->quantity * $detail->product->price }})
        </li>
        @endforeach
    </ul>
    <p>Datos personales:</p>
    <ul>
        <li>
            <strong>Fecha del pedido:</strong>
            {{ $cart->order_date }}
        </li>
        <li>
            <strong>Nombre:</strong>
            {{ $user->name }}
        </li>
        <li>
            <strong>E-mail:</strong>
            {{ $user->email }}
        </li>

    </ul>
    <hr>
</body>

</html>