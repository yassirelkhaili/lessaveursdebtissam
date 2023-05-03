import React from 'react'
import { Fragment, useState } from 'react'
import { Dialog, Transition } from '@headlessui/react'
import { XMarkIcon } from '@heroicons/react/24/outline'
import axios from 'axios'

const Cart = ({products, totalprice}) => { 
    const [open, setOpen] = useState(false)
    const [items, setproducts] = useState(products)
    const [price, setprice] = useState(totalprice)
    const handleClick = () => {
        setOpen(!open)
    } 
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.xsrfCookieName = 'XSRF-TOKEN';
    axios.defaults.xsrfHeaderName = 'X-XSRF-TOKEN';
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const url = document.querySelector('meta[name="app_url"]').getAttribute('content');
    const handleDelete = (id) => {
      axios.delete("/removeFromCart/" + id, {
        headers: {
          'X-CSRF-TOKEN': token
        }
      })
  .then(response => {setproducts(response.data.cart); setprice(response.data.totalPrice)})
  .catch(error => console.error(error))
  if (window.location.href === url + "/checkout") {
    window.location.reload()
  }
    }
    const handleEdit = (id, e) => {
      if (e.target.textContent === "-") {
        axios.patch("/decreasequantity/" + id, {
          headers: {
            'X-CSRF-TOKEN': token
          }
        })
    .then(response => {setproducts(response.data.cart); setprice(response.data.totalPrice)})
    .catch(error => console.error(error))
    if (window.location.href === url + "/checkout") {
    window.location.reload()
  }
      } else {
        axios.patch("/increasequantity/" + id, {
          headers: {
            'X-CSRF-TOKEN': token
          }
        })
    .then(response => {setproducts(response.data.cart); setprice(response.data.totalPrice)})
    .catch(error => console.error(error))
    if (window.location.href === url + "/checkout") {
    window.location.reload()
  }
      }
    }
    return (
    <div>
    <li onClick={handleClick} id="cartIcon" className="cursor-pointer"><a className="text-[1.5rem]" ><i className="fa-solid fa-cart-shopping mr-[2px]"></i>Panier <span>{Object.keys(items).length}</span></a></li>
    <Transition.Root show={open} as={Fragment}>
      <Dialog as="div" className="relative z-10" onClose={setOpen}>
        <Transition.Child
          as={Fragment}
          enter="ease-in-out duration-500"
          enterFrom="opacity-0"
          enterTo="opacity-100"
          leave="ease-in-out duration-500"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
        >
          <div className="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </Transition.Child>

        <div className="fixed inset-0 overflow-hidden">
          <div className="absolute inset-0 overflow-hidden">
            <div className="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
              <Transition.Child
                as={Fragment}
                enter="transform transition ease-in-out duration-500 sm:duration-700"
                enterFrom="translate-x-full"
                enterTo="translate-x-0"
                leave="transform transition ease-in-out duration-500 sm:duration-700"
                leaveFrom="translate-x-0"
                leaveTo="translate-x-full"
              >
                <Dialog.Panel className="pointer-events-auto w-screen max-w-md">
                  <div className="flex h-full flex-col overflow-y-scroll bg-secondary shadow-xl">
                    <div className="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                      <div className="flex items-start justify-between">
                        <Dialog.Title className="text-lg font-medium text-gray-900">Commande</Dialog.Title>
                        <div className="ml-3 flex h-7 items-center">
                          <button
                            type="button"
                            className="-m-2 p-2 text-gray-400 hover:text-gray-500 outline-none"
                            onClick={() => setOpen(false)}
                          >
                            <span className="sr-only">Close panel</span>
                            <XMarkIcon className="h-6 w-6" aria-hidden="true" />
                          </button>
                        </div>
                      </div>

                      <div className="mt-8">
                        <div className="flow-root">
                          <ul role="list" className="-my-6 divide-y divide-gray-200">
                          {Object.keys(items).map((key) => {
                              const {id, product_name, picture, price, quantity, stock, description} = items[key]
                              return (
                                <li key={key} className="flex py-6">
                                <div className="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                  <img
                                    src={"storage/" + picture}
                                    className="h-full w-full object-cover object-center"
                                  />
                                </div>
                                <div className="ml-4 flex flex-1 flex-col">
                                  <div>
                                    <div className="flex justify-between text-base font-medium text-gray-900">
                                      <h3>
                                        <a>{product_name}</a>
                                      </h3>
                                      <p className="ml-4">{price}</p>
                                    </div>
                                    <p className="mt-1 text-sm text-gray-500">{description}</p>
                                  </div>
                                  <div className="flex flex-1 items-end justify-between text-sm">
                                  <div className='flex gap-1 text-base font-medium text-blue-700'>
                                  <div id="plus" className='font-bold cursor-pointer' onClick={(e) => {handleEdit(id, e)}}>+</div><span className="text-gray-500">Quantité: {quantity}</span><div id="minus" className='font-bold cursor-pointer' onClick={(e) => {handleEdit(id, e)}}>-</div>
                                  </div>
                                  <span className="text-gray-500">Stock {stock}</span>
                                    <div className="flex">
                                      <button
                                        type="button"
                                        className="font-medium text-blue-700 hover:text-blue-800"
                                        onClick={() => {handleDelete(id)}}
                                      >
                                        Retirer
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              )})} 
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div className="border-t border-gray-200 px-4 py-6 sm:px-6">
                      <div className="flex justify-between text-base font-medium text-gray-900 mb-3">
                        <p>Total:</p>
                        <p>{price}dh</p>
                      </div>
                      <p className="mt-0.5 text-sm text-[#079C07] font-[500]"><i className="fa-solid fa-truck-fast"></i> Livraison gratuite</p>
                      <p className="mt-0.5 text-sm text-[#079C07] font-[500]"><i className="fa-solid fa-money-bill"></i> Payer en cash à la livraison</p>
                      <p className="mt-0.5 text-sm text-[#079C07] font-[500]"><i className="fa-solid fa-globe"></i> Livraison tout autour de Marrakech</p>
                      <div className="mt-3">
                        <a
                        href='/checkout'
                          className="flex items-center justify-center rounded-md border border-transparent bg-blue-700 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-800"
                        >
                          Finaliser ma commande
                        </a>
                      </div>
                      <div className="mt-6 flex justify-center text-center text-sm text-gray-500">
                        <p>
                          or 
                          <button
                            type="button"
                            className="font-medium text-blue-700 hover:text-blue-800"
                            onClick={() => {
                              window.location.href === "http://127.0.0.1:8000/" ? setOpen(false) : window.location.replace("http://127.0.0.1:8000/");
                            }}
                          >
                            &nbsp;Continuer vos achats
                            <span aria-hidden="true"> &rarr;</span>
                          </button>
                        </p>
                      </div>
                    </div>
                  </div>
                </Dialog.Panel>
              </Transition.Child>
            </div>
          </div>
        </div>
      </Dialog>
    </Transition.Root>
    </div>
  )
}

export default Cart 