require('./bootstrap'); 

import React from 'react'
import ReactDOM from 'react-dom/client'
import Cart from './components/cart';


const products = window.cart
const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<Cart products={products}/>);
