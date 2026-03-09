### 🏍️ AtlasRide
## Plateforme de location de motos et vente d’accessoires
## 📌 Description

AtlasRide est une application web développée dans le cadre du Projet de Fin d’Études (PFE) à YouCode.
Elle permet aux utilisateurs de louer des motos pour une période donnée et d’acheter des accessoires de moto en ligne (casques, gants, vestes, etc.).

L’objectif du projet est de proposer une solution simple et efficace pour la gestion des locations de motos, des commandes d’accessoires, ainsi que l’administration de la plateforme.

## 🎯 Objectifs du projet

Faciliter la location de motos en ligne

Permettre l’achat d’accessoires de moto

Offrir une interface simple pour les utilisateurs

Fournir un tableau de bord administrateur pour la gestion du système

Appliquer les concepts d’architecture MVC

## 👥 Acteurs du système
# Visiteur

Consulter les motos disponibles

Consulter les accessoires

Créer un compte

# Client

Se connecter à son compte

Réserver une moto

Acheter des accessoires

Consulter ses commandes et réservations

# Administrateur

Gérer les motos (CRUD)

Gérer les accessoires (CRUD)

Gérer les utilisateurs

Gérer les réservations et commandes

## ⚙️ Technologies utilisées
# Backend

PHP (Architecture MVC) ou Laravel

# Frontend

HTML

Tailwind CSS

JavaScript

Base de données

MySQL

Outils

Git & GitHub

Docker

Conception (diagrammes UML)

## 🧱 Architecture du projet

Le projet suit une architecture MVC (Model-View-Controller).

atlasride
│
├── app
│   ├── Controllers
│   ├── Models
│   └── Views
│
├── core
│   ├── Database.php
│   ├── Router.php
│
├── public
│   └── index.php
│
├── docker-compose.yml
└── README.md
📊 Diagrammes UML

Les diagrammes UML réalisés pour ce projet :

Diagramme de cas d’utilisation

Diagramme de classes

## 🗄️ Base de données

Principales tables du système :

users → gestion des utilisateurs

motos → catalogue des motos

accessoires → produits vendus

reservations → location des motos

commandes → commandes d’accessoires

# Le système implémente plusieurs mesures de sécurité :

Hashage des mots de passe (password_hash)

Vérification des sessions

Protection des routes administrateur

Requêtes SQL préparées

## 📦 Fonctionnalités principales
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

## 📅 Planning du projet
Phase	Durée
Analyse & Cahier des charges	1 semaine
Conception UML	1 semaine
Développement Backend	2 semaines
Développement Frontend	2 semaines
Tests	1 semaine

# 👨‍💻 Auteur

Projet réalisé par :

Nom : Ghita Makhfi
Formation : YouCode
Année : 2026