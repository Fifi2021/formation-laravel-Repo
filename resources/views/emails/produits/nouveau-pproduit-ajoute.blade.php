@component('mail::message')
# Bienvenue sur notre plateforme

Un nouveau produit vien d'être ajouté sur cette plateforme.

## Désignation : {{ $produit->designation }}

## Prix : {{ $produit->prix }} X0F

## Description : {{ $produit->description }}

## Pays d'origine : {{ $produit->pays_source}}

Ceci est un mail test.

@component('mail::button', ['url' => url("liste-produit")])
Voir le produit
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
