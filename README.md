# enmarea.gal

## Requerimentos:

* PHP 5.5+
* Composer
* Node 4+


## Instalación:

```bash
git clone https://github.com/oscarotero/enMarea.git
cd enMarea
composer install
npm install

# crea os directorios con permiso de escritura
mkdir -m 0777 data
mkdir -m 0777 data/logs

# edita os datos de entorno:
cp .env.example .env

php vendor/bin/phinx migrate
php vendor/bin/robo run
```