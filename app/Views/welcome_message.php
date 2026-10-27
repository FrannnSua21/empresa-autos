```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .contenedor {
            background-color: white;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            max-width: 400px;
        }

        h1 {
            color: #333333;
            font-size: 30px;
        }

        p {
            color: #666666;
            font-size: 16px;
            line-height: 1.6;
        }

        button {
            background-color: #e5e7eb;
            color: #333333;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background-color: #d1d5db;
        }
    </style>
</head>

<body>

    <div class="contenedor">
        <h1>¡Bienvenido!</h1>
        <p>Nos alegra tenerte aquí. Esperamos que disfrutes tu visita.</p>
        <button onclick="alert('¡Gracias por visitarnos!')">
            Comenzar
        </button>
    </div>

</body>
</html>
```