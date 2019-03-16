<table border="1px solid black">
    <thead>
              <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Адрес</th>
                <th>Телефон</th>
                <th>Почта</th>
              </tr>
    </thead>
    <tbody>
              
              
              <tr>
                <th>
                 {{$data['name']}}
                </th>
                <th>
                  {{$data['surname']}} 
                </th>
                <th>
                  {{$data['address']}}
                </th>
                <th>
                  {{$data['mobile']}}
                </th>
                <th>
                  {{$data['email']}}
                </th>
              </tr>
              
    </tbody>
</table>
<br>
<hr>
<br>
<table border="1px solid black">
            <thead>
              <tr>
               
                <th>Название товара</th>
                <th>Код товара</th>
                <th>Количество</th>
                <th>Цена за ед.</th>
                <th>Общая цена</th>
             
              </tr>
            </thead>

            <tbody>
              @foreach($data['products'] as $k=>$product)
              
              <tr>
                <th>
                 {{$product->name}}
                </th>
                <th>
                 {{$product['attributes']->code}}
                </th>
                <th>
                  {{$product->quantity}} 
                </th>
                <th>
                  {{$product->price}}KZT
                </th>
                <th>
                  {{$product->price * $product->quantity}}KZT
                </th>
              </tr>
              @endforeach
            </tbody>
</table>  
<h4>Общая сумма: {{ $data['total'] }} тенге.</h4>