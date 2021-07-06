# Spark

**Spark** is a WordPress boilerplate for [Timber](https://upstatement.com/timber/) incorporating [Flynt](https://flyntwp.com/)'s build process.

## Setup

1. Rename theme directory
2. Rename theme in style.css
3. Update `project-name` paths to new theme directory in ./package.json

## Development

```sh
$ yarn setup:dev
$ yarn watch
```

## Production

```sh
$ yarn setup:production
```

## Notes

After updating core and plugin updates make sure the layout options styled in `assets/admin.css` are still hidden.
