<?=headerCliente();?>
<?=navCliente();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción del Producto</title>
    <style>
        .product {
            cursor: pointer;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            display: inline-block;
            width: 150px;
            text-align: center;
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .description {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="product" onclick="showDescription('leche-gato')">
        <img src="path_to_your_image/leche_gato.png" alt="Leche para Gato">
        <p>LECHE PARA GATO</p>
        <p>Presentación de 120gr</p>
        <p>S/15.00</p>
    </div>

    <div class="description" id="leche-gato">
        <h2>LECHE PARA GATO</h2>
        <p>Presentación de 120gr</p>
        <p>Precio: S/15.00</p>
        <p>Descripción del producto: Esta leche para gato es un complemento alimenticio ideal para tu mascota. Es rica en nutrientes y fácil de digerir.</p>
    </div>

    <div class="product" onclick="showDescription('nd-prime')">
        <img src="path_to_your_image/nd_prime.png" alt="N&D Prime Feline Kitten">
        <p>N&D Prime Feline Kitten</p>
        <p>Presentación de 7.5kg</p>
        <p>S/208.00</p>
    </div>

    <div class="description" id="nd-prime">
        <h2>N&D Prime Feline Kitten</h2>
        <p>Presentación de 7.5kg</p>
        <p>Precio: S/208.00</p>
        <p>Descripción del producto: N&D Prime Feline Kitten es un alimento completo y balanceado para gatitos y para hembras en el tercio final de la gestación y lactancia. Contiene proteína de pollo de alta calidad y un óptimo equilibrio de minerales. Está enriquecido con frutas y legumbres y esencias botánicas como Té Verde, Alfalfa, Aloe Vera y Psyllium.</p>
    </div>

    <script>
        function showDescription(productId) {
            // Ocultar todas las descripciones
            var descriptions = document.querySelectorAll('.description');
            descriptions.forEach(function(description) {
                description.style.display = 'none';
            });

            // Mostrar la descripción del producto seleccionado
            var selectedDescription = document.getElementById(productId);
            selectedDescription.style.display = 'block';
        }
    </script>
</body>
</html>
<?=footerCliente();?>