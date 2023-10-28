@extends('layouts.app')

@section('content') 
    <main>
            <section class="rounded-lg text-center p-6 m-5 h-screen">
                <h1 class="text-3xl font-light text-gray-800 mb-4">Merci pour votre achat !</h1>
                <p class="text-gray-600 font-light mb-4">Nous tenons à vous remercier pour avoir choisi nos produits. Votre commande a bien été enregistrée et sera traitée dans les plus brefs délais.</p>
                <p class="text-gray-600 font-light mb-4">Nous vous enverrons un e-mail de confirmation dès que votre commande sera expédiée.</p>
                <p class="text-gray-600 font-light">Si vous avez des questions ou des préoccupations, n'hésitez pas à <a href="/contact" class="text-blue-500 hover:underline">nous contacter</a>.</p>
            </section>
        </main>
  @endsection