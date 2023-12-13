<!DOCTYPE html>
<html>

<head>
    <title>New Order</title>
</head>

<body>
    <h2>Your Order Number is {{$mailData->id}}</h2>
    <h4>Hi {{$mailData->name}}, Your order will be delivered to the below address</h4>
    <p></p>
    <p>
        {{$mailData->line_1}}, {{$mailData->line_2}}, {{$mailData->city}}, {{$mailData->state}},
        {{$mailData->country}}, {{$mailData->pincode}},
    </p>
</body>

</html>