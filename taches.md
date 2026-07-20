# MOBILE MONEY

## Prérequis

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

+ [] Insérer les données de configuration : (valisoa)
    + [] Les rôles
    + [] Les types d'opérations
    + [] Les préfixes
    + [] Les tranches
    + [] Les frais
    + [] Les données de test

+ [x] Créer les Models pour chaque table : (yoann)
    + [x] Role
    + [x] Prefixe
    + [x] Utilisateur
    + [x] Compte
    + [x] TypeOperation
    + [x] Tranche
    + [x] Frais
    + [x] HistoriqueTransaction

+ [] Vérifier la connexion à la base de données (valisoa)


## Cote operateur (yoann)
+ [] CRUD prefixe valable
    + [] création 
    + [] liste
    + [] modification
    + [] suppression

+ [] Insertion des parametres type d'operations 

+ [] CRUD baremes de frais avec choix du type d'operations 
    + [] création 
    + [] liste
    + [] modification
    + [] suppression

+ [] gestion de gain via frais 
    + [] debiter au client 
        + [] frais de transfert lors du transfert 
        + [] frais de retrait lors du retrait 
    
+ [] gestion des comptes client : 
    + [] liste
    + [] nombre d'operation par type d'operation 
    + [] solde

## Cote client (valisoa)
+ [] Connection efa mande
+ [] Boutons : 
    + [] faire un dépot
        + [] formulaire

    + [] faire un retrait
        + [] formulaire

    + [] faire un transfert
        + [] formulaire

+ [] calculer le solde:
    + [] à chaque operation, modifier la valeur du solde par transaction dans la base de données 
    + [] afficher le solde

+ [] afficher les historiques 
    + [] historique générale (mouvement de toutes les operations)
    + [] historique par operation 

## LOGIN
+ [] si le numero n'existe pas encore, insérer dans la base 

