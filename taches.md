# MOBILE MONEY

## Prérequis

+ [] Créer la base de données

+ [] Créer les tables :
    + [] role : id, libelle
    + [] prefixe : id, code, libelle
    + [] utilisateur : id, numero, id_role
    + [] compte : id, id_utilisateur, solde
    + [] type_operation : id, libelle
    + [] tranche : id, min, max, date_insertion
    + [] frais : id, valeur, id_tranche, id_type_operation, date_insertion
    + [] historique_transaction : id, id_utilisateur, numero_receveur, id_type_operation, montant, frais, date_operation

+ [] Insérer les données de configuration :
    + [] Les rôles
    + [] Les types d'opérations
    + [] Les préfixes
    + [] Les tranches
    + [] Les frais
    + [] Les données de test

+ [] Créer les Models pour chaque table :
    + [] RoleModel
    + [] PrefixeModel
    + [] UtilisateurModel
    + [] CompteModel
    + [] TypeOperationModel
    + [] TrancheModel
    + [] FraisModel
    + [] HistoriqueTransactionModel

+ [] Configurer les routes

+ [] Créer un BaseController commun (si nécessaire)

+ [] Créer les layouts :
    + [] Layout opérateur
    + [] Layout client

+ [] Vérifier la connexion à la base de données

+ [] Tester les Models (CRUD de base)

## Cote operateur 


## Cote client