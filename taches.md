# MOBILE MONEY

## VERSION 1
### Prérequis

+ [x] Créer la base de données (valisoa)

+ [x] Créer les tables : (valisoa)
    + [x] role : id, libelle
    + [x] prefixe : id, code, libelle
    + [x] utilisateur : id, numero, id_role
    + [x] compte : id, id_utilisateur, solde
    + [x] type_operation : id, libelle
    + [x] tranche : id, min, max, date_insertion
    + [x] frais : id, valeur, id_tranche, id_type_operation, date_insertion
    + [x] historique_transaction : id, id_utilisateur, numero_receveur, id_type_operation, montant, frais, date_operation

+ [x] Insérer les données de configuration : (valisoa)
    + [x] Les rôles
    + [x] Les types d'opérations
    + [x] Les préfixes
    + [x] Les tranches
    + [x] Les frais
    + [x] Les données de test

+ [x] Créer les Models pour chaque table : (yoann)
    + [x] Role
    + [x] Prefixe
    + [x] Utilisateur
    + [x] Compte
    + [x] TypeOperation
    + [x] Tranche
    + [x] Frais
    + [x] HistoriqueTransaction

+ [x] Vérifier la connexion à la base de données (valisoa)


### Cote operateur (yoann)
+ [x] CRUD prefixe valable
    + [x] création 
    + [x] liste

+ [x] Insertion des parametres type d'operations 

+ [x] CRUD baremes de frais avec choix du type d'operations 
    + [x] création 
    + [x] liste
    + [x] modification
    + [x] suppression

+ [x] gestion de gain via frais 
    + [x] debiter au client 
        + [x] frais de transfert lors du transfert 
        + [x] frais de retrait lors du retrait 
    
+ [] gestion des comptes client : 
    + [] liste
    + [] nombre d'operation par type d'operation 
    + [] solde

### Cote client (valisoa)
+ [x] Connection efa mande
+ [x] Boutons : 
    + [x] faire un dépot
        + [x] formulaire

    + [x] faire un retrait
        + [x] formulaire

    + [x] faire un transfert
        + [x] formulaire

+ [] calculer le solde:
    + [] à chaque operation, modifier la valeur du solde par transaction dans la base de données 
    + [] afficher le solde

+ [] afficher les historiques 
    + [] historique générale (mouvement de toutes les operations)
    + [] historique par operation 

### LOGIN
+ [] si le numero n'existe pas encore, insérer dans la base 

## VERSION 2

### Prérequis : (valisoa)
+ [] Créer et modifier les tables : 
    + [] Dans la table prefixe, ajouter la colonne type_prefixe(normal/autre)
    + [] supprimer la colonne llibelle dans prefix
    + [] Créer la table config : id, valeur (pourcentage), date 
    + [] Ajouter la colonne commission dans la table historique_transaction

+ [] Creer les classes modeles pour ces nouveaux tables : 
    + [] Prefixe : avec la nouvelle colonne id_operateur
    + [] Config 

### Cote operateur (yoann)
+ [] Créer une page gain
    + [] notre gain et pour les autres operateurs

### Cote client (valisoa)
+ [] inclure frais de retrait lors de l'envoi
+ [] envoi multiple vers plusieurs numéros 

promotion pourcentage frais transfert meme operateur;
pourcentage tsy maintsy ao anaty base;
bonus: mahavita page afaka mi-modifier an'ilay izy
---
### TODO ALEA 1
+ [x] base
    + [x] ajouter une table promotion: id, valeur
+ [x] metier
    + [x] creer un model pour la configuration de la promotion
    + [x] creer un service pour avoir la valeur de la configuration de la promotion
    + [x] injecter PromotionService dans TranfertService
    + [x] on a deja une fonction pour verifier si un numero est un autre operateur, utiliser cette methode de thype boolean pour modifier la valeur du frais

+ [] bonus
    + [] creer une page pour modifier la valeur de la configuration de la promotion

epargne : pour chaquge client misfidy % epargnena 
creer page pour chqua client oh 20% epargnena = base
raha misy transfert tonga de ny 20 mankany amin epargne de ny 80 mankany amin compte

### TODO ALEA 2
+ [+] base 
    + [+] ajouter une table epargne : id, valeur_epargne, id_utilisateur
    

+ [] metier : 
    + [+] creer un model pour epargne 
    + [] creer un service pour récupérer le pourcentage saisi par le client(EpargneService)
    + [] Utiliser EpargneService dans TransfertService pour faire le calcul
    + [] utiliser ce pourcentage pour faire le calcul de l'epargne et calcul du reste vers le compte du receveur 
