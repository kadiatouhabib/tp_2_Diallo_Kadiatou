# tp_2_Kadiatou_Diallo

form1 = form.php
form2 = adress_form.php

Formulaires dynamiques (10 pts)
Vous avez reçu le mandat de développer un logiciel Web pour un site de commerce électronique. Vous
devez créer une page où l'utilisateur peut saisir plusieurs adresses (par exemple : livraison, facturation,
autre, etc..)
Pour exécuter cet exercice, l'utilisateur doit commencer par remplir une page dans laquelle vous leur
avez demandé, combien d'adresses avez-vous ? L'utilisateur doit entrer un nombre. La réponse de
cette page doit être un autre formulaire avec les champs d'adresse répétés autant de fois que
l'utilisateur l'a demandé :
L'adresse comprend les champs suivants. (Leur validation est entre parenthèses).
● street: (string max 50)
● street_nb: (int)
● type : (string max 20 caractères). “ hint : pourrait être un select par exemple : livraison,
facturation, autre, etc..”
● city: (string) “hint : une liste déroulante serait une bonne idée pour éviter les orthographes
différentes. par exemple : Montréal, Laval, Toronto, Québec, etc..”
● zipcode : (6 caractères)
Une fois l'adresse(s) saisie(s) le système doit rediriger vers une page où les réponses seront affichées
pour vérification.
Si l’utilisateur confirme, les données doivent être envoyées à la DB. Sinon il peut revenir pour
changer les informations. (ces informations devraient être pré remplies si on revient en arrière)
Un select minimum doit être utilisé
Vous devez ajouter un design CSS sur les deux formulaires.