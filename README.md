# Symfony - projet de site de gestion de salle de concert


Le projet est disponible sur la branche master et les modifications apportées
Les modifications apportées après lundi midi sont disponibles dans la branche lateWork, si vous voulez bien les prendre en compte

## Diagramme d'organisation de la bd



![Alt text](diagramme_bd_systeme_concert.png "Diagramme")

# Fonctionnalités

- User
  - [x] accès en lecture aux concerts
  - [x] accès à la création d'un compte
  - [ ] accès à la page de modification de son compte
- [ ] Réaliser une page d'accueil qui affiche les prochains concerts à venir
- Administrateur
  - [x] CRUD concert création/update
  - [x] CRUD groupe
  - [ ] CRUD membres

- [x] Gestion des accès : un utilisateur n'a pas accès à tout le site; l'administrateur oui
- [ ] Créer un footer qui affiche l'adresse de la salle de concert
- [x] Fixtures

- Groupes
  - [x] accès à la liste des membres
  - [ ] section "prochains concerts"
- Nice to have
  - [x] Quand l'utilisateur est logué, au lieu de "login", "bonjour [user]" dans la navbar
  - [ ] Une page des concerts passés classés par année avec un onglet navbar dédié
  - [ ] upload d'images
  - [ ] insérer une pagination sur les concerts à venir en page d'accueil
  - [ ] Espace de gestion des favoris pour les utilisateurs logués

# Fonctionnalités faites sur lateWork
- User
  - [x] accès en lecture aux concerts
  - [x] accès à la création d'un compte
  - [ ] accès à la page de modification de son compte
- [x] Réaliser une page d'accueil qui affiche les prochains concerts à venir
- Administrateur
  - [x] CRUD concert création/update
  - [x] CRUD groupe
  - [ ] CRUD membres

- [x] Gestion des accès : un utilisateur n'a pas accès à tout le site; l'administrateur oui
- [x] Créer un footer qui affiche l'adresse de la salle de concert via subscriber
- [x] Fixtures

- Groupes
  - [x] accès à la liste des membres
  - [x] section "prochains concerts"
- Nice to have
  - [x] Quand l'utilisateur est logué, au lieu de "login", "bonjour [user]" dans la navbar
  - [ ] Une page des concerts passés classés par année avec un onglet navbar dédié
  - [x] upload d'images
  - [ ] insérer une pagination sur les concerts à venir en page d'accueil
  - [ ] Espace de gestion des favoris pour les utilisateurs logués

## Problèmes    

- Le retour de login/logout dirige vers l'index et ne suit pas les routes définies dans le contrôleur Security
- problème de route/htaccess, index.php doit être dans l'url avant la route

