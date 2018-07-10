<?php

session_start();


$total_price = "0円";
$total_item = 0;

$html_detail = "";

//一応ショッピングカートセッション変数が空ではないことを確認する
if(!empty($_SESSION["shopping_cart"])){

    $html_detail.= '
      <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
          <tr>
            <th>商品名</th>
            <th>個数</th>
            <th>値段</th>
          </tr>
        </thead>
        <tbody>
    ';

    foreach ($_SESSION["shopping_cart"] as $keys => $values) {

      $html_detail.= '
        <tr>
        <td>'.$values["name"].'</td>
        <td>'.$values["num"].'</td>
        <td>'.$values["price"].'</td>
        </tr>
      ';

      //トータル残高は、現状の残高+商品金額*個数
      $total_price = $total_price + ($values["num"] * $values["price"]);
      $total_price .= "円";

    }//end foreach

    $html_detail.= '
          <tr>
          <td></td>
          <td><strong>合計金額</strong></td>
          <td class="text-danger"><strong>'.$total_price.'</strong></td>
          </tr>
        </tbody>
      </table>
    ';


}else{
    $html_detail .= '<strong>カートが空です</strong>';
}

//最後に返却するデータをまとめる
$data = array(
  'cart_detail_html' => $html_detail,
  'total_price' => $total_price
);

echo json_encode($data);

 ?>
