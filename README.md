P_tropicool

Instrucciones:

Copiar .env.example y hacerlo  .env
- composer update
- php artisan key:generate
- php artisan migrate --seed
- npm install
(en caso de que salga este mensaje "npm" no se reconoce como un comando interno o externo,
programa o archivo por lotes ejecutable. deben instalar nodejs)
- npm run dev
- php artisan serve
