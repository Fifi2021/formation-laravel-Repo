@component('mail::message')
# Bienvenue sur notre plateforme

Un nouveau produit vien d'être ajouté sur cette plateforme.

## Désignation : {{ $produit->designation }}

## Prix : {{ $produit->prix }} X0F

## Description : {{ $produit->description }}

## Pays d'origine : {{ $produit->pays_source}}

Ceci est un mail test.

@component('mail::button', ['url' => 'liste-produit'])
Voir le produit
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
