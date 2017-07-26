<?php



$pagseguro = new BrPayments\PagSeguro('wesllenalves@gmail.com', '71A62BA58E394B21ACA1EFC1424EA0C6', true);
$customer = ['Jose Comprador', 11, 99999999, 'c81370030478242398870@sandbox.pagseguro.com.br'];
$shipping = [
    1,
    'Av. PagSeguro',
    99,
    '99o andar',
    'Jardim Internet',
    99999999,
    'Cidade Exemplo',
    'SP',
    'ATA'
];
$products = [
    [1, 'Curso de PHP', 19.99, 20],
    [2, 'Livro de Laravel', 15, 31, 1.5]
];
$result = $pagseguro->payment('REF1234', $customer, $shipping, $products);
extract($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
</head>
<body>
    <button onclick="PagSeguroLightbox('<?php echo $xml->code;?>')">Pagar com lightbox</button>
    <a href="<?php echo $url;?>">Pagar com link padrão</a>
</body>
</html>