Installation:

```bash
$ composer install
$ yarn install
$ yarn build
```

After basic installation we need to update database to add changes in entity. According to the Sylius documentation there are 2 ways to do it, via direct database schema update (recommended one) and migrations. I will describe both of them just in case:

via direct database schema update (recommended):

```bash
$ php bin/console doctrine:schema:update --force
```

via migrations:

```bash
$ php bin/console doctrine:migrations:diff
$ php bin/console doctrine:migrations:migrate
```
