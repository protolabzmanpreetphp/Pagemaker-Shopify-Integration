<?php

use Illuminate\Support\Facades\Auth;

$shop = Auth::user();

echo "<h3>";
// echo "<h1>Current Theme is : " . $shopData['activeThemeName'] . "</h1>";
echo "<pre>";
// print_r($shop);
echo $shop;
echo "</pre>";

echo "User :  " . $shop->name;
echo "<br>Password : " . $shop->password;
echo "<br>Password : " . $shop->email;
echo "<br>token : " . $shop->password;
echo "</h3>";
