# 🏍️ AtlasRide
## Plateforme de location de motos et vente d’accessoires
## 📌 Description

AtlasRide est une application web développée dans le cadre du Projet de Fin d’Études (PFE) à YouCode.
Elle permet aux utilisateurs de louer des motos pour une période donnée et d’acheter des accessoires de moto en ligne (casques, gants, etc.).

L’objectif du projet est de proposer une solution simple et efficace pour la gestion des locations de motos, des commandes d’accessoires, ainsi que l’administration de la plateforme.

## Fonctionnalités principales
Location de motos : Réservation en ligne avec système de vérification des disponibilités.

Boutique d'accessoires : Catalogue complet avec système de panier et gestion des stocks.

Gestion des commandes : Suivi des locations et achats en temps réel.

Interface Administrateur : Gestion du parc moto, des accessoires et des utilisateurs.

Authentification : Système de connexion sécurisé pour les clients.

## Objectifs du projet

Faciliter la location de motos en ligne

Permettre l’achat d’accessoires de moto

Offrir une interface simple pour les utilisateurs

Fournir un tableau de bord administrateur pour la gestion du système

Appliquer les concepts d’architecture MVC

## Acteurs du système
### Visiteur

Consulter les motos disponibles

Consulter les accessoires

Créer un compte

### Client

Se connecter à son compte

Réserver une moto

Acheter des accessoires

Consulter ses commandes et réservations

### Administrateur

Gérer les motos (CRUD)

Gérer les accessoires (CRUD)

Gérer les utilisateurs

Gérer les réservations et commandes

## Technologies utilisées

Framework : Laravel 10/11

Base de données : MySQL

Frontend : Tailwind CSS, Alpine.js

Paiement : Stripe API (Intégration)

Architecture : MVC (Model-View-Controller)

## Base de données

Principales tables du système :

users → gestion des utilisateurs

motos → catalogue des motos

locations → L'historique des réservations de motos

accessoires → catalogue des produits de la boutique

commandes → gère les achats d'accessoires

commande_items → lien entre une commande et les accessoires achetés (Table pivot)

### Le système implémente plusieurs mesures de sécurité :

Hashage des mots de passe (password_hash)

Vérification des sessions

Protection des routes administrateur

Requêtes SQL préparées

## Fonctionnalités principales

Location de motos

consultation des motos

réservation avec dates

vérification de disponibilité

Vente d’accessoires

catalogue produits

panier

validation de commande

Administration

gestion motos

gestion accessoires

gestion utilisateurs

gestion réservations

### Auteur

Projet réalisé par :

Nom : Ghita Makhfi
Formation : YouCode
Année : 2026