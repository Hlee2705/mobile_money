# MOBILE MONEY

## Prérequis

+ [] Créer la base de données (valisoa)

+ [] Créer les tables : (valisoa)
    + [] role : id, libelle
    + [] prefixe : id, code, libelle
    + [] utilisateur : id, numero, id_role
    + [] compte : id, id_utilisateur, solde
    + [] type_operation : id, libelle
    + [] tranche : id, min, max, date_insertion
    + [] frais : id, valeur, id_tranche, id_type_operation, date_insertion
    + [] historique_transaction : id, id_utilisateur, numero_receveur, id_type_operation, montant, frais, date_operation

+ [] Insérer les données de configuration : (valisoa)
    + [] Les rôles
    + [] Les types d'opérations
    + [] Les préfixes
    + [] Les tranches
    + [] Les frais
    + [] Les données de test

+ [] Créer les Models pour chaque table : (yoann)
    + [] RoleModel
    + [] PrefixeModel
    + [] UtilisateurModel
    + [] CompteModel
    + [] TypeOperationModel
    + [] TrancheModel
    + [] FraisModel
    + [] HistoriqueTransactionModel

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

