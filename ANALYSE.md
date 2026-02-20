# Analyse du projet - Plateforme de Ticketing

## 1. Les acteurs

### Acteur 1 : Utilisateur
- Personne qui a besoin d'aide
- Crée des tickets pour signaler un problème

### Acteur 2 : Administrateur
- Personne qui gère les tickets
- Aide les utilisateurs à résoudre leurs problèmes

## 2. Ce que chaque acteur peut faire (cas d'utilisation)

| Acteur         | Ce qu'il peut faire |
|-------- -------|---------------------|
| Utilisateur    | S'inscrire sur la plateforme |
| Utilisateur    | Se connecter à son compte |
| Utilisateur    | Créer un nouveau ticket |
| Utilisateur    | Voir la liste de ses tickets |
| Utilisateur    | Voir le détail d'un ticket |
| Utilisateur    | Répondre à un ticket |
| Administrateur | Se connecter (avec email spécial) |
| Administrateur | Voir TOUS les tickets (pas seulement les siens) |
| Administrateur | Changer le statut d'un ticket (ouvert, en cours, résolu) |
| Administrateur | Supprimer un ticket |
| Administrateur | Répondre à n'importe quel ticket |

## 3. Règles importantes
- Un utilisateur ne voit QUE ses propres tickets
- L'administrateur voit tous les tickets
- Tout le monde peut répondre aux tickets
- Seul l'admin peut changer le statut et supprimer