require('./bootstrap'); 

import React from 'react'
import ReactDOM from 'react-dom/client'
import Cart from './components/cart';

let totalprice;
let products; 
window.totalprice ? totalprice = window.totalprice : totalprice = 0
window.cart ? products = window.cart : products = {}

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<Cart products={products} totalprice={totalprice}/>);
