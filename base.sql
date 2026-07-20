PRAGMA foreign_keys = OFF;

-- =====================================================
-- SUPPRESSION DES VUES
-- =====================================================
DROP VIEW IF EXISTS vue_frais_bareme;

-- =====================================================
-- SUPPRESSION DES TABLES
-- =====================================================
DROP TABLE IF EXISTS historique_transaction;

DROP TABLE IF EXISTS frais;

DROP TABLE IF EXISTS tranche;

DROP TABLE IF EXISTS type_operation;

DROP TABLE IF EXISTS compte;

DROP TABLE IF EXISTS utilisateur;

DROP TABLE IF EXISTS config;

DROP TABLE IF EXISTS prefixe;

DROP TABLE IF EXISTS role;

-- Activation obligatoire des clés étrangères sur SQLite
PRAGMA foreign_keys = ON;

-- =====================================================
-- TABLE : role
-- =====================================================
CREATE TABLE role (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle TEXT NOT NULL UNIQUE
);

-- =====================================================
-- TABLE : prefixe
-- =====================================================
CREATE TABLE prefixe (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT NOT NULL UNIQUE,
    type_prefixe TEXT NOT NULL
        CHECK(type_prefixe IN ('normal','autre'))
);

-- =====================================================
-- TABLE : utilisateur
-- =====================================================
CREATE TABLE utilisateur (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    numero TEXT NOT NULL UNIQUE,
    id_role INTEGER NOT NULL,

    FOREIGN KEY (id_role)
        REFERENCES role(id)
        ON DELETE RESTRICT
);

-- =====================================================
-- TABLE : compte
-- =====================================================
CREATE TABLE compte (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_utilisateur INTEGER NOT NULL UNIQUE,
    solde REAL NOT NULL DEFAULT 0,

    FOREIGN KEY (id_utilisateur)
        REFERENCES utilisateur(id)
        ON DELETE CASCADE
);

-- =====================================================
-- TABLE : type_operation
-- =====================================================
CREATE TABLE type_operation (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle TEXT NOT NULL UNIQUE
);

-- =====================================================
-- TABLE : tranche
-- =====================================================
CREATE TABLE tranche (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    min REAL NOT NULL,
    max REAL NOT NULL,
    date_insertion TEXT DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- TABLE : frais
-- =====================================================
CREATE TABLE frais (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    valeur REAL NOT NULL,
    id_tranche INTEGER NOT NULL,
    id_type_operation INTEGER NOT NULL,
    date_insertion TEXT DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_tranche)
        REFERENCES tranche(id)
        ON DELETE CASCADE,

    FOREIGN KEY (id_type_operation)
        REFERENCES type_operation(id)
        ON DELETE RESTRICT
);

-- =====================================================
-- TABLE : historique_transaction
-- =====================================================
CREATE TABLE historique_transaction (
    id INTEGER PRIMARY KEY AUTOINCREMENT,

    id_utilisateur INTEGER NOT NULL,

    numero_receveur TEXT,

    id_type_operation INTEGER NOT NULL,

    montant REAL NOT NULL,

    frais REAL NOT NULL DEFAULT 0,

    date_operation TEXT DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_utilisateur)
        REFERENCES utilisateur(id)
        ON DELETE RESTRICT,

    FOREIGN KEY (id_type_operation)
        REFERENCES type_operation(id)
        ON DELETE RESTRICT
);

-- ajout de la colonne commission dans la table historique_transaction
ALTER TABLE historique_transaction
ADD COLUMN commission REAL NOT NULL DEFAULT 0;

CREATE VIEW vue_frais_bareme AS

SELECT
    t.id AS id_tranche,
    t.min,
    t.max,

    MAX(
        CASE 
            WHEN f.id_type_operation = 2 
            THEN f.valeur 
        END
    ) AS frais_retrait,

    MAX(
        CASE 
            WHEN f.id_type_operation = 3 
            THEN f.valeur 
        END
    ) AS frais_transfert,

    (
        COALESCE(
            MAX(
                CASE 
                    WHEN f.id_type_operation = 2 
                    THEN f.valeur 
                END
            ),0
        )
        +
        COALESCE(
            MAX(
                CASE 
                    WHEN f.id_type_operation = 3 
                    THEN f.valeur 
                END
            ),0
        )
    ) AS frais_total


FROM tranche t

LEFT JOIN frais f
ON f.id_tranche = t.id

GROUP BY 
    t.id,
    t.min,
    t.max

ORDER BY t.min ASC;


-- table config
CREATE TABLE config (
    id INTEGER PRIMARY KEY AUTOINCREMENT,

    valeur REAL NOT NULL,

    date_insertion TEXT DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- INSERT : roles
-- =====================================================
INSERT INTO role (libelle)
VALUES
('operateur'),
('client');

-- =====================================================
-- INSERT : types d'opérations
-- =====================================================
INSERT INTO type_operation (libelle)
VALUES
('depot'),
('retrait'),
('transfert');

-- =====================================================
-- INSERT : préfixes autorisés
-- =====================================================
INSERT INTO prefixe(code, type_prefixe)
VALUES
('039','normal'),
('040','normal'),
('032','autre'),
('031','autre'),
('034','autre'),
('038','autre'),
('033','autre'),
('037','autre');

-- =====================================================
-- INSERT : tranches
-- =====================================================
INSERT INTO tranche (id, min, max)
VALUES
(1,100,1000),
(2,1001,5000),
(3,5001,10000),
(4,10001,25000),
(5,25001,50000),
(6,50001,100000),
(7,100001,250000),
(8,250001,500000),
(9,500001,1000000),
(10,1000001,2000000);

-- =====================================================
-- INSERT : frais (Retrait)
-- =====================================================
INSERT INTO frais (valeur,id_tranche,id_type_operation)
VALUES
(50,1,2),
(50,2,2),
(100,3,2),
(200,4,2),
(400,5,2),
(800,6,2),
(1500,7,2),
(1500,8,2),
(2500,9,2),
(3000,10,2);

-- =====================================================
-- INSERT : frais (Transfert)
-- =====================================================
INSERT INTO frais (valeur, id_tranche, id_type_operation)
VALUES
(20, 1, 3),
(50, 2, 3),
(100, 3, 3),
(200, 4, 3),
(400, 5, 3),
(800, 6, 3),
(1500, 7, 3),
(1500, 8, 3),
(2500, 9, 3),
(3000, 10, 3);

-- =====================================================
-- UTILISATEURS DE TEST
-- =====================================================

-- Opérateur
INSERT INTO utilisateur(numero, id_role)
VALUES
('0390000000', 1);

-- Client (préfixe normal)
INSERT INTO utilisateur(numero, id_role)
VALUES
('0401234567', 2);

-- Client (autre opérateur)
INSERT INTO utilisateur(numero, id_role)
VALUES
('0325555555', 2);

-- Client (autre opérateur)
INSERT INTO utilisateur(numero, id_role)
VALUES
('0311111111', 2);

-- Client (autre opérateur)
INSERT INTO utilisateur(numero, id_role)
VALUES
('0342222222', 2);

-- Client (autre opérateur)
INSERT INTO utilisateur(numero, id_role)
VALUES
('0383333333', 2);

-- Client (autre opérateur)
INSERT INTO utilisateur(numero, id_role)
VALUES
('0334444444', 2);

-- Client (autre opérateur)
INSERT INTO utilisateur(numero, id_role)
VALUES
('0376666666', 2);

-- =====================================================
-- COMPTES DE TEST
-- =====================================================

INSERT INTO compte(id_utilisateur,solde)
VALUES
(1,0),
(2,500000);

-- Création du compte associé
INSERT INTO compte(id_utilisateur, solde)
VALUES
(3, 200000);

