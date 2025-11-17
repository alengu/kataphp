# Cart Pricing Kata

## Mission

Corriger le code pour que tous les tests passent.

### Règles métier

- Prix en centimes (int)
- TVA 20% après remise
- Remise 20% le Black Friday (dernier vendredi de novembre)
- Quantités et IDs valides
- Total TTC non négatif

### Commandes

```bash
composer install
vendor/bin/phpunit
```

#### Livrables

- Repo GitHub avec tout le code
- README résumant les actions menaient
- Tests exécutables
- CI (en bonus)

##### Actions

- Refactorisation vers php 8.1: Déclaration des variables dans le constructeur, utilisation de ??= au lieu d'une ternaire
- Ajout de DiscountServiceInterface pour pouvoir ajouter d'autres service de discount et sécurisé le code, vu qu'il est passé en constructeur j'ai supposé qu'on devrait pouvoir le faire.
- Correction du discount pour le black friday
- Correction des typages (return et arguments)
- Correction du calcul du prix total
- Gestion des exceptions pour le total négatif si discount > 100, quantité <= 0, id null et prix <= 0
- Ajout .gitignore
