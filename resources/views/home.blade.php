<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Outside in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <main>
        <h1>Featured Products</h1>
        <p>This is a demo app for showcasing the outside-in approach using DI concepts.</p>

        <ul>
            @foreach ($products as $product)
            <li>
                {{$product->summaryText()}}
            </li>
            @endforeach
        </ul>
    </main>

</body>

</html>