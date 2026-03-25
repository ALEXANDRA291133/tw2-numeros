# Generador de Números Aleatorios

Aplicación PHP orientada a objetos que solicita al usuario N elementos y muestra N números aleatorios en una tabla con estadísticas.

## Requisitos

- Docker
- docker-compose
- Puerto 8082 disponible

## Instrucciones de despliegue

1. Colocar esta carpeta en `./html/noo/` del proyecto que contiene `docker-compose.yml`.

2. Ejecutar:
   ```
   docker-compose up -d
   ```

3. Abrir http://localhost:8082/noo/

4. El punto de acceso es `index.php`

## Notas

- PHP 7.4 es el target
- La app evita sintaxis de PHP 8+
- No se requiere Composer; todas las clases se incluyen con `require_once`
- Sin dependencias externas
